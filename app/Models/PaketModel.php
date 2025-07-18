<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model
{
    protected $table = 'paket_wisata'; // <– Tambahkan ini!
    protected $allowedFields = [
        'kategori', 'nama', 'slug', 'harga',
        'fasilitas', 'durasi', 'gambar', 'rating',
        'deskripsi', 'created_at', 'updated_at', 'kontak'
    ];

    public function getPaketDenganRating()
    {
        return $this->db->table('paket_wisata p')
            ->select('p.*, AVG(pm.rating_user) as rating_dinamis')
            ->join('pemesanan pm', 'pm.nama_paket = p.nama', 'left')
            ->groupBy('p.id')
            ->orderBy('p.created_at', 'DESC')
            ->get()->getResultArray();
    }
}
