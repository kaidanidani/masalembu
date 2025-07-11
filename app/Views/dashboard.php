<?= $this->include('layout/header') ?>

<!-- HERO SECTION -->
<section class="hero-section position-relative text-white">
  <img src="<?= base_url('foto/view1.png') ?>" class="w-100 img-fluid hero-background" alt="Background Masalembu">
  <div class="container position-absolute top-50 start-50 translate-middle">
    <div class="d-flex flex-column align-items-center text-center gap-3 px-3">
      <h1 class="hero-title">Tour Masalembu Island</h1>
      <p class="hero-subtitle">Scuba | Diving | Snorkeling | Kakatua | Seafood</p>
      <a href="#paket-wisata" class="btn btn-outline-light btn-hero">Mulai Jelajahi</a>
    </div>
  </div>
</section>

<!-- Informasi Dasar -->
<div class="container mt-5">
  <p>Selamat datang di dashboard wisata Masalembu.</p>
</div>


<!-- Explore -->
<section class="container my-5 explore-section">
  <h2 class="text-center text-white mb-4">Explore Masalembu</h2>
  <div class="row justify-content-center text-center g-3">
    <?php
    $kategori = [
      ['Snorkling Area', 'snorkling.png'],
      ['Diving Spot', 'diving.png'],
      ['Scuba Spot', 'scuba.png'],
      ['Burung Kakatua Mini', 'burung-kakatua.png'],
      ['Aneka Seafood', 'seafood.png'],
    ];
    foreach ($kategori as $k) : ?>
      <div class="col-6 col-md-2">
        <div class="explore-card bg-white shadow rounded overflow-hidden">
          <img src="<?= base_url('foto/' . $k[1]) ?>" alt="<?= $k[0] ?>" class="img-fluid rounded-top">
          <p class="mt-2 mb-2 small fw-semibold"><?= $k[0] ?></p>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>



<!-- SECTION: Berita -->
<section class="container my-5">
  <h2 class="text-center mb-5">Berita Terbaru Masalembu</h2>
  <div class="row g-4">
    <?php if (!empty($berita)) : ?>
      <?php foreach ($berita as $b) : ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 d-flex flex-column shadow-sm">
            <!-- Gambar -->
            <div style="height: 180px; overflow: hidden;">
              <img src="<?= $b['thumbnail'] ?>" class="w-100" alt="<?= esc($b['judul']) ?>" style="object-fit: cover; height: 100%;">
            </div>

            <!-- Konten -->
            <div class="card-body py-3 px-3 d-flex flex-column">
              <h6 class="card-title mb-2"><?= esc($b['judul']) ?></h6>
              <p class="card-text small mb-3"><?= character_limiter(strip_tags($b['konten']), 100) ?></p>
              <a href="<?= site_url('home/detail_artikel/' . $b['id']) ?>" class="btn btn-primary btn-sm ms-auto d-block w-auto mt-auto">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <div class="col-12">
        <div class="alert alert-info text-center">Belum ada berita tersedia.</div>
      </div>
    <?php endif ?>
  </div>
</section>



<!-- SECTION: Paket Wisata Eksplorasi -->
<section class="py-5 bg-primary-subtle">
  <div class="container">
    <h2 class="text-center text-primary mb-5">Paket Wisata Eksplorasi</h2>
    <div class="row g-4">
      <?php foreach ($paketEksplorasi as $paket) : ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            <div class="position-relative">
              <img src="<?= base_url('foto/' . $paket['gambar']) ?>" class="card-img-top" alt="<?= esc($paket['nama']) ?>">
              <div class="position-absolute bottom-0 start-0 px-3 py-1 bg-dark text-white" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
                Rp. <?= number_format($paket['harga'], 0, ',', '.') ?>
              </div>
            </div>
            <div class="card-body d-flex flex-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="card-title fw-semibold mb-0"><?= esc($paket['nama']) ?></h6>
                <a href="<?= site_url('paket/' . $paket['slug']) ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
              </div>
              <p class="text-justify small"><strong>Fasilitas:</strong> <?= esc($paket['fasilitas']) ?></p>
              <hr>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <small class="text-muted">Durasi: <?= esc($paket['durasi']) ?></small>
                <span class="text-warning">
                <?php
                $rating = round($paket['rating_dinamis']); // ambil dari hasil join, bukan kolom 'rating'
                for ($i = 1; $i <= 5; $i++) {
                  echo '<i class="bi bi-star' . ($i <= $rating ? '-fill' : '') . '"></i>';
                }?>
              </span>

                </span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<!-- SECTION: Paket Wisata Budaya -->
