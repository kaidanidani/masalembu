<?= $this->include('layout/header') ?>

<!-- Hero Section -->
<section class="hero-section1 mb-5">
  <div class="hero-wisata">
    <div class="d-flex justify-content-start">
      <h1 class="title-wisata">Form Pemesanan</h1>
    </div>
  </div>
</section>

<div class="container">
  <form action="/home/simpan-pemesanan" method="post" class="mt-4">

    <!-- 1. Informasi Pemesan -->
    <div class="mb-5">
      <h5 class="mb-3">1. Informasi Pemesan</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Nama Depan</label>
          <input type="text" name="nama_depan" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Nama Belakang</label>
          <input type="text" name="nama_belakang" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>No Telepon / Whatsapp</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="col-12 mb-3">
          <label>Alamat Lengkap</label>
          <textarea name="alamat" rows="2" class="form-control" required></textarea>
        </div>
      </div>
    </div>

    <!-- 2. Detail Perjalanan -->
    <div class="mb-5">
      <h5 class="mb-3">2. Detail Perjalanan</h5>
      <div class="row">
        <div class="col-12 mb-3">
          <label>Paket Wisata</label>
          <input type="text" name="paket_wisata" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Tanggal Berangkat</label>
          <input type="date" name="tanggal_berangkat" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Tanggal Pulang</label>
          <input type="date" name="tanggal_pulang" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Jumlah Penumpang</label>
          <select name="jumlah_penumpang" class="form-control" required>
            <option value="">Pilih Jumlah</option>
            <?php for ($i = 1; $i <= 10; $i++): ?>
              <option value="<?= $i ?>"><?= $i ?> Orang</option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
    </div>

    <!-- 3. Transportasi & Akomodasi -->
    <div class="mb-5">
      <h5 class="mb-3">3. Detail Transportasi & Akomodasi</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Pilihan Transportasi</label>
          <input type="text" name="transportasi" class="form-control">
        </div>
        <div class="col-md-6 mb-3">
          <label>Penginapan</label>
          <input type="text" name="penginapan" class="form-control" value="Home Stay">
        </div>
      </div>
    </div>

    <!-- 4. Fasilitas Tambahan -->
    <div class="mb-5">
      <h5 class="mb-3">4. Fasilitas Tambahan (Opsional)</h5>
      <div class="row">
        <div class="col-md-4 mb-3">
          <label>Pilihan Makanan</label>
          <select name="makanan" class="form-control">
            <option value="">Pilih Makanan</option>
            <option value="Makanan Lokal">Makanan Lokal</option>
            <option value="Vegetarian">Vegetarian</option>
            <option value="Buffet">Buffet</option>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label>Penyewaan Kendaraan</label>
          <select name="kendaraan" class="form-control">
            <option value="">Pilih Kendaraan</option>
            <option value="Motor">Motor</option>
            <option value="Mobil">Mobil</option>
            <option value="Sepeda">Sepeda</option>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label>Asuransi Perjalanan</label>
          <select name="asuransi" class="form-control">
            <option value="">Pilih Asuransi</option>
            <option value="Ya">Ya</option>
            <option value="Tidak">Tidak</option>
          </select>
        </div>
      </div>
    </div>

    <!-- 6. Catatan -->
    <div class="mb-5">
      <h5 class="mb-3">5. Catatan Tambahan</h5>
      <textarea name="catatan" class="form-control" rows="3"></textarea>
    </div>

    <!-- 7. Pembayaran -->
    <div class="mb-5">
      <h5 class="mb-3">6. Pembayaran</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Pembayaran via Bank</label>
          <input type="text" name="bank" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Harga Paket</label>
          <input type="number" name="harga_paket" class="form-control" required>
        </div>
      </div>
    </div>

   <!-- Submit -->
<div class="d-flex justify-content-end mb-5">
  <button type="submit" class="btn btn-primary px-4">Checkout</button>
</div>
</form>
</div>

<?= $this->include('layout/footer') ?>
