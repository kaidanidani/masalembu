<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masalembu Island</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.rtl.min.css" integrity="sha384-MdqCcafa5BLgxBDJ3d/4D292geNL64JyRtSGjEszRUQX9rhL1QkcnId+OT7Yw+D+" crossorigin="anonymous">

    <!-- FONT STYLE -->
     <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <!-- CSS -->
      
<style>
  /* NAVBAR  HEADER*/
.navbar {
    background-color: transparent;
    backdrop-filter: blur(4px);
    transition: background-color 0.3s ease;
    z-index: 999;
  }

  .navbar-nav .nav-link {
    font-weight: 500;
    color: #000;
  }

  .navbar .btn {
    padding: 6px 16px;
  }
  .nav-links {
  margin-left: auto;
  list-style: none;
  display: flex;
  align-items: center;
  gap: 1.5rem;
}

/* Styling link navigasi */
.nav-links a {
  text-decoration: none;
  color: white;
  font-weight: 500;
  transition: color 0.3s;
}

.nav-links a:hover {
  color: #ffc107;
}
/* AKHIR NAVBAR */

  /* Sticky fix */
  body {
    padding-top: 70px; /* offset navbar height */
  }
  /*  Hero dashboard */
.hero-title {
  font-size: clamp(2rem, 5vw, 4rem); /* 32px – 64px */
  font-weight: 700;
  line-height: 1.2;
  color: #FFD700; 
  font-family: 'Pacifico';
}

.hero-subtitle {
  font-size: clamp(1rem, 2.5vw, 1.5rem); /* 16px – 24px */
  line-height: 1.5;
  max-width: 600px;
}

.btn-hero {
  font-size: clamp(0.875rem, 1.5vw, 1.1rem); /* 14px – 17px */
  padding: clamp(0.4rem, 1vw, 0.7rem) clamp(1rem, 2vw, 1.8rem);
  border-radius: 2rem;
  border: none;
  background-color:rgb(91, 125, 188);
}

