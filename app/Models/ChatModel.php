<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model
{
    protected $table            = 'chat_messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Kolom yang boleh diisi saat insert/update
    protected $allowedFields = [
        'sender',       // 'user', 'bot', atau 'admin'
        'user_id',      // nullable
        'nama_user',    // nama lengkap user atau guest
        'message',
        'file_id',
        'created_at',
        'updated_at'
    ];

    // Validasi data saat insert/update
    protected $validationRules = [
        'sender'   => 'required|in_list[user,bot,admin]',
        'message'  => 'required|string',
        // Tidak mewajibkan user_id dan nama_user karena bisa guest
        // 'user_id' => 'permit_empty|integer',
        // 'nama_user' => 'permit_empty|string'
    ];

    protected $validationMessages = [
        'sender' => [
            'required' => 'Pengirim harus diisi.',
            'in_list'  => 'Pengirim harus bernilai user, bot, atau admin.',
        ],
        'message' => [
            'required' => 'Pesan tidak boleh kosong.',
        ],
    ];
}
