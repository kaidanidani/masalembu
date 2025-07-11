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

<!-- SECTION: Paket Wisata -->
<section id="paket-wisata" class="container py-5">
  <h2 class="text-center mb-5">Paket Wisata Tersedia</h2>
  <div class="row g-4 justify-content-center">
    <?php if (!empty($paketWisata)) : ?>
      <?php foreach ($paketWisata as $paket) : ?>
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
                  <?php for ($i = 1; $i <= 5; $i++) {
                    echo '<i class="bi bi-star' . ($i <= $paket['rating'] ? '-fill' : '') . '"></i>';
                  } ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    <?php else : ?>
      <div class="col-12">
        <div class="alert alert-warning text-center">Belum ada paket wisata tersedia.</div>
      </div>
    <?php endif ?>
  </div>
</section>

<!-- Berita dari CMS WordPress -->
<section class="container my-5">
  <h2 class="text-center mb-5">Berita Terbaru Masalembu</h2>
  <div class="row g-4">
    <?php if (!empty($berita)) : ?>
      <?php foreach ($berita as $b) : ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="<?= $b['thumbnail'] ?>" class="card-img-top" alt="<?= esc($b['judul']) ?>">
            <div class="card-body">
              <h6 class="card-title"><?= esc($b['judul']) ?></h6>
              <p class="card-text small"><?= character_limiter(strip_tags($b['konten']), 100) ?></p>
             <a href="<?= site_url('home/detail_artikel/' . $b['id']) ?>" class="btn btn-outline-primary btn-sm">Baca Selengkapnya</a>

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

<?= $this->include('layout/footer') ?>
