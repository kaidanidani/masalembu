<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\PaketModel;
use App\Models\PemesananModel;
use App\Models\UserModel;
use App\Models\ChatModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/home/dashboard')->with('error', 'Akses ditolak!');
        }

        $paketModel     = new PaketModel();
        $pemesananModel = new PemesananModel();
        $userModel      = new UserModel();
        $chatModel      = new ChatModel();

        $data['paketEksplorasi'] = $paketModel->where('kategori', 'Eksplorasi')->findAll();
        $data['paketBudaya']     = $paketModel->where('kategori', 'Budaya & Tradisi')->findAll();
        $data['paketKeluarga']   = $paketModel->where('kategori', 'Keluarga & Relaksasi')->findAll();

        $data['totalPemesanan'] = $pemesananModel->countAll();

        $data['totalPengunjung'] = $pemesananModel
            ->select('id')
            ->distinct()
            ->countAllResults();

        $data['totalReview'] = $pemesananModel
            ->where('feedback_user IS NOT NULL', null, false)
            ->where('rating_user IS NOT NULL', null, false)
            ->countAllResults();

        $today = date('Y-m-d');
        $data['pesananYangBisaDireview'] = $pemesananModel
            ->where('tanggal_pulang <', $today)
            ->where('feedback_user IS NULL')
            ->findAll();

        $data['pesananTerbaru'] = $pemesananModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        $data['feedback'] = $pemesananModel
            ->where('feedback_user IS NOT NULL', null, false)
            ->orderBy('updated_at', 'DESC')
            ->first();

        $data['mediaSosial'] = [
            ['gambar' => 'uploads/medsos1.jpg', 'caption' => 'Event Masalembu 2025'],
            ['gambar' => 'uploads/medsos2.jpg', 'caption' => 'Wisata Budaya Laut'],
        ];

        try {
            $client = \Config\Services::curlrequest();
            $response = $client->get('http://localhost:8888/cms/wp-json/wp/v2/posts?_embed&per_page=100');
            $artikelData = json_decode($response->getBody(), true);
            $data['artikelTerbaru'] = array_slice($artikelData, 0, 5);
            $data['totalArtikel'] = count($artikelData);
        } catch (\Exception $e) {
            $data['artikelTerbaru'] = [];
            $data['totalArtikel'] = 0;
        }

        // === DATA CHAT PENGGUNA ===
        $chatData = $chatModel
            ->select('chat_messages.*, users.nama as nama')
            ->join('users', 'users.id = chat_messages.user_id', 'left')
            ->orderBy('chat_messages.created_at', 'DESC')
            ->findAll();

        $data['chatPerUser'] = [];
        foreach ($chatData as $chat) {
            $uid = $chat['user_id'] ?? 'tamu_' . md5($chat['ip_address'] ?? $chat['id']);
            if (!isset($data['chatPerUser'][$uid])) {
                $data['chatPerUser'][$uid] = [
                    'user_id' => $chat['user_id'],
                    'nama' => $chat['nama'] ?? $chat['nama_user'] ?? 'Tamu',
                    'pesan_terakhir' => $chat,
                    'riwayat' => []
                ];
            }
            $data['chatPerUser'][$uid]['riwayat'][] = $chat;
        }

        return view('admin/dashboard', $data);
    }

    // Controller: Admin\Chat.php

// ChatController.php (admin side)

public function chat_detail()
{
    $chatModel = new \App\Models\ChatModel();
    $userModel = new \App\Models\UserModel();

    // Ambil semua pesan dari terbaru ke terlama
    $allMessages = $chatModel->orderBy('created_at', 'DESC')->findAll();

    $grouped = [];

    foreach ($allMessages as $msg) {
        $isGuest = empty($msg['user_id']);
        $groupKey = $isGuest
            ? 'tamu_' . ($msg['ip_address'] ?? 'unknown')
            : 'user_' . $msg['user_id'];

        // Inisialisasi grup jika belum ada
        if (!isset($grouped[$groupKey])) {
            $grouped[$groupKey] = [
                'user_id' => $msg['user_id'],
                'ip_address' => $msg['ip_address'] ?? null,
                'nama' => $isGuest
                    ? 'Tamu (' . ($msg['ip_address'] ?? 'Tidak Diketahui') . ')'
                    : ($userModel->find($msg['user_id'])['nama'] ?? 'User'),
                'messages' => [],
                'last_msg_time' => $msg['created_at'], // Set awal
            ];
        }

        // Tambahkan pesan ke grup
        $grouped[$groupKey]['messages'][] = (object) $msg;

        // Update waktu terakhir jika pesan lebih baru
        if (strtotime($msg['created_at']) > strtotime($grouped[$groupKey]['last_msg_time'])) {
            $grouped[$groupKey]['last_msg_time'] = $msg['created_at'];
        }
    }

    // Urutkan grup berdasarkan waktu pesan terakhir (terbaru dulu)
    usort($grouped, function ($a, $b) {
        return strtotime($b['last_msg_time']) <=> strtotime($a['last_msg_time']);
    });

    $data['groupedChats'] = $grouped;
    return view('admin/chat_detail', $data);
}



}
