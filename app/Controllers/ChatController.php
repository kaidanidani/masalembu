<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PaketModel;

class ChatController extends BaseController
{
    public function tanya()
    {
        $input = $this->request->getPost('message');
        $apiKey = getenv('GROQ_API_KEY');
        $url = 'https://api.groq.com/openai/v1/chat/completions';

        if (!$input || trim($input) === '') {
            return $this->response->setJSON(['message' => 'Silakan ketik pertanyaan terlebih dahulu.']);
        }

        $userMessage = strtolower(trim($input));
        $userId = session()->get('user_id') ?? null;
        $namaUser = session()->get('nama') ?? 'Tamu';

        // Simpan pesan user ke database
        if ($userId) {
            $db = \Config\Database::connect();
            $db->table('chat_messages')->insert([
    'sender'     => 'user',
    'user_id'    => $userId,
    'nama_user'  => $namaUser, // ✅ ini penting
    'message'    => $input,
    'created_at' => date('Y-m-d H:i:s')
]);

        }

        // Ambil data paket sekali
        $paketModel = new PaketModel();
        $paketList = $paketModel->getPaketDenganRating();

        // === 1. Pertanyaan spesifik tentang satu paket ===
        foreach ($paketList as $paket) {
            $nama = strtolower($paket['nama']);
            $kategori = strtolower($paket['kategori']);

            if (
                preg_match("/(tentang|jelaskan|ceritakan|info).*(\b$nama\b|\b$kategori\b)/i", $userMessage) ||
                preg_match("/(\b$nama\b|\b$kategori\b).*(tentang|jelaskan|info)/i", $userMessage)
            ) {
                $responseText = "📌 <b>{$paket['nama']}</b>\n\n"
                    . "🗂️ Kategori: " . ucfirst($paket['kategori']) . "\n"
                    . "💰 Harga: Rp" . number_format($paket['harga'], 0, ',', '.') . "\n"
                    . "🕒 Durasi: " . $paket['durasi'] . "\n"
                    . "⭐ Rating: " . number_format($paket['rating_dinamis'] ?? $paket['rating'] ?? 0, 1) . "/5\n"
                    . "🎁 Fasilitas: " . $paket['fasilitas'] . "\n\n"
                    . "📖 Deskripsi:\n" . $paket['deskripsi'];

                // Simpan ke DB
                if ($userId) {
                    $db->table('chat_messages')->insert([
    'sender'     => 'bot',
    'user_id'    => $userId,
    'nama_user'  => $namaUser,
    'message'    => $responseText,
    'created_at' => date('Y-m-d H:i:s')
]);

                }

                return $this->response->setJSON(['message' => nl2br($responseText)]);
            }
        }

        // === 2. Kontak ===
        if (preg_match('/\b(kontak|contact|hubungi|email|whatsapp|wa)\b/i', $userMessage)) {
            $responseText = "📞 Kamu bisa menghubungi admin melalui:\n\n";
            $responseText .= "✉️ Email: masalembuekowisata@gmail.com\n";
            $responseText .= "📱 WhatsApp: +62 82-3222-90627\n";

            if ($userId) {
                $db->table('chat_messages')->insert([
                    'sender' => 'bot',
                    'user_id' => $userId,
                    'message' => $responseText,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }

            return $this->response->setJSON(['message' => nl2br($responseText)]);
        }

        // === 3. Daftar paket ===
        $listKeywords = ['paket tersedia', 'paket wisata', 'ada paket apa', 'daftar paket', 'list paket', 'paket'];
        foreach ($listKeywords as $kw) {
            if (stripos($userMessage, $kw) !== false) {
                if (empty($paketList)) {
                    $responseText = "Saat ini belum ada paket wisata yang tersedia.";
                } else {
                    $responseText = "Berikut beberapa paket wisata yang tersedia di Masalembu:\n\n";
                    foreach ($paketList as $paket) {
                        $responseText .= "📌 <b>{$paket['nama']}</b>\n";
                        $responseText .= "🗂️ Kategori: {$paket['kategori']}\n";
                        $responseText .= "💰 Harga: Rp " . number_format($paket['harga'], 0, ',', '.') . "\n";
                        $responseText .= "⭐ Rating: " . number_format($paket['rating_dinamis'] ?? $paket['rating'] ?? 0, 1) . "/5\n";
                        $responseText .= "🕒 Durasi: {$paket['durasi']}\n";
                        $responseText .= "ℹ️ {$paket['deskripsi']}\n\n";
                    }
                }

                if ($userId) {
                    $db->table('chat_messages')->insert([
                        'sender' => 'bot',
                        'user_id' => $userId,
                        'message' => $responseText,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }

                return $this->response->setJSON(['message' => nl2br($responseText)]);
            }
        }

        // === 4. Kirim ke Groq jika tidak cocok ===
        $data = [
            "model" => "llama3-8b-8192",
            "messages" => [
                [
                    "role" => "system",
                    "content" => "Kamu adalah MasalembuBot, asisten wisata Masalembu.\n"
                        . "Jika pengguna bertanya tentang kontak, jawab dengan email masalembuekowisata@gmail.com dan WhatsApp +62 82-3222-90627.\n"
                        . "Jawab dengan ramah dan informatif seputar wisata, budaya, transportasi, dan paket Masalembu.\n"
                        . "Jika pertanyaannya di luar topik, tetap jawab sopan dan bantu sebisa mungkin."
                ],
                ["role" => "user", "content" => $input]
            ],
            "temperature" => 0.7,
        ];

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($data)
            ]);

            $body = json_decode($response->getBody(), true);
            $reply = $body['choices'][0]['message']['content'] ?? 'Maaf, belum ada jawaban.';

            if ($userId) {
                $db->table('chat_messages')->insert([
                    'sender' => 'bot',
                    'user_id' => $userId,
                    'message' => $reply,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }

            return $this->response->setJSON(['message' => nl2br($reply)]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['message' => 'Bot sedang mengalami gangguan. Coba lagi nanti.']);
        }
    }
}
