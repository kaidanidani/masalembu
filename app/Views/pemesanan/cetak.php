<?= $this->include('layout/header') ?>

<!-- Hero Section -->
<section class="hero-section1 mb-5">
  <div class="hero-wisata">
    <div class="d-flex justify-content-start">
      <h1 class="title-wisata">Bukti Pemesanan</h1>
    </div>
  </div>
</section>

<div class="container my-5">
  <!-- Informasi Pemesan -->
  <div class="border p-3 mb-4">
    <h5 class="mb-3"><strong>INFORMASI PEMESAN</strong></h5>
    <p>ID Pesanan : #<?= str_pad($pemesanan['id'], 4, '0', STR_PAD_LEFT) ?></p>
    <p>Nama Lengkap : <?= esc($pemesanan['nama_lengkap']) ?></p>
    <p>No Telepon / Whatsapp : <?= esc($pemesanan['no_hp']) ?></p>
    <p>Email : <?= esc($pemesanan['email']) ?></p>
    <p>Alamat Lengkap : <?= esc($pemesanan['alamat']) ?></p>
  </div>

  <!-- Informasi Perjalanan -->
  <div class="border p-3 mb-4">
    <h5 class="mb-3"><strong>INFORMASI PERJALANAN</strong></h5>
    <p>Paket Wisata : <?= esc($pemesanan['paket_wisata']) ?></p>
    <p>Tanggal Berangkat : <?= date('l, d F Y', strtotime($pemesanan['tanggal_berangkat'])) ?></p>
    <p>Tanggal Pulang : <?= date('l, d F Y', strtotime($pemesanan['tanggal_pulang'])) ?></p>
    <p>Jumlah Penumpang : <?= esc($pemesanan['jumlah_penumpang']) ?> Orang</p>
  </div>

  <!-- Transportasi & Akomodasi -->
  <div class="border p-3 mb-4">
    <h5 class="mb-3"><strong>INFORMASI TRANSPORTASI & AKOMODASI</strong></h5>
    <p>Transportasi : <?= esc($pemesanan['transportasi'] ?? 'Kapal Laut') ?></p>
    <p>Penginapan : <?= esc($pemesanan['penginapan']) ?></p>
  </div>

  <!-- Fasilitas Tambahan -->
  <div class="border p-3 mb-4">
    <h5 class="mb-3"><strong>INFORMASI FASILITAS TAMBAHAN</strong></h5>
    <p>Penyewaan Kendaraan : <?= esc($pemesanan['kendaraan'] ?: '-') ?></p>
    <p>Asuransi Perjalanan : <?= esc($pemesanan['asuransi'] ?: '-') ?></p>
  </div>

  <!-- Pilihan Pembayaran -->
  <div class="border p-3 mb-4">
    <h5 class="mb-3"><strong>PILIHAN PEMBAYARAN</strong></h5>
    <p><?= esc($pemesanan['bank']) ?: 'QRIS' ?></p>
  </div>

  <!-- Rincian Harga -->
  <div class="border p-3 mb-4">
    <div class="d-flex justify-content-between">
      <p>Harga Paket</p>
      <p>Rp. <?= number_format($pemesanan['harga_paket'], 0, ',', '.') ?>,-</p>
    </div>
    <div class="d-flex justify-content-between">
      <p>Admin</p>
      <p>Rp. <?= number_format($pemesanan['biaya_admin'], 0, ',', '.') ?>,-</p>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <strong>Total Pembayaran</strong>
      <strong>Rp. <?= number_format($pemesanan['total_bayar'], 0, ',', '.') ?>,-</strong>
    </div>
  </div>

  <!-- Tombol -->
  <div class="d-flex justify-content-end gap-3">
    <a href="<?= base_url('home/export-pdf/' . $pemesanan['id']) ?>" class="btn btn-danger" target="_blank">
      Cetak Sekarang
    </a>
    <a href="<?= base_url('home/cek_pesanan/' . $pemesanan['id']) ?>" class="btn btn-primary">Cetak Nanti</a>
  </div>
</div>

<?= $this->include('layout/footer') ?>