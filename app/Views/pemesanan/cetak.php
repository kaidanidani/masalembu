

<?= $this->section('content') ?>
<div class="cetak-wrapper container my-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold">Bukti Pemesanan</h2>
    <p class="text-muted">Destinasi Wisata Masalembu</p>
  </div>

  <table class="table table-borderless">
    <thead class="table-light">
      <tr><th colspan="2">Informasi Pemesan</th></tr>
    </thead>
    <tbody>
      <tr><td>Nama Lengkap</td><td>: <?= esc($pemesanan['nama_lengkap']) ?></td></tr>
      <tr><td>No HP</td><td>: <?= esc($pemesanan['no_hp']) ?></td></tr>
      <tr><td>Email</td><td>: <?= esc($pemesanan['email']) ?></td></tr>
      <tr><td>Alamat</td><td>: <?= esc($pemesanan['alamat']) ?></td></tr>
    </tbody>

    <thead class="table-light mt-3">
      <tr><th colspan="2">Informasi Perjalanan</th></tr>
    </thead>
    <tbody>
      <tr><td>Paket Wisata</td><td>: <?= esc($pemesanan['paket_wisata']) ?></td></tr>
      <tr><td>Tanggal Berangkat</td><td>: <?= date('l, d F Y', strtotime($pemesanan['tanggal_berangkat'])) ?></td></tr>
      <tr><td>Tanggal Pulang</td><td>: <?= date('l, d F Y', strtotime($pemesanan['tanggal_pulang'])) ?></td></tr>
      <tr><td>Jumlah Penumpang</td><td>: <?= esc($pemesanan['jumlah_penumpang']) ?> Orang</td></tr>
    </tbody>

    <thead class="table-light mt-3">
      <tr><th colspan="2">Transportasi & Akomodasi</th></tr>
    </thead>
    <tbody>
      <tr><td>Transportasi</td><td>: <?= esc($pemesanan['transportasi']) ?></td></tr>
      <tr><td>Penginapan</td><td>: <?= esc($pemesanan['penginapan']) ?></td></tr>
    </tbody>

    <thead class="table-light mt-3">
      <tr><th colspan="2">Fasilitas Tambahan</th></tr>
    </thead>
    <tbody>
      <tr><td>Makanan</td><td>: <?= esc($pemesanan['makanan']) ?: '-' ?></td></tr>
      <tr><td>Kendaraan</td><td>: <?= esc($pemesanan['kendaraan']) ?: '-' ?></td></tr>
      <tr><td>Asuransi</td><td>: <?= esc($pemesanan['asuransi']) ?: '-' ?></td></tr>
    </tbody>

    <thead class="table-light mt-3">
      <tr><th colspan="2">Pembayaran</th></tr>
    </thead>
    <tbody>
      <tr><td>Bank</td><td>: <?= esc($pemesanan['bank']) ?></td></tr>
      <tr><td>Harga Paket</td><td>: Rp <?= number_format($pemesanan['harga_paket'], 0, ',', '.') ?></td></tr>
      <tr><td>Biaya Admin</td><td>: Rp <?= number_format($pemesanan['biaya_admin'], 0, ',', '.') ?></td></tr>
      <tr><td><strong>Total Pembayaran</strong></td><td><strong>: Rp <?= number_format($pemesanan['total_bayar'], 0, ',', '.') ?></strong></td></tr>
    </tbody>
  </table>

  <div class="text-end mt-4 btn-wrapper">
    <button onclick="window.print()" class="btn btn-success">Cetak</button>
    <a href="/home/export-pdf/<?= $pemesanan['id'] ?>" class="btn btn-danger">Unduh PDF</a>
  </div>
</div>

