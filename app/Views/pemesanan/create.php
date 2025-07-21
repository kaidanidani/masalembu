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
      <div id="wisatawan-container">
        <div class="row wisatawan-entry">
          <div class="col-md-6 mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap[]" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3 d-flex align-items-end">
            <button type="button" class="btn btn-success btn-sm" onclick="tambahWisatawan()">+ Tambah Wisatawan</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>No Telepon / Whatsapp</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Email</label>
          <input type="text" name="email" class="form-control" required>
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
        <div class="col-md-6 mb-3">
          <label>Paket Wisata</label>
          <select name="paket_wisata" id="paket_wisata" class="form-control" required onchange="updateHargaPaket()">
            <option value="">Pilih Paket Wisata</option>
            <?php foreach ($paketList as $p): ?>
              <option value="<?= $p['nama'] ?>"><?= $p['nama'] ?></option>
            <?php endforeach; ?>
          </select>
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
        <div class="col-md-6 mb-3">
          <label>Tanggal Berangkat</label>
          <input type="date" name="tanggal_berangkat" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Tanggal Pulang</label>
          <input type="date" name="tanggal_pulang" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Keberangkatan</label>
          <select name="keberangkatan" class="form-control" required>
            <option value="">Pilih Pelabuhan</option>
            <option value="Pelabuhan Kali Anget">Pelabuhan Kali Anget</option>
            <option value="Surabaya">Surabaya</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label>Kedatangan</label>
          <input type="text" name="kedatangan" class="form-control" value="Pelabuhan Masalembu" readonly>
        </div>
      </div>
    </div>

    <!-- 3. Transportasi & Akomodasi -->
    <div class="mb-5">
      <h5 class="mb-3">3. Detail Transportasi & Akomodasi</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Pilihan Transportasi</label>
          <input type="text" name="transportasi" class="form-control" value="Kapal Laut" readonly>
        </div>
        <div class="col-md-6 mb-3">
          <label>Penginapan</label>
          <input type="text" name="penginapan" class="form-control" value="Home Stay" readonly>
        </div>
      </div>
    </div>

    <!-- 4. Fasilitas Tambahan -->
    <div class="mb-5">
      <h5 class="mb-3">4. Fasilitas Tambahan (Opsional)</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Penyewaan Kendaraan</label>
          <select name="kendaraan" class="form-control">
            <option value="">Pilih Kendaraan</option>
            <option value="Sepeda">Sepeda</option>
            <option value="Motor">Motor</option>
            <option value="Mobil">Mobil</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label>Asuransi Perjalanan</label>
          <select name="asuransi" class="form-control">
            <option value="">Pilih Asuransi</option>
            <option value="Kesehatan">Kesehatan</option>
            <option value="Perjalanan">Perjalanan</option>
            <option value="Kesehatan dan Perjalanan">Kesehatan dan Perjalanan</option>
            <option value="Kesehatan, Perjalanan dan Refund">Kesehatan, Perjalanan dan Refund</option>
          </select>
        </div>
      </div>
    </div>

    <!-- 5. Catatan -->
    <div class="mb-5">
      <h5 class="mb-3">5. Catatan Tambahan</h5>
      <textarea name="catatan" class="form-control" rows="3"></textarea>
    </div>

    <!-- 6. Pembayaran -->
    <div class="mb-5">
      <h5 class="mb-3">6. Pembayaran</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label>Pembayaran via Bank</label>
          <input type="text" name="bank" id="bank" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
          <label>Harga Paket</label>
          <input type="number" name="harga_paket" id="harga_paket" class="form-control" required>
        </div>
      </div>
    </div>

    <!-- Submit -->
    <div class="d-flex justify-content-end mb-5">
      <button type="submit" class="btn btn-primary px-4">Checkout</button>
    </div>
  </form>
</div>

<!-- Script Tambah Wisatawan -->
<script>
  function tambahWisatawan() {
    const container = document.getElementById('wisatawan-container');
    const entry = document.createElement('div');
    entry.classList.add('row', 'wisatawan-entry');
    entry.innerHTML = `
      <div class="col-md-6 mb-3">
        <input type="text" name="nama_lengkap[]" class="form-control" placeholder="Nama Lengkap" required>
      </div>
      <div class="col-md-6 mb-3 d-flex align-items-end">
        <button type="button" class="btn btn-danger btn-sm" onclick="this.closest('.wisatawan-entry').remove()">Hapus</button>
      </div>
    `;
    container.appendChild(entry);
  }

  // Harga paket berdasarkan nama paket (dari PHP)
  const paketHarga = <?= json_encode(array_column($paketList, 'harga', 'nama')) ?>;

  function updateHargaPaket() {
    const namaPaket = document.getElementById('paket_wisata').value;
    const harga = paketHarga[namaPaket] || '';
    document.getElementById('harga_paket').value = harga;
  }

  // Set default bank QRIS saat halaman dimuat
  window.addEventListener('DOMContentLoaded', () => {
    document.getElementById('bank').value = 'QRIS';
  });
</script>

<?= $this->include('layout/footer') ?>