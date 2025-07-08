<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman Umum
$routes->get('/', 'Home::index');
$routes->get('home/index', 'Home::index');
$routes->get('home/masalembu', 'Home::masalembu');
$routes->get('home/dashboard', 'Home::dashboard');
$routes->get('home/destinasi_wisata', 'Home::destinasi_wisata');
$routes->get('detail/(:num)', 'Home::detail_artikel/$1');
$routes->get('home/kontak', 'Home::kontak');
$routes->get('home/about', 'Home::about');

// Paket & Pemesanan
$routes->get('/paket/(:segment)', 'Home::detailPaket/$1');
$routes->get('/home/form-pemesanan', 'Home::formPemesanan');
$routes->get('/home/form-pemesanan/(:segment)', 'Home::formPemesanan/$1');
$routes->post('/home/simpan-pemesanan', 'Home::simpanPemesanan');
$routes->get('/home/pemesananSaya', 'Home::pemesananSaya');
$routes->get('/home/cetak/(:num)', 'Home::cetak/$1');
$routes->get('/home/export-pdf/(:num)', 'Home::exportPdf/$1');

// Admin (Pemesanan & Dashboard)
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/admin/pemesanan', 'Pemesanan::index');
$routes->get('/admin/pemesanan/create', 'Pemesanan::create');
$routes->post('/admin/pemesanan/store', 'Pemesanan::store');
$routes->get('/admin/pemesanan/edit/(:num)', 'Pemesanan::edit/$1');
$routes->post('/admin/pemesanan/update/(:num)', 'Pemesanan::update/$1');
$routes->get('/admin/pemesanan/delete/(:num)', 'Pemesanan::delete/$1');

// Komentar User
$routes->get('/user/komentar', 'User::komentar');
$routes->post('/user/komentar/simpan', 'User::simpanKomentar');
$routes->get('/user/komentar/edit/(:num)', 'User::editKomentar/$1');
$routes->post('/user/komentar/update/(:num)', 'User::updateKomentar/$1');
$routes->get('/user/komentar/delete/(:num)', 'User::hapusKomentar/$1');

// Dashboard User
$routes->get('/user/dashboard', 'User::dashboard');

// ✅ Autentikasi - hanya pakai controller `Auth`
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::register'); // view: auth/UserRegisterAkun.php
$routes->post('/auth/saveRegister', 'Auth::saveRegister');

$routes->get('/forgot', 'Auth::forgot'); // view: auth/ForgotAkunUser.php
$routes->post('/auth/reset', 'Auth::reset');

$routes->get('/edit-profile', 'Auth::editProfile');
$routes->post('/update-profile', 'Auth::updateProfile');

// ForgotAkunUser
$routes->get('/forgot', 'Auth::forgot');           // Menampilkan halaman form lupa password
$routes->post('/auth/reset', 'Auth::reset');       // Menyimpan password baru
