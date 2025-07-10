<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['pemesanan_id', 'nama_lengkap', 'feedback', 'rating'];
    protected $useTimestamps = true;
}
