<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route Halaman Utama dan User
$routes->get('/', 'Home::index');
$routes->get('home/index', 'Home::index');
$routes->get('home/masalembu', 'Home::masalembu');
$routes->get('home/dashboard', 'Home::dashboard');
$routes->get('home/destinasi_wisata', 'Home::destinasi_wisata');
$routes->get('detail/(:num)', 'Home::detail_artikel/$1');
$routes->get('home/kontak', 'Home::kontak');
$routes->get('home/about', 'Home::about');
$routes->get('/home/form-pemesanan', 'Home::formPemesanan');
$routes->post('/home/simpan-pemesanan', 'Home::simpanPemesanan');
$routes->get('/home/pemesananSaya', 'Home::pemesananSaya');

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

// CRUD Pemesanan (Admin Panel)
$routes->get('/admin/pemesanan', 'Pemesanan::index');
$routes->get('/admin/pemesanan/create', 'Pemesanan::create');
$routes->post('/admin/pemesanan/store', 'Pemesanan::store');
$routes->get('/admin/pemesanan/edit/(:num)', 'Pemesanan::edit/$1');
$routes->post('/admin/pemesanan/update/(:num)', 'Pemesanan::update/$1');
$routes->get('/admin/pemesanan/delete/(:num)', 'Pemesanan::delete/$1');
$routes->get('/admin/dashboard', 'Admin::dashboard');
$routes->get('/home/cetak/(:num)', 'Home::cetak/$1');
$routes->get('/home/export-pdf/(:num)', 'Home::exportPdf/$1');

// CRUD USER
$routes->get('/user/dashboard', 'User::dashboard');


// Cetak Pemesanan 

// Detail Paket
$routes->get('/paket/(:segment)', 'Home::detailPaket/$1');
$routes->get('/home/form-pemesanan/(:segment)', 'Home::formPemesanan/$1');
$routes->post('/home/simpan-pemesanan', 'Home::simpanPemesanan');

// Komentar
$routes->get('/user/komentar', 'User::komentar');
$routes->post('/user/komentar/simpan', 'User::simpanKomentar');
$routes->get('/user/komentar/edit/(:num)', 'User::editKomentar/$1');
$routes->post('/user/komentar/update/(:num)', 'User::updateKomentar/$1');
$routes->get('/user/komentar/delete/(:num)', 'User::hapusKomentar/$1');


// Register
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::saveRegister');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::doLogin');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/profile', 'AuthController::profile');
$routes->post('/profile', 'AuthController::updateProfile');
