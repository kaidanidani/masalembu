<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function saveRegister()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required',
            'tanggal_lahir' => 'required|valid_date',
            'alamat' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new UserModel();
        $model->insert([
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'role' => 'user',
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function doLogin()
    {
        $model = new UserModel();
        $user = $model->where('email', $this->request->getPost('email'))->first();

        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['nama'],
                'email' => $user['email'],
                'role' => $user['role'],
                'is_logged_in' => true,
            ]);
            return redirect()->to('/home/dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function profile()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to('/login');
        }

        $model = new UserModel();
        $data['user'] = $model->find(session()->get('user_id'));
        return view('auth/profile', $data);
    }

    public function updateProfile()
    {
        $model = new UserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        $model->update(session()->get('user_id'), $data);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
