<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\PemesananModel;
use CodeIgniter\HTTP\ResponseInterface;
use Midtrans\Config as MidtransConfig;
use Midtrans\Snap;
use Dompdf\Dompdf;
use Dompdf\Options;

class Home extends BaseController
{
    public function index(): string
    {
        $paketModel = new PaketModel(); // ✅ Tambahkan ini
        $semuaPaket = $paketModel->getPaketDenganRating();

        // Filter berdasarkan kategori
        $paketEksplorasi = array_filter($semuaPaket, fn($p) => $p['kategori'] === 'Eksplorasi');
        $paketBudaya     = array_filter($semuaPaket, fn($p) => $p['kategori'] === 'Budaya');
        $paketRelaksasi  = array_filter($semuaPaket, fn($p) => $p['kategori'] === 'Relaksasi');

        // Ambil berita dari WordPress
        $client = \Config\Services::curlrequest();
        $berita = [];

        try {
            $response = $client->get("http://localhost:8888/cms/wp-json/wp/v2/posts?_embed&per_page=6");
            if ($response->getStatusCode() === 200) {
                $beritaData = json_decode($response->getBody());
                foreach ($beritaData as $b) {
                    $berita[] = [
                        'id' => $b->id,
                        'judul' => $b->title->rendered,
                        'thumbnail' => $b->_embedded->{'wp:featuredmedia'}[0]->source_url ?? base_url('foto/default.jpg'),
                        'konten' => $b->excerpt->rendered,
                        'link' => $b->link
                    ];
                }
            }
        } catch (\Throwable $e) {
            $berita = [];
        }

        return view('dashboard', [
            'paketEksplorasi' => $paketEksplorasi,
            'paketBudaya'     => $paketBudaya,
            'paketRelaksasi'  => $paketRelaksasi,
            'berita'          => $berita,
        ]);
    }



    public function destinasi_wisata(): string
    {
        $client = \Config\Services::curlrequest();
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 5;

        $response = $client->get("http://localhost:8888/cms/wp-json/wp/v2/posts?_embed&per_page={$perPage}&page={$page}");
        $posts = json_decode($response->getBody());

        $totalPages = $response->getHeaderLine('X-WP-TotalPages') ?: 1;

        return view('destinasi_wisata', [
            'posts' => $posts,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    public function detail_artikel($id): string
    {
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->get("http://localhost:8888/cms/wp-json/wp/v2/posts/{$id}?_embed");

            if ($response->getStatusCode() !== 200) {
                return "Artikel tidak ditemukan!";
            }

            $post = json_decode($response->getBody());

            $terbaruResponse = $client->get("http://localhost:8888/cms/wp-json/wp/v2/posts?_embed");
            $terbaru = json_decode($terbaruResponse->getBody());

            return view('detail_artikel', [
                'post' => $post,
                'terbaru' => $terbaru,
            ]);
        } catch (\Throwable $e) {
            return "Terjadi kesalahan saat mengambil artikel.";
        }
    }

    public function kontak(): string
    {
        return view('kontak');
    }

    public function about(): string
    {
        return view('about');
    }

    public function formPemesanan($slug = null)
    {
        if (!session()->get('is_logged_in')) {
            session()->set('redirect_after_login', current_url());
            return redirect()->to('/login');
        }

        $paketModel = new \App\Models\PaketModel();
        $paketList = $paketModel->findAll(); // ambil semua paket

        return view('pemesanan/create', [
            'paketList' => $paketList,
        ]);
    }

    public function simpanPemesanan(): ResponseInterface
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $post = $this->request->getPost();

        if (!$post) {
            return redirect()->back()->with('error', 'Data tidak valid!');
        }

        // Gabungkan nama wisatawan
        $namaArray = $post['nama_lengkap']; // ini array
        $post['nama_lengkap'] = implode(', ', $namaArray); // jadi string: "Budi, Sari, Dodi"

        // 🔽 Tambahkan order_id khusus untuk Midtrans
        $orderId = 'MASA-' . time();
        $post['order_id'] = $orderId;

        // Tambahkan data lainnya
        $post['user_id'] = session()->get('user_id');
        $post['biaya_admin'] = 2500;
        $post['total_bayar'] = (int)$post['harga_paket'] + 2500;
        $post['batas_bayar'] = date('Y-m-d H:i:s', strtotime('+1 day')); // misalnya 1 hari
        $post['status'] = 'belum_bayar';

        // ✅ Tambahkan nama paket dari PaketModel
        $paketModel = new PaketModel();
        $paket = $paketModel->where('nama', $post['paket_wisata'])->first(); // ✅ benar: cari berdasarkan nama
        if ($paket) {
            $post['nama_paket'] = $paket['nama'];
            $post['id_paket'] = $paket['id']; // tetap disimpan untuk relasi
        } else {
            return redirect()->back()->with('error', 'Paket wisata tidak ditemukan.');
        }

        $model = new \App\Models\PemesananModel();
        $id = $model->insert($post);

        session()->setFlashdata('success', 'Pemesanan berhasil disimpan!');
        return redirect()->to('/home/bayar-midtrans/' . $id);
    }

    public function cetak($id)
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $model = new PemesananModel();
        $data['pemesanan'] = $model->find($id);

        if (!$data['pemesanan']) {
            return "Data pemesanan tidak ditemukan.";
        }

        return view('pemesanan/cetak', $data);
    }

