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
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/home/dashboard')->with('error', 'Akses ditolak!');
        }

        $paketModel      = new PaketModel();
        $pemesananModel  = new PemesananModel();
        $userModel       = new UserModel();

        // Data paket per kategori
        $data['paketEksplorasi'] = $paketModel->where('kategori', 'Eksplorasi')->findAll();
        $data['paketBudaya']     = $paketModel->where('kategori', 'Budaya & Tradisi')->findAll();
        $data['paketKeluarga']   = $paketModel->where('kategori', 'Keluarga & Relaksasi')->findAll();

        // Statistik
        $data['totalPengunjung'] = $userModel->countAll();
        $data['totalPemesanan']  = $pemesananModel->countAll();


        
        $data['totalReview'] = $pemesananModel // Dinamis untuk Reviews
    ->where('feedback_user IS NOT NULL')
    ->where('rating_user IS NOT NULL')
    ->countAllResults();



        // Pesanan terbaru (5 terakhir)
        $data['pesananTerbaru'] = $pemesananModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        // Feedback user terbaru
        $data['feedback'] = $pemesananModel
            ->where('feedback_user !=', null)
            ->orderBy('updated_at', 'DESC')
            ->first();

        // Dummy media sosial
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

        // Ambil artikel WordPress
        try {
            $client = \Config\Services::curlrequest();
           $response = $client->get('http://localhost:8888/cms/wp-json/wp/v2/posts?_embed&per_page=100');
$artikelData = json_decode($response->getBody(), true);
$data['artikelTerbaru'] = $artikelData;
$data['totalArtikel'] = count($artikelData);

        } catch (\Exception $e) {
            $data['artikelTerbaru'] = [];
        }

        return view('admin/dashboard', $data);
    }
}
