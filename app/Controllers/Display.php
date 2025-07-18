<?php

namespace App\Controllers;

use App\Models\DisplayModel;

class Display extends BaseController
{
    protected $displayModel;

    public function __construct()
    {
        $this->displayModel = new DisplayModel();
    }

    public function index()
    {
        $data['carouselItems'] = $this->displayModel->orderBy('created_at', 'DESC')->findAll();
        return view('display/index', $data); // Pastikan file ini ada di views/display/index.php
    }

    public function tambah()
    {
        return view('display/tambah');
    }

    public function simpan()
    {
        $gambar = $this->request->getFile('gambar');

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaBaru = $gambar->getRandomName();
            $gambar->move('public/foto', $namaBaru);

            $this->displayModel->save([
                'judul' => $this->request->getPost('judul'),
                'gambar' => $namaBaru
            ]);

            return redirect()->to('/display')->with('success', 'Gambar berhasil ditambahkan');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah gambar');
    }

    public function hapus($id)
    {
        $item = $this->displayModel->find($id);
        if ($item && file_exists('public/foto/' . $item['gambar'])) {
            unlink('public/foto/' . $item['gambar']);
        }

        $this->displayModel->delete($id);
        return redirect()->to('/display')->with('success', 'Data berhasil dihapus');
    }
}
