<?= $this->include('layout/header') ?>

<!-- Hero Section -->
<section class="admin-hero text-white text-center" style="background: url('<?= base_url('foto/destinasi.jpg') ?>') center/cover no-repeat; padding: 100px 0;">
  <div class="container">
    <h1 class="display-4 fw-bold" style="font-family: 'Pacifico', cursive;">Tour Masalembu Island</h1>
    <p class="lead fs-4 text-danger fw-semibold">Dashboard Admin</p>
  </div>
</section>

<!-- Statistik Section -->
<section class="admin-statistik py-5 bg-light">
  <div class="container">
    <div class="row g-4 justify-content-center">
      <?php
        $cards = [
          ['icon' => 'bi-person-fill', 'color' => 'primary', 'label' => 'Jumlah Pengunjung', 'value' => $totalPengunjung ?? 0],
          ['icon' => 'bi-basket-fill', 'color' => 'success', 'label' => 'Total Pemesanan', 'value' => $totalPemesanan ?? 0],
          ['icon' => 'bi-journal-text', 'color' => 'info', 'label' => 'Artikel Terbit', 'value' => $totalArtikel ?? 0],
          ['icon' => 'bi-star-fill', 'color' => 'warning', 'label' => 'Reviews', 'value' => $totalReview ?? 0]
        ];
        foreach ($cards as $c):
      ?>
      <div class="col-lg-3 col-md-6 d-flex">
        <div class="card-statistik text-center p-4 rounded shadow bg-warning bg-opacity-10 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
          <i class="bi <?= $c['icon'] ?> fs-1 text-<?= $c['color'] ?>"></i>
          <h5 class="fw-bold mt-2"><?= $c['label'] ?></h5>
          <h3 class="fw-bold"><?= $c['value'] ?></h3>
        </div>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</section>


<!-- CHAT BOT -->
<div class="container mt-4">
  <h4>Chat Terbaru Pengguna</h4>

  <?php if (!empty($chatPerUser)) : ?>
    <?php
      // Ambil satu pengguna dengan pesan terakhir (pengguna terbaru)
      $uid = array_key_first($chatPerUser);
      $chat = $chatPerUser[$uid];
    ?>
    <div class="card mb-3 shadow-sm">
      <div class="card-body">
        <h5 class="card-title"><?= esc($chat['nama']) ?></h5>
        <p class="card-text">
          <?= esc($chat['pesan_terakhir']['message']) ?>
          <br>
          <small class="text-muted"><?= date('d M Y H:i', strtotime($chat['pesan_terakhir']['created_at'])) ?></small>
        </p>
       <a href="<?= base_url('admin/chat/detail/' . urlencode($uid)) ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
      </div>
    </div>
  <?php else : ?>
    <div class="alert alert-warning">Tidak ada chat.</div>
  <?php endif; ?>
</div>





<section class="admin-konten py-5" style="background: url('<?= base_url('foto/destinasi1.png') ?>') center/cover no-repeat;">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      <!-- Pesanan -->
      <div class="col-lg-6 d-flex">
        <div class="card admin-card shadow-sm p-4 bg-white rounded w-100">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">Pesanan Terbaru</h5>
            <a href="<?= base_url('admin/pemesanan') ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pesananTerbaru as $p): ?>
                  <tr>
                    <td><?= esc($p['id']) ?></td>
                    <td><?= esc($p['nama_lengkap']) ?></td>
                    <td><?= date('d/m/Y', strtotime($p['created_at'])) ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Artikel -->
      <div class="col-lg-6 d-flex">
        <div class="card admin-card shadow-sm p-4 bg-white rounded w-100">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">Pengelolaan Artikel</h5>
            <a href="http://localhost:8888/cms/wp-admin/post-new.php" target="_blank" class="btn btn-success btn-sm">+ Tambah</a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered mb-0">
              <thead class="table-light">
                <tr>
                  <th>Judul</th>
                  <th>Penulis</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($artikelTerbaru as $a): ?>
                  <tr>
                    <td><?= esc($a['title']['rendered']) ?></td>
                    <td><?= esc($a['_embedded']['author'][0]['name']) ?></td>
                    <td><?= date('d/m/Y', strtotime($a['date'])) ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Media Sosial & Feedback -->
<section class="admin-media-feedback py-5" style="background: url('<?= base_url('foto/destinasi2.png') ?>') center/cover no-repeat;">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      <!-- Media Sosial -->
      <div class="col-lg-6 d-flex">
        <div class="card admin-card w-100 shadow-sm p-3 bg-white rounded">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">Media Sosial</h5>
            <a href="<?= base_url('admin/media') ?>" class="btn btn-info btn-sm">Lihat</a>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead class="table-light">
                <tr><th>Gambar</th><th>Caption</th></tr>
              </thead>
              <tbody>
                <?php foreach ($mediaSosial as $media): ?>
                  <tr>
                    <td><img src="<?= esc($media['gambar']) ?>" width="100" class="img-thumbnail"></td>
                    <td><?= esc($media['caption']) ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Feedback -->
      <div class="col-lg-6 d-flex">
        <div class="card admin-card w-100 shadow-sm p-3 bg-white rounded">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">Feedback Pengunjung</h5>
            <a href="<?= base_url('admin/feedback') ?>" class="btn btn-warning btn-sm">Balas</a>
          </div>
          <?php if ($feedback): ?>
            <div class="bg-light p-3 rounded">
              <strong><?= esc($feedback['nama_lengkap']) ?></strong>
              <small class="text-muted"><?= date('d/m/Y', strtotime($feedback['updated_at'])) ?></small>
              <p class="mt-2"><?= esc($feedback['feedback_user']) ?></p>
            </div>
          <?php else: ?>
            <p class="text-muted">Belum ada feedback.</p>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->include('layout/footer_admin') ?>
