<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'tanggal_lahir', 'alamat', 'email', 'password', 'role', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $returnType = 'array';
}
