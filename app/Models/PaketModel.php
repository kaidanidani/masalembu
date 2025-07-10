<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket_wisata'; // Sesuaikan dengan nama tabel
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'kategori', 'nama', 'slug', 'harga',
        'fasilitas', 'durasi', 'gambar', 'rating',
        'deskripsi', 'created_at', 'updated_at'
    ];
}
