<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['nama', 'tanggal_lahir', 'alamat', 'email', 'password', 'role', 'foto'];
    protected $useTimestamps = true;
}
