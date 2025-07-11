<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use CodeIgniter\Controller;

class PemesananUser extends BaseController
{
    public function cekPesanan()
    {
        // Cek login
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Silakan login untuk melihat pesanan.');
        }

        $userId = session()->get('user_id');
        $model = new PemesananModel();

        $status = $this->request->getGet('status') ?? 'semua';

        $query = $model->where('user_id', $userId);
        if ($status !== 'semua') {
            $query = $query->where('status', $status);
        }

        $pesanan = $query->findAll();

        return view('user/cek_pesanan', [
            'pesanan' => $pesanan,
            'status_aktif' => $status,
        ]);
    }

    // Submit Feedback
    public function submitFeedback()
{
    $id = $this->request->getPost('id');
    $feedback = $this->request->getPost('feedback_user');
    $rating = $this->request->getPost('rating_user');

    $model = new PemesananModel();
    $pesanan = $model->find($id);

    // Validasi: hanya user yg punya pesanan bisa kasih feedback
    if (!$pesanan || $pesanan['user_id'] != session()->get('user_id')) {
        return redirect()->back()->with('error', 'Tidak diizinkan.');
    }

    // Update feedback & rating dalam satu eksekusi
    $model->update($id, [
        'feedback_user' => $feedback,
        'rating_user'   => $rating,
        'updated_at'    => date('Y-m-d H:i:s'),
    ]);

    return redirect()->back()->with('success', 'Feedback dan rating berhasil dikirim.');
}

    
}
