<?php

if (!function_exists('formatStatus')) {
    function formatStatus($status)
    {
        $statusMap = [
            'belum_bayar' => 'Belum Dibayar',
            'sudah_bayar' => 'Sudah Dibayar',
            'batal'       => 'Dibatalkan',
            'selesai'     => 'Selesai',
            // Tambahkan status lain sesuai kebutuhan
        ];
        return $statusMap[$status] ?? 'Tidak Diketahui';
    }
}