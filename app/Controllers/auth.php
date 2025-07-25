<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'is_logged_in' => true,
                'user_id'      => $user['id'],
                'user_email'   => $user['email'],
                'username'     => $user['nama'],
                'role'         => $user['role'],
                'foto'         => $user['foto'] ?? null,
            ]);

            session()->setFlashdata('success', '✅ Berhasil login sebagai ' . $user['role']);

            $redirectUrl = $this->request->getGet('redirect') ?? session()->get('redirect_after_login');
            if ($redirectUrl) {
                session()->remove('redirect_after_login');
                return redirect()->to($redirectUrl);
            }

            return $user['role'] === 'admin'
                ? redirect()->to(base_url('admin/dashboard'))
                : redirect()->to(base_url('/home/dashboard'));
        }

        session()->setFlashdata('error', '❌ Email atau password salah.');
        return redirect()->to(base_url('/login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/home/dashboard'));
    }

    public function register()
    {
        return view('auth/UserRegisterAkun');
    }

    public function saveRegister()
    {
        $data = $this->request->getPost();
        $userModel = new UserModel();

        if ($userModel->where('email', $data['email'])->first()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar.');
        }

        $userModel->insert([
            'nama'          => $data['nama'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat'        => $data['alamat'],
            'email'         => $data['email'],
            'password'      => password_hash($data['password'], PASSWORD_DEFAULT),
            'role'          => 'user',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);

        session()->setFlashdata('success', 'Akun berhasil didaftarkan. Silakan login.');
        return redirect()->to('/login');
    }

    public function forgot()
    {
        return view('auth/forgot');
    }

    public function reset()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $userModel->update($user['id'], [
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);

            session()->setFlashdata('success', '✅ Password berhasil direset!');
            return redirect()->to('/login');
        }

        session()->setFlashdata('error', '❌ Email tidak ditemukan.');
        return redirect()->back();
    }

    public function editProfile()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        // Ambil data nama & foto dari session jika tersedia
        $user['foto'] = session()->get('foto') ?? $user['foto'];
        $user['nama'] = session()->get('username') ?? $user['nama'];

        return view('auth/edit_profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $user = $userModel->find($userId);

        $data = [
            'nama'          => $this->request->getPost('nama'),
            'alamat'        => $this->request->getPost('alamat'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        ];

        // Upload foto baru jika ada
        $file = $this->request->getFile('foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            if (!empty($user['foto']) && file_exists('uploads/' . $user['foto'])) {
                unlink('uploads/' . $user['foto']);
            }

            $file->move('uploads', $newName);
            $data['foto'] = $newName;
        } else {
            $data['foto'] = $user['foto']; // Pakai foto lama jika tidak ganti
        }

        // Ganti password jika diisi
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($userId, $data);

        // Update session data agar sinkron di header dan form
        session()->set('foto', $data['foto']);
        session()->set('username', $data['nama']);

        return redirect()->to('/edit-profile')->with('success', 'Profil berhasil diperbarui');
    }
}
