<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table      = 'pemesanan';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id', 'nama_lengkap', 'no_hp', 'email', 'alamat',
        'paket_wisata', 'tanggal_berangkat', 'tanggal_pulang', 'jumlah_penumpang',
        'transportasi', 'penginapan', 'makanan', 'kendaraan', 'asuransi', 'catatan',
        'bank', 'harga_paket', 'biaya_admin', 'total_bayar', 'status', 'created_at'
    ];

    protected $useTimestamps = true;
}
