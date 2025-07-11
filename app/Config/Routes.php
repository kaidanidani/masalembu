<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =======================
// ===== HALAMAN UMUM ====
// =======================
$routes->get('/', 'Home::index');
$routes->get('home/dashboard', 'Home::index');
$routes->get('home/destinasi_wisata', 'Home::destinasi_wisata');
$routes->get('detail/(:num)', 'Home::detail_artikel/$1');
$routes->get('home/kontak', 'Home::kontak');
$routes->get('home/about', 'Home::about');
$routes->get('home/detail_artikel/(:num)', 'Home::detail_artikel/$1');

// ===============================
// ====== PAKET & PEMESANAN USER =
// ===============================
$routes->get('paket/(:segment)', 'Home::detailPaket/$1');
$routes->get('home/form-pemesanan', 'Home::formPemesanan');
$routes->get('home/form-pemesanan/(:segment)', 'Home::formPemesanan/$1');
$routes->post('home/simpan-pemesanan', 'Home::simpanPemesanan');
$routes->get('home/cetak/(:num)', 'Home::cetak/$1');
$routes->get('home/export-pdf/(:num)', 'Home::exportPdf/$1');

// ========================
// ===== AUTENTIKASI ======
// ========================
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

$routes->get('register', 'Auth::register');
$routes->post('auth/saveRegister', 'Auth::saveRegister');

$routes->get('forgot', 'Auth::forgot');
$routes->post('auth/reset', 'Auth::reset');

$routes->get('edit-profile', 'Auth::editProfile');
$routes->post('update-profile', 'Auth::updateProfile');

// =========================
// ===== DASHBOARD USER ====
// =========================
$routes->get('user/dashboard', 'Home::index'); // Bisa diganti ke UserController jika ada

// =========================
// ===== KOMENTAR USER =====
// =========================
$routes->get('user/komentar', 'User::komentar');
$routes->post('user/komentar/simpan', 'User::simpanKomentar');
$routes->get('user/komentar/edit/(:num)', 'User::editKomentar/$1');
$routes->post('user/komentar/update/(:num)', 'User::updateKomentar/$1');
$routes->get('user/komentar/delete/(:num)', 'User::hapusKomentar/$1');

// ========================
// ===== ADMIN DASHBOARD ==
// ========================
$routes->get('admin/dashboard', 'Admin\Dashboard::index');

// ============================
// ===== MANAJEMEN PEMESANAN ==
// ============================
$routes->get('admin/pemesanan', 'Admin\Pemesanan::index');
$routes->get('admin/pemesanan/create', 'Admin\Pemesanan::create');
$routes->post('admin/pemesanan/store', 'Admin\Pemesanan::store');
$routes->get('admin/pemesanan/edit/(:num)', 'Admin\Pemesanan::edit/$1');
$routes->post('admin/pemesanan/update/(:num)', 'Admin\Pemesanan::update/$1');
$routes->get('admin/pemesanan/delete/(:num)', 'Admin\Pemesanan::delete/$1');

// ==========================
// === API / CHATGPT DEMO ===
// ==========================
$routes->post('chatgpt-api', 'ChatController::chat');
