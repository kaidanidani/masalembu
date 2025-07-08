<?= $this->include('layout/header') ?>
<!-- HERO SECTION -->
<section class="hero-section position-relative text-white">
  <img src="../foto/view1.png" class="w-100 img-fluid hero-background" alt="Background Masalembu">

  <div class="container position-absolute top-50 start-50 translate-middle">
    <div class="d-flex flex-column align-items-center text-center gap-3 px-3">
      <h1 class="hero-title">Tour Masalembu Island</h1>
      <p class="hero-subtitle">Scuba | Diving | Snorkeling | Kakatua | Seafood</p>
      <a href="#" class="btn btn-outline-light btn-hero">Mulai Jelajahi</a>
    </div>
  </div>
</section>





<!-- Konten lain dashboard -->
<div class="container mt-5">
  <p>Selamat datang di dashboard wisata Masalembu.</p>
</div>

<div class="container my-4">
  <div class="row row-cols-1 row-cols-md-4 g-4">
   
  <div class="col">
      <div class="card h-100">
        <img src="../foto/snorkeling.png" class="card-img-top rounded-top" alt="Gambar 2">
        <div class="card-body">
          <p class="card-text">Deskripsi card kedua.</p>
        </div>
      </div>
    </div>
    

    <div class="col">
      <div class="card h-100">
        <img src="../foto/diving.png" class="card-img-top rounded-top" alt="Gambar 2">
        <div class="card-body">
          <p class="card-text">Deskripsi card kedua.</p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="../foto/scuba.png" class="card-img-top rounded-top" alt="Gambar 3">
        <div class="card-body">
          <p class="card-text">Deskripsi card ketiga.</p>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100">
        <img src="../foto/burung-kakatua.png" class="card-img-top rounded-top" alt="Gambar 4">
        <div class="card-body">
          <p class="card-text">Deskripsi card keempat.</p>
        </div>
      </div>
    </div>

  </div>
</div>




<!-- Carousel Section -->
<section class="container my-5">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="height: 500px;">
      <div class="carousel-item active">
        <img src="../foto/view3.jpg" class="d-block w-100" alt="View 3">
      </div>
      <div class="carousel-item">
        <img src="../foto/view4.jpg" class="d-block w-100" alt="View 4">
      </div>
      <div class="carousel-item">
        <img src="../foto/view5.jpg" class="d-block w-100" alt="View 5">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>


<!-- Destinasi Wisata -->

  <div class="container py-5">
  <div class="row">
    <!-- Kolom Kiri: Destinasi Wisata -->
    <div class="col-md-6">
      <div class="section-title">Destinasi Wisata</div>
      <div class="row g-3">
        <!-- Card 1 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/destinasi1.png" alt="Pulau">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Menjelajahi Keindahan Tersembunyi Masalembu: Surga di Tengah Laut</p>
              <a href="#" class="btn btn-detail ">Lihat Detail</a>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/destinasi2.png" alt="Karang">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Pulau Karang Masalembu yang Menyimpan Biota Laut</p>
              <a href="#" class="btn btn-detail btn-end">Lihat Detail</a>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/destinasi3.png" alt="Senja">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Pesona Senja di Pantai Masalembu</p>
              <a href="#" class="btn btn-detail">Lihat Detail</a>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/destinasi4.png" alt="Senja">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Pesona Senja di Pantai Masalembu</p>
              <a href="#" class="btn btn-detail mt-auto">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Kolom Kanan: Oleh-Oleh -->
    <div class="col-md-6">
      <div class="section-title">Oleh - Oleh</div>
      <div class="row g-3">
        <!-- Card 1 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/oleholeh1.png" alt="Ikan">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Rekomendasi Buah Tangan: Ikan Kering Khas Masalembu</p>
              <a href="#" class="btn btn-detail mt-auto">Lihat Detail</a>
            </div>
          </div>
        </div>
        <!-- Card 2 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/oleholeh2.png" alt="Rempah">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Rempah Tradisional dari Masalembu</p>
              <a href="#" class="btn btn-detail mt-auto">Lihat Detail</a>
            </div>
          </div>
        </div>
        <!-- Card 3 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/oleholeh3.png" alt="Seafood">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Oleh-Oleh Olahan Laut Segar</p>
              <a href="#" class="btn btn-detail mt-auto">Lihat Detail</a>
            </div>
          </div>
        </div>
        <!-- Card 4 -->
        <div class="col-md-6">
          <div class="card custom-card equal-height">
            <img src="../foto/oleholeh4.png" alt="Camilan">
            <div class="card-body d-flex flex-column">
              <p class="card-text">Camilan Unik dari Masalembu</p>
              <a href="#" class="btn btn-detail mt-auto">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--PAKET WISATA EKSPLORASI-->
