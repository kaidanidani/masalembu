<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\admin\PaketModel;

class Paket extends BaseController
{
    protected $paketModel;

    public function __construct()
    {
        $this->paketModel = new PaketModel();
    }

    // Daftar semua paket wisata
    public function index()
    {
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        if ($search) {
            $paket = $this->paketModel
                ->like('nama', $search)
                ->orLike('kategori', $search)
                ->findAll();
        } else {
            $paket = $this->paketModel->findAll();
        }

        // Hitung jumlah tersedia dan habis
        $tersedia = 0;
        $habis = 0;
        foreach ($paket as $p) {
            if ($p['kuota_paket'] > 0) {
                $tersedia++;
            } else {
                $habis++;
            }
        }

        foreach ($paket as &$p) {
            $p['rating_dinamis'] = isset($p['rating']) ? $p['rating'] : 0;
        }

        return view('admin/daftar_paket', [
            'paket' => $paket,
            'tersediaCount' => $tersedia,
            'habisCount' => $habis,
            'search' => $search,
            'status' => $status,
            'success' => session()->getFlashdata('success'),
            'error' => session()->getFlashdata('error')
        ]);
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('admin/tambah_paket', [
            'action' => base_url('admin/paket/store'),
            'paket' => null
        ]);
    }

    // Simpan data baru
    public function store()
    {
        $data = $this->request->getPost();

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('foto/', $fileName); // disimpan di public/foto
            $data['gambar'] = $fileName;
        }

        $data['rating'] = $data['rating'] ?? 0;
        $data['kuota_paket'] = $data['kuota_paket'] ?? 0;

        $this->paketModel->insert($data);

        return redirect()->to('/admin/paket')->with('success', 'Paket berhasil ditambahkan.');
    }

    // Form edit
    public function edit($id)
    {
        $paket = $this->paketModel->find($id);

        if (!$paket) {
            return redirect()->to('/admin/paket')->with('error', 'Paket tidak ditemukan.');
        }

        return view('admin/tambah_paket', [
            'paket' => $paket,
            'action' => base_url('admin/paket/update/' . $id)
        ]);
    }

    // Update data
    public function update($id)
    {
        $data = $this->request->getPost();

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('foto/', $fileName);
            $data['gambar'] = $fileName;
        }

        $data['rating'] = $data['rating'] ?? 0;
        $data['kuota_paket'] = $data['kuota_paket'] ?? 0;

        $this->paketModel->update($id, $data);

        return redirect()->to('/admin/paket')->with('success', 'Paket berhasil diperbarui.');
    }

    // Hapus data
    public function delete($id)
    {
        $this->paketModel->delete($id);
        return redirect()->to('/admin/paket')->with('success', 'Paket berhasil dihapus.');
    }
}
