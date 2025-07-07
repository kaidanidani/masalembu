<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'is_logged_in' => true,
                'user_id'      => $user['id'],
                'user_email'   => $user['email'],
                'role'         => $user['role'],
            ]);

            session()->setFlashdata('success', '✅ Berhasil login sebagai ' . $user['role']);

            // Redirect berdasarkan role
            if ($user['role'] === 'admin') {
                return redirect()->to(base_url('admin/dashboard'));
            } else {
                return redirect()->to(base_url('home/form-pemesanan'));
            }
        }

        session()->setFlashdata('error', '❌ Email atau password salah.');
        return redirect()->to(base_url('login'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