/* Optional: Atur background image agar tidak mengganggu */
.hero-background {
  object-fit: cover;
  height: 50vh;
  filter: brightness(0.65);

}
.btn-hero:hover {
  background-color: rgba(255, 255, 255, 0.3); /* efek hover */
}


  .footer {
  background: linear-gradient(to right,hsl(215, 37.30%, 63.70%), #4b6589, #10365d); /* Gradient biru gelap ke terang */
}

.price-overlay {
  position: absolute;
  top: 10px;
  left: 10px;
  background-color: rgba(128, 128, 128, 0.7); /* abu-abu transparan */
  color: white;
  font-weight: bold;
  border-radius: 4px;
}

/* AKhir Hero FOOTER */

/* Hero Dashboard */



/* INI CSS CARD EXPLOR MASALEMBU */
  .card {
    border-radius: 4rem;
  }
  .card-img-top {
    border-top-left-radius: 2rem;
  border-top-right-radius: 2rem;
  border-bottom-left-radius: 0 !important;
  border-bottom-right-radius: 0 !important;

  }
 .card-body .card-text {
    text-align :center;
  }
  /* FINSIH CSS CARD */


  /* CARD DESTINASI DAN OLEH-OLEH */
  .custom-card {
      border-radius: 2rem 2rem 0 0 !important;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      height: 100%;
    }

    .custom-card img {
      border-radius: 2rem 2rem 0 0 !important;
      height: 180px;
      object-fit: cover;
      width: 100%;
    }

    .card-body {
      padding: 1rem;
    }

    .btn-detail {
  background-color: #007bff;
  color: white;
  padding: 6px 16px;
  border: none;
  border-radius: 20px;
  display: inline-block;
  width: fit-content;
  font-size: 0.875rem;
  white-space: nowrap;
  transition: background-color 0.3s ease;
  align-self: flex-end;         /* tombol pindah ke kanan */
  margin-top: auto;
}

.btn-detail:hover {
  background-color: #0056b3;
}



    .section-title {
      text-align: center;
      font-weight: bold;
      font-size: 1.25rem;
      margin-bottom: 1rem;
    }

    .equal-height {
      display: flex;
      flex-direction: column;
    }

    /* AKHIR CARD OLEH2  dan Destinasi Wisata*/
/* 
CARD PAKET WISATA
*/
.container {
  align-items:center;
  display:flex;
  justify-content:center;
}
hr {
  border: none;
  height: 1px;
  background-color:rgb(178, 191, 205);
  width: 100%; /* panjang garis */
  margin: 10px auto; /* tengah secara horizontal */
}
.text-justify {
  text-align: left;
}
.harga-box {
  background-color: rgba(68, 53, 53, 0.53); /* hitam dengan 60% opasitas */
  color: white;
  padding: 4px 12px;
  border-top-right-radius: 1rem;
  border-bottom-left-radius: 1rem;
  font-weight: bold;
}

/* 
AKHIR CARD PAKET WISATA
*/


/* ///////// FOOOTERRRRR ########### */
.footer-masalembu {
    background: linear-gradient(to right, #2e64a1, #56c0ec);
  }

  .footer-masalembu .footer-bottom {
    background-color: #f1c40f; /* Mustard/kuning */
  }

  .footer-masalembu a img:hover {
    opacity: 0.8;
    transition: opacity 0.3s;
  }


/* DESTINASI WISATA */

/* hero Wisata */
.hero-section1 {  
  background: url('../foto/destinasi.jpg') center/cover no-repeat; 
  height: 300px;
  position: relative;
  display: flex;
  justify-content: auto;
}

.hero-wisata {
  padding: 2rem;
  background: url('your-image.jpg') no-repeat center center/cover;
  position: relative;
  min-height: 300px;
  display: flex;
  align-items: center;
}

.title-wisata {
  color: rgba(255, 255, 255, 0.8); /* putih agak transparan */
  font-size: 2rem !important ;
  font-weight: 700;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
  margin-bottom: 3rem;
}

/* Responsive adjustments */
@media (min-width: 768px) {
  .title-wisata {
    font-size: 3rem;
  }
}

@media (min-width: 992px) {
  .title-wisata {
    font-size: 4rem;
  }
}
 /* css hero wisata end */

 /* Destinasi wisata arikel card */
.artikel-image img {
  width: 250px;
  height: 160px;
  object-fit: cover;
  border-radius: 8px;
}


.btn-group {
  margin-top: 10px;
  display: flex;
  gap: 10px;
}

/* Responsive */
@media (max-width: 768px) {
  .artikel-card {
    flex-direction: column;
    align-items: center;
  }

  .artikel-image img {
    width: 100%;
    height: auto;
  }

<<<<<<< HEAD
  .artikel-content {
    text-align: center;
  }
}

.image-wrapper img {
  object-fit: cover;
  height: 100%;
  width: 100%;
  border-radius: 0.5rem;
}

@media (max-width: 768px) {
  .image-wrapper {
    max-width: 100% !important;
  }

  .card.flex-md-row {
    flex-direction: column !important;
  }
}
.garis{
  margin-top: 2rem;
  border: none;
  border-top: 2px solid #000;
}


/* DESTINASI WISATA ARTIKEL END */

/* //// */
/* Artikel Detail */
article h1 {
  font-size: 2rem;
  color: #1c1c1c;
}

.article-img {
  border-radius: 8px;
  overflow: hidden;
}

.btn-warning {
  border-radius: 10px;
  font-weight: 600;
}
/* end artikel detail */

/* Css Kontak start */
.kontak-table {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-top: 24px;
  margin-bottom: 48px;
}

.kontak-row {
  display: flex;
  align-items: center;
  gap: 12px;
  flex-wrap: wrap;
}

.kontak-row img {
  width: 24px;
  height: 24px;
}

.kontak-row .label {
  width: 180px;
  font-weight: 600;
}

.kontak-row .colon {
  width: 10px;
}

.kontak-row .value {
  flex: 1;
}

.container {
  padding: 0 24px;
  max-width: 1200px;
  margin: 0 auto;
}
.section-block{
  margin: 3rem 7rem 3rem 7rem;
}

/* END Kotak */


/* About Masalembu Start */


/* Masalembu End */

</style>

<!-- ///////////////////////// -->
    </head>

    <!-- //////////////////// -->

<body>

<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="../foto/logo_new.png" alt="Logo" style="height: 40px;">
      <span class="ms-2 fw-bold">Masalembu</span>
    </a>

    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-4  gap-md-4">
        <li class="nav-item"><a class="nav-link" href="../home/dashboard">Beranda</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Sumber</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Destinasi Wisata</a></li>
            <li><a class="dropdown-item" href="#">Oleh - Oleh</a></li>
            <li><a class="dropdown-item" href="#">Paket Liburan</a></li>
            <li><a class="dropdown-item" href="../home/destinasi_wisata">Berita</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="../home/kontak">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="../home/about">Tentang Kami</a></li>
        <li class="nav-item">
          <a href="#" class="btn btn-primary btn-sm text-white">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</header
