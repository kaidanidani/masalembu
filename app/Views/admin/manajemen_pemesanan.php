<?= $this->include('layout/header') ?>

<section class="bg-light py-5" style="background: url('<?= base_url('foto/destinasi.jpg') ?>') center/cover no-repeat;">
  <div class="container text-white text-center mb-4">
    <h2 class="fw-bold display-5 text-shadow">Manajemen Paket Wisata</h2>
  </div>

  <div class="container">
    <div class="row g-4">
      <!-- Kartu Status Pemesanan -->
      <div class="col-lg-6">
        <div class="bg-white rounded shadow p-4">
          <ul class="nav nav-tabs mb-4" id="pemesananTabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active fw-bold" data-bs-toggle="tab" href="#status" role="tab">Status Pesanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold" data-bs-toggle="tab" href="#riwayat" role="tab">Riwayat Pesanan</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="status" role="tabpanel">
              <div class="row g-3">
                <?php
                $statusList = [
                  'Menunggu Konfirmasi' => $jumlah['konfirmasi'] ?? 0,
                  'Pembatalan' => $jumlah['batal'] ?? 0,
                  'Menunggu Kapal' => $jumlah['kapal'] ?? 0,
                  'Belum Bayar' => $jumlah['belum_bayar'] ?? 0,
                  'Proses Keberangkatan' => $jumlah['berangkat'] ?? 0,
                  'Selesai' => $jumlah['selesai'] ?? 0,
                ];

                foreach ($statusList as $label => $jumlah): ?>
                  <div class="col-6">
                    <div class="border rounded p-3 text-center bg-light h-100">
                      <h4 class="mb-1 fw-bold"><?= $jumlah ?></h4>
                      <small class="text-muted"><?= $label ?></small>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>

            <div class="tab-pane fade" id="riwayat" role="tabpanel">
              <p class="text-muted text-center">Fitur Riwayat Pesanan akan ditambahkan.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Kartu Aksi Paket Wisata -->
      <div class="col-lg-6">
        <div class="bg-warning bg-opacity-10 rounded shadow p-4 d-flex align-items-center justify-content-center h-100">
          <div class="text-center">
            <img src="<?= base_url('foto/destinasi2.png') ?>" alt="Paket Wisata" width="120" class="mb-3">
            <h5 class="fw-bold">Paket Wisata</h5>
            <p class="text-muted">Lihat dan kelola daftar paket wisata yang tersedia.</p>
            <a href="<?= base_url('admin/paket') ?>" class="btn btn-outline-primary btn-sm">Kelola Paket</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->include('layout/footer') ?>
