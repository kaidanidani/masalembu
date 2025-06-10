<?= $this->include('layout/header') ?>

<section class="hero">
    <h1>Tour Masalembu Island</h1>
    <p>Scuba | Diving | Snorkling | Kakatua | Seafood</p>
    <a href="#" class="btn">Mulai Jelajahi</a>
</section>

<!-- Tambahkan komponen lainnya di sini -->
 <h1>Explore Masalembu</h1>

 <!-- Card -->

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="../foto/view2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="../foto/view2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="../foto/view2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="../foto/view2.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>
<!-- Corousel -->
 <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner" style="height: 500px">
    <div class="carousel-item active">
      <img src="../foto/view3.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../foto/view4.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../foto/view5.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <!-- Tambahkan controls (optional) -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<?= $this->include('layout/footer') ?>