<div class="text-center py-2 mb-3 bg-primary text-white fs-4 fw-bold">
  Paket Wisata Eksplorasi
</div>

<div class="container">
  <div class="row justify-content-center g-4">

    <!-- Card 1 -->
    <div class="col-12 col-sm-10 col-md-6 col-lg-4">
      <div class="card h-100">
        <div class="position-relative">
          <img src="../foto/paket_masalembu_adventure.png" class="card-img-top rounded-top-4" alt="Masalembu Adventure">
          <div class="position-absolute bottom-0 start-0 px-3 py-1 bg-dark text-white harga-box" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
            Rp.3.000.000
          </div>
        </div>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title fw-semibold mb-0">Masalembu Adventure</h6>
            <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
          </div>
          <p class="text-justify small">
            <strong>Fasilitas:</strong><br>
            Transportasi laut, Home Stay, Makan 3x sehari, Pemandu wisata lokal, Peralatan snorkeling, Dokumentasi foto & video (kamera DSLR + GoPro)
          </p>
          <hr>
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">Duration: 2 Days</small>
            <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-12 col-sm-10 col-md-6 col-lg-4">
      <div class="card h-100">
        <div class="position-relative">
          <img src="../foto/paket_island_hopping.png" class="card-img-top rounded-top-4" alt="Island Hopping">
          <div class="position-absolute bottom-0 start-0 px-3 py-1 bg-dark text-white harga-box" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
            Rp.3.000.000
          </div>
        </div>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title fw-semibold mb-0">Island Hopping</h6>
            <a href="#" class="btn btn-primary btn-sm">Lihat Detai</a>
          </div>
          <p class="text-justify small">
            <strong>Fasilitas:</strong><br>
            Transportasi laut, Home Stay, Makan 3x sehari, Pemandu wisata lokal, Peralatan snorkeling, Dokumentasi foto & video (kamera DSLR + GoPro)
          </p>
          <hr>
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">Duration: 2 Days</small>
            <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-12 col-sm-10 col-md-6 col-lg-4">
      <div class="card h-100">
        <div class="position-relative">
          <img src="../foto/paket_snorkeling_diving.png" class="card-img-top rounded-top-4" alt="Snorkeling & Diving">
          <div class="position-absolute bottom-0 start-0 px-3 py-1 bg-dark text-white harga-box" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
            Rp.3.000.000
          </div>
        </div>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title fw-semibold mb-0">Snorkeling & Diving</h6>
            <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
          </div>
          <p class="text-justify small">
            <strong>Fasilitas:</strong><br>
            Transportasi laut, Home Stay, Makan 3x sehari, Pemandu wisata lokal, Peralatan snorkeling, Dokumentasi foto & video (kamera DSLR + GoPro)
          </p>
          <hr>
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">Duration: 2 Days</small>
            <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<br>
<!--Paket Wisata Budaya & Tradisi-->
<div class="text-center py-2 mb-3 bg-primary text-white fs-4 fw-bold">
  Paket Wisata Budaya & Tradisi
</div>

