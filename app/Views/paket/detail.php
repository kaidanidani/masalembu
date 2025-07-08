<?= $this->include('layout/header') ?>

<div class="container py-4">
  <div class="row">
    <div class="col-md-6">
      <img src="<?= $paket['gambar'] ?>" class="img-fluid rounded" alt="<?= $paket['nama'] ?>">
    </div>
    <div class="col-md-6">
      <h3><?= $paket['nama'] ?></h3>
      <p class="text-warning">⭐ <?= $paket['rating'] ?> / 5.0</p>
      <h4 class="text-danger fw-bold">Rp. <?= number_format($paket['harga'], 0, ',', '.') ?></h4>
      <ul>
        <?php foreach ($paket['fasilitas'] as $f) : ?>
          <li><?= esc($f) ?></li>
        <?php endforeach ?>
      </ul>

      <!-- Tombol Pesan -->
    <?php if (!empty($paket['slug'])): ?>
  <?php $redirectUrl = base_url('/home/form-pemesanan/' . $paket['slug']); ?>
  <a href="<?= session()->get('is_logged_in') ? $redirectUrl : site_url('/login?redirect=' . urlencode($redirectUrl)) ?>" class="btn btn-primary">
    Pesan Sekarang
  </a>
<?php else: ?>
  <button class="btn btn-secondary" disabled>Paket Tidak Valid</button>
<?php endif; ?>
      </a>
    </div>
  </div>
</div>

<?= $this->include('layout/footer') ?>
