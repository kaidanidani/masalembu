<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\admin\PaketModel;
use App\Models\PemesananModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cegah akses jika bukan admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/home/dashboard')->with('error', 'Akses ditolak!');
        }

        $paketModel     = new PaketModel();
        $pemesananModel = new PemesananModel();
        $userModel      = new UserModel();

        // Data Paket per Kategori
        $data['paketEksplorasi'] = $paketModel->where('kategori', 'Eksplorasi')->findAll();
        $data['paketBudaya']     = $paketModel->where('kategori', 'Budaya & Tradisi')->findAll();
        $data['paketKeluarga']   = $paketModel->where('kategori', 'Keluarga & Relaksasi')->findAll();

        // Total Semua Pemesanan
        $data['totalPemesanan'] = $pemesananModel->countAll();

        // Total Pengunjung Unik berdasarkan id
        $data['totalPengunjung'] = $pemesananModel
            ->select('id')
            ->distinct()
            ->countAllResults();

        // Total Review berdasarkan feedback dan rating yang sudah diisi
        $data['totalReview'] = $pemesananModel
            ->where('feedback_user IS NOT NULL', null, false)
            ->where('rating_user IS NOT NULL', null, false)
            ->countAllResults();

        // Data Pesanan yang sudah selesai tapi belum mengisi review
        $today = date('Y-m-d');
        $data['pesananYangBisaDireview'] = $pemesananModel
            ->where('tanggal_pulang <', $today)
            ->where('feedback_user IS NULL')
            ->findAll();

        // Data 5 Pesanan Terbaru
        $data['pesananTerbaru'] = $pemesananModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        // Feedback Terbaru dari user
        $data['feedback'] = $pemesananModel
            ->where('feedback_user IS NOT NULL', null, false)
            ->orderBy('updated_at', 'DESC')
            ->first();

        // Dummy Media Sosial (sementara)
        $data['mediaSosial'] = [
            [
                'gambar' => 'uploads/medsos1.jpg',
                'caption' => 'Event Masalembu 2025',
            ],
            [
                'gambar' => 'uploads/medsos2.jpg',
                'caption' => 'Wisata Budaya Laut',
            ],
        ];

        // Ambil data artikel dari WordPress (API lokal)
        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get('http://localhost:8888/cms/wp-json/wp/v2/posts?_embed&per_page=100');
            $artikelData = json_decode($response->getBody(), true);
            $data['artikelTerbaru'] = array_slice($artikelData, 0, 5);
            $data['totalArtikel'] = count($artikelData);
        } catch (\Exception $e) {
            $data['artikelTerbaru'] = [];
            $data['totalArtikel'] = 0;
        }

        // Tampilkan ke View admin/dashboard.php
        return view('admin/dashboard', $data);
    }
}
