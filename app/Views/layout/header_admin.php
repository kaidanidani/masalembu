<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Masalembu</title>

  <!-- BOOTSTRAP CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">

<!-- BOOTSTRAP ICONS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- SWIPER CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

<!-- BOOTSTRAP & SWIPER JS (pakai defer agar tidak blokir loading halaman) -->

<!-- CUSTOM CSS -->
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  
</head>

<body>
<header>
  <!-- Header Admin (sama tampilan dengan user, tapi menu berbeda) -->
<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="<?= site_url('/admin/dashboard') ?>">
      <img src="<?= base_url('foto/logo_new.png') ?>" alt="Logo" style="height: 40px;">
      <span class="ms-2 fw-bold">Masalembu</span>
    </a>

    <!-- Toggle for Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Menu -->
    <div class="collapse navbar-collapse" id="navbarAdmin">
      <ul class="navbar-nav me-auto ms-4 gap-md-4">
        <li class="nav-item"><a class="nav-link" href="<?= site_url('/admin/dashboard') ?>">Dashboard</a></li>
      <a class="nav-link" href="<?= site_url('/admin/pemesanan') ?>">Pemesanan</a>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('/admin/media') ?>">Media Sosial</a></li>
        <li class="nav-item">
  <a class="nav-link" href="http://localhost:8888/cms/wp-admin/post-new.php" target="_blank">CMS Artikel</a>
</li>

        <li class="nav-item"><a class="nav-link" href="<?= site_url('/admin/Keuangan') ?>">Keuangan</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= site_url('/admin/feedback') ?>">Feedback</a></li>
      </ul>

      <!-- Admin User Info -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
            <?php if (session()->get('foto')): ?>
              <img src="<?= base_url('uploads/' . session()->get('foto')) ?>" class="rounded-circle me-2" width="32" height="32" alt="Profil">
            <?php else: ?>
              <i class="bi bi-person-circle fs-5 me-2"></i>
            <?php endif; ?>
            <?= esc(session()->get('username')) ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="<?= site_url('/edit-profile') ?>"><i class="bi bi-pencil-square me-2"></i>Edit Profil</a></li>
            <li><a class="dropdown-item text-danger" href="<?= site_url('/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

</header>
