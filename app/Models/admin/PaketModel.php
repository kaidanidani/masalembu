<?php

namespace App\Models\admin;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket_wisata';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'slug', 'kategori', 'harga', 'fasilitas', 'durasi',
        'gambar', 'rating', 'deskripsi', 'created_at', 'updated_at',
        'kuota_paket', 'kuota_orang' // pastikan ini ditambahkan
    ];
}