<div class="container">
  <div class="row justify-content-center g-4">
    <!-- Card 1 -->
    <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4">
      <div class="card h-100">
        <div class="position-relative">
          <img src="../foto/oleholeh1.png" class="card-img-top rounded-top-4" alt="Masalembu Adventure">
          <div class="position-absolute bottom-0 start-0 px-3 py-1 harga-box bg-dark text-white" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
            Rp.2.000.000
          </div>
        </div>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title fw-semibold mb-0">Kenikmatan Ikan Segar</h6>
            <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
          </div>
          <p class="small text-justify">
            <strong>Fasilitas:</strong><br>
            Mengikuti nelayan melaut, peralatan memancing, Workshop pengolahan hasil laut, Makan hasil tangkapan sendiri, Dokumentasi foto/video
          </p>
          <hr>
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">Duration: 2 Days</small>
            <div><span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4">
      <div class="card h-100">
        <div class="position-relative">
          <img src="../foto/oleholeh3.png" class="card-img-top rounded-top-4" alt="Masalembu Adventure">
          <div class="position-absolute bottom-0 start-0 px-3 py-1 harga-box bg-dark text-white" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
            Rp.2.000.000
          </div>
        </div>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title fw-semibold mb-0">Kuliner Masalembu</h6>
            <a href="<?= site_url('paket/masalembu-adventure') ?>" class="btn btn-primary btn-sm">Lihat Detail</a>

          </div>
          <p class="small text-justify">
            <strong>Fasilitas:</strong><br>
            Merasakan memasak kuliner khas Masalembu, Wisata kuliner lokal, Makan siang & makan malam spesial, Dokumentasi 1 jam selama kegiatan
          </p>
          <hr>
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">Duration: 2 Days</small>
            <div><span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<!--Paket Wisata Keluarga & Relaksasi-->
<div class="text-center py-2 mb-3 bg-primary text-white fs-4 fw-bold">
  Paket Wisata Keluarga & Relaksasi
</div>

<div class="container">
  <div class="row justify-content-center g-4">

    <!-- Card 1 -->
    <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4">
      <div class="card h-100">
        <div class="position-relative">
          <img src="../foto/oleholeh1.png" class="card-img-top rounded-top-4" alt="Masalembu Adventure">
          <div class="position-absolute bottom-0 start-0 px-3 py-1 harga-box bg-dark text-white" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
            Rp.2.000.000
          </div>
        </div>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title fw-semibold mb-0">Kenikmatan Ikan Segar</h6>
            <a href="<?= site_url('paket/masalembu-adventure') ?>" class="btn btn-primary btn-sm">Lihat Detail</a>

          </div>
          <p class="small text-justify">
            <strong>Fasilitas:</strong><br>
            Mengikuti nelayan melaut, peralatan memancing, Workshop pengolahan hasil laut, Makan hasil tangkapan sendiri, Dokumentasi foto/video
          </p>
          <hr>
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">Duration: 2 Days</small>
            <div><span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4">
      <div class="card h-100">
        <div class="position-relative">
          <img src="../foto/oleholeh3.png" class="card-img-top rounded-top-4" alt="Masalembu Adventure">
          <div class="position-absolute bottom-0 start-0 px-3 py-1 harga-box bg-dark text-white" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
            Rp.2.000.000
          </div>
        </div>
        <div class="card-body d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title fw-semibold mb-0">Kuliner Masalembu</h6>
           <a href="<?= site_url('paket/masalembu-adventure') ?>" class="btn btn-primary btn-sm">Lihat Detail</a>

          </div>
          <p class="small text-justify">
            <strong>Fasilitas:</strong><br>
            Merasakan memasak kuliner khas Masalembu, Wisata kuliner lokal, Makan siang & makan malam spesial, Dokumentasi 1 jam selama kegiatan
          </p>
          <hr>
          <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">Duration: 2 Days</small>
            <div><span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br>
<?= $this->include('layout/footer') ?>