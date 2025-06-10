<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masalembu Island</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.rtl.min.css" integrity="sha384-MdqCcafa5BLgxBDJ3d/4D292geNL64JyRtSGjEszRUQX9rhL1QkcnId+OT7Yw+D+" crossorigin="anonymous">
</head>
<body>

<header>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <img src="<?= base_url('../foto/logo.png') ?>" alt="Logo">
            </div>
            <h2>Masalembu</h2>

            <!-- Hamburger menu toggle -->
            <div class="menu-toggle" id="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="nav-links">
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
</header>
