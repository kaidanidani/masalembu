<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =======================
// === HALAMAN UMUM ====
// =======================
$routes->get('/', 'Home::index');
$routes->get('home/index', 'Home::index');
$routes->get('home/masalembu', 'Home::masalembu');
$routes->get('home/dashboard', 'Home::dashboard');
$routes->get('home/destinasi_wisata', 'Home::destinasi_wisata');
$routes->get('detail/(:num)', 'Home::detail_artikel/$1');
$routes->get('home/kontak', 'Home::kontak');
$routes->get('home/about', 'Home::about');

// ============================
// === PAKET & PEMESANAN USER
// ============================
$routes->get('/paket/(:segment)', 'Home::detailPaket/$1');
$routes->get('/home/form-pemesanan', 'Home::formPemesanan');
$routes->get('/home/form-pemesanan/(:segment)', 'Home::formPemesanan/$1');
$routes->post('/home/simpan-pemesanan', 'Home::simpanPemesanan');
$routes->get('/home/pemesananSaya', 'Home::pemesananSaya');
$routes->get('/home/cetak/(:num)', 'Home::cetak/$1');
$routes->get('/home/export-pdf/(:num)', 'Home::exportPdf/$1');

// ===================
// === ADMIN PANEL ===
// ===================

// Dashboard admin
$routes->get('/admin/dashboard', 'admin\Dashboard::index');

// Pemesanan admin
$routes->get('/admin/pemesanan', 'admin\Pemesanan::index');
$routes->get('/admin/pemesanan/create', 'admin\Pemesanan::create');
$routes->post('/admin/pemesanan/store', 'admin\Pemesanan::store');
$routes->get('/admin/pemesanan/edit/(:num)', 'admin\Pemesanan::edit/$1');
$routes->post('/admin/pemesanan/update/(:num)', 'admin\Pemesanan::update/$1');
$routes->get('/admin/pemesanan/delete/(:num)', 'admin\Pemesanan::delete/$1');

// =====================
// === KOMENTAR USER ===
// =====================
$routes->get('/user/komentar', 'User::komentar');
$routes->post('/user/komentar/simpan', 'User::simpanKomentar');
$routes->get('/user/komentar/edit/(:num)', 'User::editKomentar/$1');
$routes->post('/user/komentar/update/(:num)', 'User::updateKomentar/$1');
$routes->get('/user/komentar/delete/(:num)', 'User::hapusKomentar/$1');

// =====================
// === DASHBOARD USER ==
// =====================
$routes->get('/user/dashboard', 'Home::dashboard'); // atau arahkan ke controller user jika terpisah

// =====================
// === AUTENTIKASI ====
// =====================
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attemptLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::register'); 
$routes->post('/auth/saveRegister', 'Auth::saveRegister');

$routes->get('/forgot', 'Auth::forgot');           
$routes->post('/auth/reset', 'Auth::reset');       

$routes->get('/edit-profile', 'Auth::editProfile');
$routes->post('/update-profile', 'Auth::updateProfile');

// ==============
// ==Manajemen Pemesanan===
$routes->get('/pemesanan', 'Admin\Pemesanan::index');
