<?php /** @var object $post */ /** @var array $terbaru */ ?>
<?= $this->include('layout/header') ?>

<div class="container py-5">
  <div class="row">
    <!-- Artikel Utama -->
    <div class="col-lg-8">
      <h1 class="fw-bold mb-3"><?= esc($post->title->rendered) ?></h1>
      <p class="text-muted">Diterbitkan pada: <?= date('d F Y', strtotime($post->date)) ?></p>

      <!-- Tampilkan gambar jika belum ditampilkan dalam konten -->
      <?php if (strpos($post->content->rendered, $post->_embedded->{'wp:featuredmedia'}[0]->source_url ?? '') === false): ?>
        <img src="<?= $post->_embedded->{'wp:featuredmedia'}[0]->source_url ?? 'https://via.placeholder.com/800x400?text=Gambar+Artikel' ?>" class="img-fluid rounded mb-4" alt="Gambar Artikel">
      <?php endif; ?>

      <div class="content mb-5">
        <?= $post->content->rendered ?>
      </div>

      <a href="<?= site_url('home/destinasi_wisata') ?>" class="btn btn-secondary">← Kembali ke Daftar</a>
    </div>

    <!-- Sidebar Artikel Terbaru -->
    <div class="col-lg-4">
      <h5 class="mb-3 border-bottom pb-2">Artikel Terbaru</h5>
      <ul class="list-unstyled">
        <?php foreach ($terbaru as $item): ?>
          <li class="mb-3">
            <a href="<?= site_url('detail/' . $item->id) ?>" class="text-decoration-none text-dark">
              <div class="d-flex flex-row">
                <img src="<?= $item->_embedded->{'wp:featuredmedia'}[0]->source_url ?? 'https://via.placeholder.com/80x60?text=Img' ?>" class="me-3" style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;" alt="">
                <div>
                  <small class="text-muted"><?= date('d M Y', strtotime($item->date)) ?></small><br>
                  <strong><?= character_limiter(strip_tags($item->title->rendered), 50) ?></strong>
                </div>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>

<?= $this->include('layout/footer') ?>

<style>
  .content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 15px 0;
  }
  @media screen and (max-width: 768px) {
    .d-flex.flex-row {
      flex-direction: column;
    }
    .d-flex.flex-row img {
      margin-bottom: 10px;
      width: 100%;
      height: auto;
    }
  }
</style>
