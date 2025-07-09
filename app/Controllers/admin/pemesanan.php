<?php
// File: app/Controllers/Admin/Pemesanan.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemesananModel;

class Pemesanan extends BaseController
{
    public function index()
    {
        $model = new PemesananModel();

        $statusList = [
            'Menunggu Konfirmasi',
            'Pembatalan',
            'Menunggu Kapal',
            'Belum Bayar',
            'Proses Keberangkatan',
            'Selesai'
        ];

        $statusCounts = [];
        foreach ($statusList as $status) {
            $statusCounts[$status] = $model->where('status', $status)->countAllResults();
        }

        return view('admin/manajemen_pemesanan', [
            'statusCounts' => $statusCounts
        ]);
    }
}
