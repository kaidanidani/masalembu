<?= $this->include('layout/header') ?>

<!-- Hero Section -->
<section class="hero-section1 mb-5">
  <div class="hero-wisata">
    <div class="d-flex justify-content-start">
      <h1 class="title-wisata">Form Pembayaran Destinasi Wisata</h1>
    </div>
  </div>
</section>

<div class="container mb-5">

  <!-- Informasi Pemesan -->
  <div class="border p-3 mb-4">
    <h5><strong>Informasi Pemesan</strong></h5>
    <p>Nama Wisatawan : <?= esc($pemesanan['nama_lengkap']) ?></p>
    <p>No Telepon / Whatsapp : <?= esc($pemesanan['no_hp']) ?></p>
    <p>Email : <?= esc($pemesanan['email']) ?></p>
    <p>Alamat Lengkap : <?= esc($pemesanan['alamat']) ?></p>
  </div>

  <!-- Informasi Perjalanan -->
  <div class="border p-3 mb-4">
    <h5><strong>Informasi Perjalanan</strong></h5>
    <p>Paket Wisata : <?= esc($pemesanan['paket_wisata']) ?></p>
    <p>Tanggal Berangkat : <?= date('l, d F Y', strtotime($pemesanan['tanggal_berangkat'])) ?></p>
    <p>Tanggal Pulang : <?= date('l, d F Y', strtotime($pemesanan['tanggal_pulang'])) ?></p>
    <p>Jumlah Penumpang : <?= esc($pemesanan['jumlah_penumpang']) ?> Orang</p>
  </div>

  <!-- Informasi Transportasi -->
  <div class="border p-3 mb-4">
    <h5><strong>Informasi Transportasi & Akomodasi</strong></h5>
    <p>Transportasi : <?= esc($pemesanan['transportasi'] ?? 'Kapal Laut') ?></p>
    <p>Keberangkatan : <?= esc($pemesanan['keberangkatan'] ?? '-') ?></p>
    <p>Kedatangan : <?= esc($pemesanan['kedatangan'] ?? 'Pelabuhan Masalembu') ?></p>
    <p>Penginapan : <?= esc($pemesanan['penginapan']) ?></p>
  </div>

  <!-- Informasi Tambahan -->
  <div class="border p-3 mb-4">
    <h5><strong>Informasi Fasilitas Tambahan</strong></h5>
    <p>Penyewaan Kendaraan : <?= esc($pemesanan['kendaraan'] ?? '-') ?></p>
    <p>Asuransi Perjalanan : <?= esc($pemesanan['asuransi'] ?? '-') ?></p>
  </div>

  <!-- Catatan -->
  <div class="border p-3 mb-4">
    <h5><strong>Catatan Tambahan</strong></h5>
    <p><?= esc($pemesanan['catatan'] ?: '-') ?></p>
  </div>

  <!-- Pilihan Pembayaran -->
  <div class="border p-3 mb-4">
    <h5><strong>Pilihan Pembayaran</strong></h5>
    <p>QRIS</p>
  </div>

  <!-- Rincian Harga -->
  <div class="p-3 mb-4">
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

  <!-- Info tambahan -->
  <p class="mb-4"><em>*Keberangkatan ke Masalembu Menyesuaikan Jadwal Kapal. Silahkan Konfirmasi ke Admin.</em></p>

  <!-- Tombol Snap -->
  <div class="d-flex justify-content-end">
    <button type="button" id="pay-button" class="btn btn-primary px-4">Bayar Sekarang</button>
  </div>
</div>

<!-- Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-PVpS3CLqvXogQG68"></script>
<script>
  document.getElementById('pay-button').addEventListener('click', function () {
    snap.pay("<?= $snapToken ?>", {
      onSuccess: function(result){
        window.location.href = "/home/cetak/<?= $pemesanan['id'] ?>";
      },
      onPending: function(result){
        alert("Transaksi pending. Tunggu konfirmasi.");
      },
      onError: function(result){
        alert("Transaksi gagal.");
      }
    });
  });
</script>

<?= $this->include('layout/footer') ?>