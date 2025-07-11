<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\PemesananModel;
use CodeIgniter\HTTP\ResponseInterface;
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

        if (!$slug) {
            return redirect()->to('/')->with('error', 'Paket tidak ditemukan.');
        }

        $data['paket'] = $slug;
        return view('pemesanan/create', $data);
    }

    public function simpanPemesanan(): ResponseInterface
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $data = $this->request->getPost();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak valid!');
        }

        $model = new PemesananModel();
        $data['user_id'] = session()->get('user_id');
        $data['biaya_admin'] = 2500;
        $data['total_bayar'] = $data['harga_paket'] + $data['biaya_admin'];

        $id = $model->insert($data);

        session()->setFlashdata('success', 'Pemesanan berhasil disimpan!');
        return redirect()->to('/home/cetak/' . $id);
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
}
