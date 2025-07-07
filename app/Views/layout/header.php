<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masalembu Island</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">

  <!-- Font Google -->
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
<header>
  <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand d-flex align-items-center" href="<?= site_url('/') ?>">
        <img src="<?= base_url('foto/logo_new.png') ?>" alt="Logo" style="height: 40px;">
        <span class="ms-2 fw-bold">Masalembu</span>
      </a>

      <!-- Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto ms-4 gap-md-4">
          <li class="nav-item"><a class="nav-link" href="<?= site_url('/home/dashboard') ?>">Beranda</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Sumber</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Destinasi Wisata</a></li>
              <li><a class="dropdown-item" href="#">Oleh - Oleh</a></li>
              <li><a class="dropdown-item" href="#">Paket Liburan</a></li>
              <li><a class="dropdown-item" href="<?= site_url('/home/destinasi_wisata') ?>">Berita</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('/home/kontak') ?>">Kontak</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= site_url('/home/about') ?>">Tentang Kami</a></li>
        </ul>

        <!-- Login / User -->
        <ul class="navbar-nav ms-auto">
          <?php if (session()->get('is_logged_in')): ?>
            <li class="nav-item d-flex align-items-center">
              <span class="nav-link">
                <i class="bi bi-person-circle"></i> <?= esc(session()->get('username')) ?>
              </span>
            </li>
            <li class="nav-item">
              <a class="nav-link text-danger" href="<?= site_url('/logout') ?>">
                <i class="bi bi-box-arrow-right"></i> Logout
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a href="<?= site_url('/login') ?>" class="btn btn-primary btn-sm text-white">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
