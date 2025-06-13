<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masalembu Island</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.rtl.min.css" integrity="sha384-MdqCcafa5BLgxBDJ3d/4D292geNL64JyRtSGjEszRUQX9rhL1QkcnId+OT7Yw+D+" crossorigin="anonymous">

    <!-- CSS -->
      <link rel="stylesheet" href= "<?= base_url('../../style.css')?>">



<style>
  .image-wrapper {
    position: relative;
  }

  .price-tag-bottom {
    position: absolute;
    bottom: 0px;
    right: 0px;
    background: rgba(0, 123, 255, 0.8);
    color: white;
    padding: 4px 10px;
    font-weight: bold;
    border-radius: 0px;
  }

  .card-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .judul-section {
    font-size: 1.5rem; /* Bisa diganti sesuai kebutuhan */
    font-weight: bold; 
    width: 100%;
  }


  .hero-section {
  position: relative;
  height: 400px; /* kamu bisa ubah ke 300px jika mau lebih pendek */
  overflow: hidden;
}

.hero-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.hero-overlay {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  padding: 1rem;
  z-index: 1;
}

.hero-section::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.4); /* efek gelap */
  z-index: 0;
}

</style>

    </head>
<body>

<header>
   <nav class="navbar custom-navbar">
  <div class="container d-flex justify-content-between align-items-center">
    
    <!-- Logo + Judul -->
    <div class="logo d-flex align-items-center">
      <img src="<?= base_url('../foto/logo_new.png') ?>" alt="Logo" style="height: 50px;">
      <span class="ms-2 fs-4 fw-bold">Masalembu</span>
    </div>

    <!-- Toggle (mobile) -->
    <div class="menu-toggle d-md-none" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <!-- Navigasi -->
    <ul class="nav-links d-none d-md-flex align-items-center gap-4">
      <li><a href="#">Beranda</a></li>
      <li class="dropdown">
        <a href="#">Sumber ▾</a>
        <ul class="dropdown-menu">
          <li><a href="#">Destinasi Wisata</a></li>
          <li><a href="#">Oleh - Oleh</a></li>
          <li><a href="#">Paket Liburan</a></li>
          <li><a href="#">Berita</a></li>
        </ul>
      </li>
      <li><a href="#">Kontak</a></li>
      <li><a href="#">Tentang Kami</a></li>
      <li><a href="#" class="btn-login">Login</a></li>
    </ul>
  </div>
</nav>