    public function detailPaket($slug)
    {
        $paketModel = new PaketModel();
        $pemesananModel = new PemesananModel();

        $paket = $paketModel->where('slug', $slug)->first();

        if (!$paket) {
            return "Paket dengan slug '{$slug}' tidak ditemukan di database.";
        }

        // Ubah fasilitas jadi array
        $paket['fasilitas'] = explode(',', $paket['fasilitas']);

        $reviews = $pemesananModel
            ->where('nama_paket', $paket['nama'])
            ->where('feedback_user IS NOT NULL', null, false)
            ->where('rating_user IS NOT NULL', null, false)
            ->orderBy('updated_at', 'DESC')
            ->findAll(10);

        return view('paket/detail', [
            'paket' => $paket,
            'reviews' => $reviews,
        ]);
    }

    public function bayarMidtrans($id)
    {
        $pemesananModel = new \App\Models\PemesananModel();
        $pemesanan = $pemesananModel->find($id);

        if (!$pemesanan) return redirect()->to('/');

        // Konfigurasi Midtrans
        MidtransConfig::$serverKey = \Config\Midtrans::$serverKey;
        MidtransConfig::$isProduction = \Config\Midtrans::$isProduction;
        MidtransConfig::$isSanitized = \Config\Midtrans::$isSanitized;
        MidtransConfig::$is3ds = \Config\Midtrans::$is3ds;

        // Payload transaksi
        $params = [
            'transaction_details' => [
                'order_id' => $pemesanan['order_id'], // ✅ gunakan yang sudah disimpan
                'gross_amount' => (int) $pemesanan['total_bayar'],
            ],
            'customer_details' => [
                'first_name' => $pemesanan['nama_lengkap'],
                'email' => $pemesanan['email'],
                'phone' => $pemesanan['no_hp'],
            ],
            'enabled_payments' => ['bank_transfer'],
        ];

        // Dapatkan Snap Token
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pemesanan/midtrans_checkout', [
            'snapToken' => $snapToken,
            'pemesanan' => $pemesanan
        ]);
    }

    /**
     * Handles Midtrans notifications (callbacks) to update order status.
     * This function should be set as the Notification URL in Midtrans Dashboard.
     *
     * @return ResponseInterface
     */
    public function handleMidtransNotification(): ResponseInterface
    {
        // Load Midtrans config
        MidtransConfig::$serverKey = \Config\Midtrans::$serverKey;
        MidtransConfig::$isProduction = \Config\Midtrans::$isProduction; // Pastikan ini sesuai dengan lingkungan Anda

        // Ambil request JSON dari Midtrans
        $rawBody = file_get_contents('php://input');
        $notification = json_decode($rawBody);

        // Logging: Penting untuk debugging di lingkungan produksi
        log_message('info', 'Midtrans Notification Received: ' . $rawBody);

        if (empty($notification)) {
            log_message('error', 'Midtrans: Empty or invalid notification received.');
            return $this->response->setStatusCode(400)->setBody('Invalid notification data');
        }

        $order_id = $notification->order_id;
        $transaction_status = $notification->transaction_status;
        $gross_amount = $notification->gross_amount;
        $signature_key = $notification->signature_key;

        $pemesananModel = new PemesananModel();

        // Cari pesanan berdasarkan order_id Midtrans
        $pemesanan = $pemesananModel->where('order_id', $order_id)->first();

        if (!$pemesanan) {
            log_message('error', 'Midtrans: Order not found for order_id: ' . $order_id);
            return $this->response->setStatusCode(404)->setBody('Order not found');
        }

        // --- VERIFIKASI SIGNATURE (SANGAT PENTING UNTUK KEAMANAN) ---
        $expectedSignature = hash(
            'sha512',
            $order_id .
                $notification->status_code .
                $gross_amount .
                MidtransConfig::$serverKey
        );

        if ($signature_key !== $expectedSignature) {
            log_message('warning', 'Midtrans: Invalid signature for order_id: ' . $order_id);
            return $this->response->setStatusCode(403)->setBody('Invalid signature');
        }
        // --- AKHIR VERIFIKASI SIGNATURE ---

        // Logika Update Status
        $newStatus = $pemesanan['status']; // Default: status tidak berubah

        if ($transaction_status == 'capture') {
            // Untuk pembayaran kartu kredit, status bisa "capture" -> berarti berhasil
            if ($notification->fraud_status == 'challenge') {
                $newStatus = 'pending'; // Misal: perlu verifikasi manual
                log_message('info', 'Midtrans: Payment challenged for order_id: ' . $order_id);
            } else {
                $newStatus = 'menunggu_kapal'; // Pembayaran berhasil
                log_message('info', 'Midtrans: Payment successful (capture) for order_id: ' . $order_id);
            }
        } elseif ($transaction_status == 'settlement') {
            // Untuk pembayaran non-kartu kredit (transfer bank, e-money), status "settlement" berarti berhasil
            $newStatus = 'menunggu_kapal'; // Pembayaran berhasil
            log_message('info', 'Midtrans: Payment successful (settlement) for order_id: ' . $order_id);
        } elseif ($transaction_status == 'pending') {
            // Pembayaran masih menunggu (misal: belum transfer)
            $newStatus = 'belum_bayar'; // Pastikan status ini sudah benar
            log_message('info', 'Midtrans: Payment pending for order_id: ' . $order_id);
        } elseif ($transaction_status == 'deny' || $transaction_status == 'cancel') {
            // Pembayaran ditolak atau dibatalkan dari sisi Midtrans
            $newStatus = 'dibatalkan';
            log_message('info', 'Midtrans: Payment denied/canceled for order_id: ' . $order_id);
        } elseif ($transaction_status == 'expire') {
            // Pembayaran kadaluarsa
            $newStatus = 'dibatalkan';
            log_message('info', 'Midtrans: Payment expired for order_id: ' . $order_id);
        } elseif ($transaction_status == 'refund' || $transaction_status == 'partial_refund') {
            // Pembayaran dikembalikan (refund)
            $newStatus = 'dibatalkan'; // Atau status lain seperti 'dikembalikan'
            log_message('info', 'Midtrans: Payment refunded for order_id: ' . $order_id);
        }

        // Perbarui status di database jika ada perubahan
        if ($newStatus !== $pemesanan['status']) {
            $pemesananModel->update($pemesanan['id'], ['status' => $newStatus]);
            log_message('info', 'Midtrans: Status updated for order_id ' . $order_id . ' from ' . $pemesanan['status'] . ' to ' . $newStatus);
        }

        // Beri respons OK ke Midtrans
        return $this->response->setStatusCode(200)->setBody('OK');
    }

    public function exportPdf($id)
    {
        $model = new \App\Models\PemesananModel();
        $pemesanan = $model->find($id);

        if (!$pemesanan) {
            return "Data tidak ditemukan.";
        }

        $logoPath = FCPATH . 'foto/logo_new.png';
        $type = pathinfo($logoPath, PATHINFO_EXTENSION);
        $data = file_get_contents($logoPath);
        $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // kalau pakai gambar
        $dompdf = new Dompdf($options);

        $html = view('pemesanan/pdf', [
            'pemesanan' => $pemesanan,
            'base64Logo' => $base64Logo
        ]);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="bukti-pemesanan.pdf"')
            ->setBody($dompdf->output());
    }

    public function cekPesanan()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $statusFilter = $this->request->getGet('status') ?? 'semua'; // Ubah nama variabel agar lebih jelas

        $model = new \App\Models\PemesananModel();
        $builder = $model->where('user_id', session()->get('user_id'));

        // Definisikan daftar status yang akan digunakan di view
        // Ini adalah array mapping dari kode status ke tampilan yang lebih user-friendly
        $statusMap = [
            'belum_bayar'         => 'Belum Dibayar',
            'menunggu_kapal'      => 'Menunggu Keberangkatan',
            'proses_keberangkatan' => 'Dalam Proses Keberangkatan', // Status yang diubah admin
            'selesai'             => 'Selesai', // Status yang diubah admin
            'dibatalkan'          => 'Dibatalkan',
            // Tambahkan status lain jika ada
        ];


        // Logika untuk mengubah status 'belum_bayar' yang kadaluarsa
        // Penting: Lakukan ini sebelum filtering $statusFilter, agar data di DB update duluan
        $pendingOrders = $model->where('user_id', session()->get('user_id'))
            ->where('status', 'belum_bayar')
            ->findAll();

        foreach ($pendingOrders as $order) {
            if (strtotime($order['batas_bayar']) < time()) {
                // Update status di database
                $model->update($order['id'], ['status' => 'dibatalkan']);
                log_message('info', 'Order ID ' . $order['id'] . ' dibatalkan karena batas bayar habis.');
            }
        }

        // Ambil ulang daftar pesanan setelah potensi update status kadaluarsa
        // Ini memastikan filter berikutnya menggunakan data terbaru
        $pemesananList = $builder; // Lanjutkan dari builder yang sudah ada
        if ($statusFilter !== 'semua') {
            $pemesananList->where('status', $statusFilter);
        }
        $pemesananList = $pemesananList->orderBy('created_at', 'DESC')->findAll();


        return view('pemesanan/cek_pesanan', [
            'pemesananList' => $pemesananList,
            'statusAktif'   => $statusFilter, // Gunakan nama variabel yang konsisten
            'statusMap'     => $statusMap, // Teruskan statusMap ke view
        ]);
    }

    public function detailPesanan($id)
    {
        $model = new \App\Models\PemesananModel();
        $pesanan = $model->find($id);

        // Definisikan statusMap juga di sini jika Anda ingin menampilkan status
        // yang user-friendly di halaman detail
        $statusMap = [
            'belum_bayar'         => 'Belum Dibayar',
            'menunggu_kapal'      => 'Menunggu Keberangkatan',
            'proses_keberangkatan' => 'Dalam Proses Keberangkatan',
            'selesai'             => 'Selesai',
            'dibatalkan'          => 'Dibatalkan',
        ];


        // Pastikan hanya user yang bersangkutan yang bisa lihat
        if (!$pesanan || $pesanan['user_id'] != session()->get('user_id')) {
            return redirect()->to('/home/cek-pesanan')->with('error', 'Pesanan tidak ditemukan.');
        }

        // Lakukan update status otomatis untuk pesanan 'belum_bayar' jika kadaluarsa
        if ($pesanan['status'] === 'belum_bayar' && strtotime($pesanan['batas_bayar']) < time()) {
            $model->update($pesanan['id'], ['status' => 'dibatalkan']);
            $pesanan['status'] = 'dibatalkan'; // Perbarui juga di objek $pesanan saat ini
            session()->setFlashdata('info', 'Pesanan ini otomatis dibatalkan karena batas waktu pembayaran habis.');
        }


        return view('pemesanan/user_detail', [
            'pesanan' => $pesanan,
            'statusMap' => $statusMap, // Teruskan statusMap ke view detail
        ]);
    }
}
