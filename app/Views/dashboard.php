<?= $this->include('layout/header') ?>

<!-- HERO -->
<section class="hero custom-padding">
  <div class="hero-content">
    <h1 class="display-4">Tour Masalembu Island</h1>
    <p class="lead">Scuba | Diving | Snorkeling | Kakatua | Seafood</p>
    <a href="#" class="btn btn-primary">Mulai Jelajahi</a>
  </div>
</section>

</section>

<!-- Explore Section -->
<section class="container my-5">
  <h2 class="text-center mb-4">Explore Masalembu</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php for ($i = 0; $i < 3; $i++): ?>
    <div class="col">
      <div class="card h-100">
        <img src="../foto/view2.jpg" class="card-img-top" alt="View Masalembu">
        <div class="card-body">
          <h5 class="card-title">Tempat Indah <?= $i + 1 ?></h5>
          <p class="card-text">Nikmati keindahan alam Masalembu yang menakjubkan, cocok untuk wisata bahari dan relaksasi.</p>
        </div>
      </div>
    </div>
    <?php endfor; ?>
  </div>
</section>

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

<section style="height: 1000px; background: #f5f5f5;">
  <div class="container text-center">
    <h2>Scroll ke bawah</h2>
    <p>Ini hanya konten dummy untuk menguji efek scroll.</p>
  </div>
</section>


<!-- Destinasi Wisata -->
<section class="container my-5">
  <h2 class="text-center mb-4">Destinasi Wisata & Oleh-Oleh</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php for ($i = 0; $i < 4; $i++): ?>
    <div class="col">
      <div class="card h-100">
        <img src="../foto/view2.jpg" class="card-img-top" alt="Destinasi <?= $i + 1 ?>">
        <div class="card-body">
          <h5 class="card-title">Destinasi <?= $i + 1 ?></h5>
          <p class="card-text">Temukan pesona unik dari destinasi Masalembu dan nikmati oleh-oleh khas dari masyarakat lokal.</p>
        </div>
      </div>
    </div>
    <?php endfor; ?>
  </div>
</section>

<?= $this->include('layout/footer') ?>
