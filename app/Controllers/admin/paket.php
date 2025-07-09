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

    public function index()
    {
        $data['paket'] = $this->paketModel->findAll();
        return view('admin/list_paket', $data);
    }

    public function create()
    {
        return view('admin/tambah_paket');
    }

    public function store()
    {
        $data = $this->request->getPost();
        
        // Upload gambar jika ada
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/', $fileName);
            $data['gambar'] = $fileName;
        }

        $this->paketModel->insert($data);
        return redirect()->to('/admin/paket')->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['paket'] = $this->paketModel->find($id);
        return view('admin/edit_paket', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        // Upload gambar baru jika ada
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/', $fileName);
            $data['gambar'] = $fileName;
        }

        $this->paketModel->update($id, $data);
        return redirect()->to('/admin/paket')->with('success', 'Paket berhasil diupdate');
    }

    public function delete($id)
    {
        $this->paketModel->delete($id);
        return redirect()->to('/admin/paket')->with('success', 'Paket berhasil dihapus');
    }
}
