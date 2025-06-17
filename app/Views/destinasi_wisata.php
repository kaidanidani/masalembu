<?= $this->include('layout/header') ?>

<!-- Hero Section -->
<section class="hero-section1">
  <!-- SESUDAH -->
<div class="hero-wisata">
  <div class="d-flex justify-content-start">
    <h1 class="title-wisata">DESTINASI WISATA</h1>
  </div>
</div>

</section>
<br>
  <div class="container py-5">
  <div class="row g-4">
    <div class="d-flex justify-content-start">
    <h3 class="pt-3 pb-3 mb-1">Artikel Terkait</h3>
  </div>
  <hr class="garis mt-1">
    <?php foreach ($posts as $post): ?>
      <div class="col-12">
        <div class="card shadow-sm border-0 pe-md-4 ps-md-2 pb-3 pt-3 flex-shrink-0 h-100 d-flex flex-md-row flex-column overflow-hidden">
          <!-- Gambar -->
          <div class="image-wrapper p-3 flex-shrink-0" style="max-width: 280px; width: 100%;">
            <img
              src="<?= $post->_embedded->{'wp:featuredmedia'}[0]->source_url ?? 'https://via.placeholder.com/400x250?text=Gambar+Artikel' ?>"
              class="img-fluid w-100 h-100 object-fit-cover rounded"
              alt="Gambar Artikel"
            >
          </div>

          <!-- Konten -->
          <div class="flex-grow-1 d-flex flex-column p-3">
            <h5 class="card-title mb-2"><?= esc($post->title->rendered) ?></h5>
            <p class="card-text text-muted mb-3"><?= character_limiter(strip_tags($post->excerpt->rendered), 200) ?></p>
            <div class="mt-auto d-flex justify-content-end gap-2">
              <a href="#" class="btn btn-warning">Pesan</a>
              <a href="<?= site_url('detail/'.$post->id) ?>" class="btn btn-primary">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->include('layout/footer') ?>
