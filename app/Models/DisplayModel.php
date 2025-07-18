<?php

namespace App\Models;

use CodeIgniter\Model;

class DisplayModel extends Model
{
    protected $table = 'gambar_display';
    protected $primaryKey = 'id';
    protected $allowedFields = ['judul', 'lokasi', 'gambar', 'created_at'];
    protected $useTimestamps = false;
}
