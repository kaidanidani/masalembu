<?php echo $this->include('layout/header') ?>

<!-- HERO SECTION -->
<section class="hero-section position-relative text-white">
  <img src="<?= base_url('foto/view1.png') ?>" class="w-100 img-fluid hero-background" alt="Background Masalembu">
  <div class="container position-absolute top-50 start-50 translate-middle">
    <div class="d-flex flex-column align-items-center text-center gap-3 px-3">
      <h1 class="hero-title"><span id="typed-text"></span><span class="cursor">|</span></h1>
      <p class="hero-subtitle">Scuba | Diving | Snorkeling | Kakatua | Seafood</p>
      <a href="#paket-wisata" class="btn btn-outline-light btn-hero">Mulai Jelajahi</a>
    </div>
  </div>
</section>


<!-- Explore -->
<section class="container my-5 explore-section">
  <h2 class="text-center text-dark mb-4">Explore Masalembu</h2>
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




<!-- CAROUSEL DINAMIS FULLSCREEN -->
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner">
    <?php if (!empty($carouselItems)) : ?>
      <?php foreach ($carouselItems as $index => $item) : ?>
        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
          <div class="carousel-img-wrapper">
            <img src="<?= base_url('foto/' . $item['gambar']) ?>" class="d-block w-100 carousel-image" alt="<?= esc($item['judul']) ?>">
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="carousel-item active">
        <div class="carousel-img-wrapper">
          <img src="<?= base_url('foto/view1.png') ?>" class="d-block w-100 carousel-image" alt="Default Slide">
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>







<!-- SECTION: Berita -->
<section class="container my-5">
  <h2 class="text-center mb-5">Berita Terbaru Masalembu</h2>
  <div class="row g-4">
    <?php if (!empty($berita)) : ?>
      <?php foreach ($berita as $b) : ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 d-flex flex-column shadow-sm">
            <div style="height: 180px; overflow: hidden;">
              <img src="<?= $b['thumbnail'] ?>" class="w-100" alt="<?= esc($b['judul']) ?>" style="object-fit: cover; height: 100%;">
            </div>
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







<!-- SECTION PAKET PER KATEGORI -->
<?php
$kategoriPaket = [
  'Eksplorasi' => $paketEksplorasi,
  'Budaya & Tradisi' => $paketBudaya,
  'Keluarga & Relaksasi' => $paketRelaksasi
];

foreach ($kategoriPaket as $judul => $paketList):
  shuffle($paketList);
  $idCarousel = strtolower(str_replace([' ', '&'], '', $judul)) . 'Carousel';
?>
<section class="py-5 bg-primary-subtle">
  <div class="container position-relative">
    <h2 class="text-center text-primary mb-4">Paket Wisata <?= esc($judul) ?></h2>

    <div id="<?= $idCarousel ?>" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php foreach (array_chunk($paketList, 3) as $index => $paketChunk): ?>
          <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
            <div class="row g-3 justify-content-center flex-nowrap overflow-auto" style="scroll-snap-type: x mandatory;">
              <?php foreach ($paketChunk as $paket): ?>
                <div class="col-md-4 col-10" style="scroll-snap-align: center;">
                  <div class="card card-paket shadow-sm small">
                    <div class="paket-img-wrapper">
                      <img src="<?= base_url('foto/' . $paket['gambar']) ?>" class="card-img-top paket-img" alt="<?= esc($paket['nama']) ?>">
                    </div>
                    <div class="card-body d-flex flex-column">
                      <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="fw-semibold mb-0"><?= esc($paket['nama']) ?></h6>
                        <a href="<?= site_url('paket/' . $paket['slug']) ?>" class="btn btn-sm btn-detail text-nowrap">Lihat Detail</a>
                      </div>
                      <p class="small mb-2"><strong>Fasilitas:</strong> <?= esc($paket['fasilitas']) ?></p>
                      <div class="mt-auto">
                        <hr class="paket-divider">
                        <div class="d-flex justify-content-between align-items-center pt-1">
                          <small class="text-muted">Durasi: <?= esc($paket['durasi']) ?></small>
                          <span class="text-warning">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                              <i class="bi bi-star<?= $i <= round($paket['rating_dinamis']) ? '-fill' : '' ?>"></i>
                            <?php endfor ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#<?= $idCarousel ?>" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#<?= $idCarousel ?>" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>
<?php endforeach ?>

<?= $this->include('layout/footer') ?>

<style>
.card.card-paket {
  min-height: 440px;
  display: flex;
  flex-direction: column;
  border-radius: 12px;
  overflow: hidden;
}
.paket-img-wrapper {
  height: 180px;
  overflow: hidden;
}
.paket-img {
  height: 100%;
  width: 100%;
  object-fit: cover;
}
.card-paket .card-body {
  flex: 1;
  display: flex;
  flex-direction: column;
  padding: 1rem;
}
.paket-divider {
  border-top: 1px solid #ccc;
  margin-top: 0.25rem;
  margin-bottom: 0.2rem;
}
.card-paket .card-body p {
  margin-bottom: 0.25rem !important;
}
.btn-detail {
  background-color: #007bff;
  color: white;
  border: none;
}
.btn-detail:hover {
  background-color: #0056b3;
  color: white;
}
.carousel-control-prev.custom-carousel-btn,
.carousel-control-next.custom-carousel-btn {
  background: transparent;
  border: none;
  filter: brightness(0);
  opacity: 0.8;
  top: 50%;
  transform: translateY(-50%);
  width: 2.5rem;
  height: 2.5rem;
  z-index: 5;
}
.carousel-control-prev.custom-carousel-btn {
  left: -60px;
}
.carousel-control-next.custom-carousel-btn {
  right: -60px;
}
@media (max-width: 768px) {
  .carousel-control-prev.custom-carousel-btn {
    left: -20px;
  }
  .carousel-control-next.custom-carousel-btn {
    right: -20px;
  }
  .carousel-inner .row {
    flex-wrap: nowrap;
    overflow-x: auto;
  }
  .carousel-inner .col-md-4 {
    flex: 0 0 90%;
    max-width: 90%;
  }
}
.cursor {
  display: inline-block;
  font-weight: bold;
  color: white;
  animation: blink 0.7s infinite;
}

@keyframes blink {
  0%, 100% { opacity: 1; }
  50% { opacity: 0; }
}

</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const text = "Tour Masalembu Island";
    const typedText = document.getElementById("typed-text");
    const cursor = document.querySelector(".cursor");
    let i = 0;
    let isDeleting = false;

    function typeEffect() {
      if (!isDeleting) {
        typedText.textContent += text.charAt(i);
        i++;
        if (i === text.length) {
          isDeleting = true;
          setTimeout(typeEffect, 1500); // jeda sebelum menghapus
          return;
        }
      } else {
        typedText.textContent = text.substring(0, i - 1);
        i--;
        if (i === 0) {
          isDeleting = false;
        }
      }
      setTimeout(typeEffect, isDeleting ? 60 : 100); // kecepatan ketik/hapus
    }

    typeEffect();
  });
</script>

