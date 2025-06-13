<?= $this->include('layout/header') ?>

<section class="position-relative overflow-hidden" style="height: 400px;">
  <!-- Gambar latar -->
  <img src="../foto/view1.png" class="w-100 h-100 object-fit-cover" alt="View Masalembu">

  <!-- Overlay opsional untuk kontras -->
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

  <!-- Teks di atas gambar -->
  <div class="position-absolute top-50 start-50 translate-middle text-center text-warning px-3">
    <h1 class="display-5 fw-bold">Tour Masalembu Island</h1>
    <p class="lead">Scuba | Diving | Snorkeling | Kakatua | Seafood</p>
    <a href="#" class="btn btn-primary mt-2">Mulai Jelajahi</a>
  </div>
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

<!--PAKET WISATA BUDAYA & TRADISI-->
<div class="text-center py-2 mb-3 bg-primary text-white fs-4 fw-bold">
  Paket Wisata Eksplorasi
</div>


    
  <!-- CARD Paket Wisata -->

<div class="container my-4">
  <div class="row justify-content-md-end justify-content-center gy-4">

    <!-- Kartu 1 -->
    <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
      <div class="card" style="width: 18rem;">
        <div class="image-wrapper">
          <img src="../foto/view2.jpg" class="card-img-top" alt="...">
          <div class="price-tag-bottom">Rp 250.000</div>
        </div>
        <div class="card-body">
          <h5 class="card-title">
            <span>Card Title</span>
            <a href="#" class="btn btn-primary btn-sm">Go</a>
          </h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card’s content.
          </p>
          <hr>
          <p class="text-muted mb-0">Stok terbatas – segera pesan!</p>
        </div>
      </div>
    </div>

    <!-- Kartu 2 -->
    <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
      <div class="card" style="width: 18rem;">
        <div class="image-wrapper">
          <img src="../foto/view2.jpg" class="card-img-top" alt="...">
          <div class="price-tag-bottom">Rp 250.000</div>
        </div>
        <div class="card-body">
          <h5 class="card-title">
            <span>Card Title</span>
            <a href="#" class="btn btn-primary btn-sm">Go</a>
          </h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card’s content.
          </p>
          <hr>
          <p class="text-muted mb-0">Stok terbatas – segera pesan!</p>
        </div>
      </div>
    </div>
    <!-- Kartu 3 -->
    <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
      <div class="card" style="width: 18rem;">
        <div class="image-wrapper">
          <img src="../foto/view2.jpg" class="card-img-top" alt="...">
          <div class="price-tag-bottom">Rp 250.000</div>
        </div>
        <div class="card-body">
          <h5 class="card-title">
            <span>Card Title</span>
            <a href="#" class="btn btn-primary btn-sm">Go</a>
          </h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card’s content.
          </p>
          <hr>
          <p class="text-muted mb-0">Stok terbatas – segera pesan!</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Paket Wisata Budaya & Tradisi  -->
<div class="text-center py-2 my-2 bg-primary text-white judul-section">Paket Wisata Budaya & Tradisi</div>

     <!-- CARD Paket Wisata -->

<div class="container my-4">
  <div class="row justify-content-center gy-4">

    <!-- Kartu -->
    <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
      <div class="card" style="width: 18rem;">
        <div class="image-wrapper">
          <img src="../foto/view2.jpg" class="card-img-top" alt="...">
          <div class="price-tag-bottom">Rp 250.000</div>
        </div>
        <div class="card-body">
          <h5 class="card-title">
            <span>Card Title</span>
            <a href="#" class="btn btn-primary btn-sm">Go</a>
          </h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card’s content.
          </p>
          <hr>
          <p class="text-muted mb-0">Stok terbatas – segera pesan!</p>
        </div>
      </div>
    </div>

     <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
      <div class="card" style="width: 18rem;">
        <div class="image-wrapper">
          <img src="../foto/view2.jpg" class="card-img-top" alt="...">
          <div class="price-tag-bottom">Rp 250.000</div>
        </div>
        <div class="card-body">
          <h5 class="card-title">
            <span>Card Title</span>
            <a href="#" class="btn btn-primary btn-sm">Go</a>
          </h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the card’s content.
          </p>
          <hr>
          <p class="text-muted mb-0">Stok terbatas – segera pesan!</p>
        </div>
      </div>
    </div>

    <!-- Duplikat kartu lainnya tinggal di-copy -->
  </div>
</div>

<?= $this->include('layout/footer') ?>