<section class="py-5 bg-primary-subtle">
  <div class="container">
    <h2 class="text-center text-primary mb-5">Paket Wisata Budaya & Tradisi</h2>
    <div class="row g-4">
      <?php foreach ($paketBudaya as $paket) : ?>
        <div class="col-md-6 col-lg-4">
          <!-- Copy ulang card yang sama -->
          <div class="card h-100 shadow-sm">
            <div class="position-relative">
              <img src="<?= base_url('foto/' . $paket['gambar']) ?>" class="card-img-top" alt="<?= esc($paket['nama']) ?>">
              <div class="position-absolute bottom-0 start-0 px-3 py-1 bg-dark text-white" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
                Rp. <?= number_format($paket['harga'], 0, ',', '.') ?>
              </div>
            </div>
            <div class="card-body d-flex flex-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="card-title fw-semibold mb-0"><?= esc($paket['nama']) ?></h6>
                <a href="<?= site_url('paket/' . $paket['slug']) ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
              </div>
              <p class="text-justify small"><strong>Fasilitas:</strong> <?= esc($paket['fasilitas']) ?></p>
              <hr>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <small class="text-muted">Durasi: <?= esc($paket['durasi']) ?></small>
                <?php
                $rating = round($paket['rating_dinamis']); // ambil dari hasil join, bukan kolom 'rating'
                for ($i = 1; $i <= 5; $i++) {
                  echo '<i class="bi bi-star' . ($i <= $rating ? '-fill' : '') . '"></i>';
                }?>
              </span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<!-- SECTION: Paket Wisata Relaksasi -->
<section class="py-5 bg-primary-subtle">
  <div class="container">
    <h2 class="text-center text-primary mb-5">Paket Wisata Keluarga & Relaksasi</h2>
    <div class="row g-4">
      <?php foreach ($paketRelaksasi as $paket) : ?>
        <div class="col-md-6 col-lg-4">
          <!-- Copy ulang card yang sama -->
          <div class="card h-100 shadow-sm">
            <div class="position-relative">
              <img src="<?= base_url('foto/' . $paket['gambar']) ?>" class="card-img-top" alt="<?= esc($paket['nama']) ?>">
              <div class="position-absolute bottom-0 start-0 px-3 py-1 bg-dark text-white" style="border-bottom-left-radius: 1rem; border-top-right-radius: 1rem; opacity: 0.8;">
                Rp. <?= number_format($paket['harga'], 0, ',', '.') ?>
              </div>
            </div>
            <div class="card-body d-flex flex-column">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="card-title fw-semibold mb-0"><?= esc($paket['nama']) ?></h6>
                <a href="<?= site_url('paket/' . $paket['slug']) ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
              </div>
              <p class="text-justify small"><strong>Fasilitas:</strong> <?= esc($paket['fasilitas']) ?></p>
              <hr>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <small class="text-muted">Durasi: <?= esc($paket['durasi']) ?></small>
                <span class="text-warning">
                  <?php
                $rating = round($paket['rating_dinamis']); // ambil dari hasil join, bukan kolom 'rating'
                for ($i = 1; $i <= 5; $i++) {
                  echo '<i class="bi bi-star' . ($i <= $rating ? '-fill' : '') . '"></i>';
                }?>
              </span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</section>

<?= $this->include('layout/footer') ?>
