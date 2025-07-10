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
        return view('dashboard');
    }

   public function dashboard()
    {
        $paketModel = new PaketModel();

        // Ambil satu data paket untuk ditampilkan secara detail
        // Misalnya, ambil paket pertama yang tersedia
        $paket = $paketModel->first();

        // Dummy reviews (jika belum ada model review)
        $reviews = []; // Nanti bisa diisi dari model review jika sudah

        return view('dashboard', [
            'paket' => $paket,
            'reviews' => $reviews,
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
        // Simpan URL sebelum login
        if (!session()->get('is_logged_in')) {
            session()->set('redirect_after_login', current_url());
            return redirect()->to('/login');
        }

        if (!$slug) {
            return redirect()->to('/')->with('error', 'Paket tidak ditemukan.');
        }

        $data['paket'] = $slug;
        return view('pemesanan/create', $data); // ✅ view path disesuaikan
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

    // Pecah fasilitas menjadi array
    $paket['fasilitas'] = explode(',', $paket['fasilitas']);

    // Ambil review dari pelanggan
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