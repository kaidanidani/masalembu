<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return ('welcome_mesaage');
    }

    public function masalembu(): string
    {
        return 'Halo dari Masalembu!';
    }
    public function dashboard(): string
    {
    return view ('dashboard');
    }
    public function destinasi_wisata(): string
    {
        return view ('destinasi_wisata');
    }

}
