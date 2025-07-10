<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ChatController extends ResourceController
{
    public function chat()
    {
        $request = $this->request->getJSON();
        $message = $request->message ?? '';

        if (!$message) {
            return $this->respond(['reply' => 'Pesan tidak boleh kosong.']);
        }

        try {
            $client = \Config\Services::curlrequest();
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer YOUR_OPENAI_API_KEY', // Ganti ini
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'Kamu adalah asisten wisata Masalembu.'],
                        ['role' => 'user', 'content' => $message]
                    ],
                ],
            ]);

            $result = json_decode($response->getBody(), true);
            $reply  = $result['choices'][0]['message']['content'] ?? 'Maaf, saya tidak bisa menjawab sekarang.';

            return $this->respond(['reply' => $reply]);
        } catch (\Throwable $e) {
            return $this->respond(['reply' => 'Terjadi kesalahan. Coba beberapa saat lagi.']);
        }
    }
}
