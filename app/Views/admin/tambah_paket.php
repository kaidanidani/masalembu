<?= $this->include('layout/header_admin') ?>

<section class="tambah-paket-section py-5">
  <div class="container">
    <h2 class="section-title"><?= isset($paket) ? 'Edit' : 'Tambah' ?> Paket Wisata</h2>

    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="form-tambah-paket">

     <!-- UPLOAD GAMBAR -->
   <div class="form-group upload-box">
  <label for="gambar">Foto Paket Wisata <span class="required">*</span></label>

  <div class="upload-area no-image" onclick="document.getElementById('gambar').click()">
    
    <!-- Gambar Preview (disembunyikan awalnya) -->
    <img id="previewImage" src="/foto/nyelam.jpg" alt="Preview Gambar" class="hidden">

    <!-- Label Upload -->
    <label class="upload" id="uploadLabel">
      <i class="bi bi-upload"></i> 
    </label>

    <!-- Input File -->
    <input type="file" name="gambar" id="gambar" accept="image/*" required hidden>
  </div>
</div>







      <!-- Nama Paket -->
      <div class="form-group">
        <label for="nama">Nama Paket Wisata <span class="required">*</span></label>
        <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Paket Wisata" required
               value="<?= old('nama', $paket['nama'] ?? '') ?>">
      </div>

      <!-- Harga -->
      <div class="form-group">
        <label for="harga">Harga Paket Wisata <span class="required">*</span></label>
        <input type="number" name="harga" id="harga" placeholder="Masukkan Harga Paket Wisata" required
               value="<?= old('harga', $paket['harga'] ?? '') ?>">
      </div>

      <!-- Fasilitas -->
      <div class="form-group">
        <label for="fasilitas">Fasilitas <span class="required">*</span></label>
        <textarea name="fasilitas" id="fasilitas" rows="4" required
                  placeholder="Contoh: Transportasi, makan, pemandu, dokumentasi..."><?= old('fasilitas', $paket['fasilitas'] ?? '') ?></textarea>
      </div>

      <!-- Grid Dropdown -->
      <div class="dropdown-grid">
        <!-- Kuota Orang -->
        <div class="form-group">
          <label for="kuota_orang">Kuota Orang <span class="required">*</span></label>
          <select name="kuota_orang" id="kuota_orang" required>
            <option value="">Pilih Kuota Orang</option>
            <?php for ($i = 1; $i <= 20; $i++): ?>
              <option value="<?= $i ?>" <?= old('kuota_orang', $paket['kuota_orang'] ?? '') == $i ? 'selected' : '' ?>><?= $i ?> Orang</option>
            <?php endfor; ?>
          </select>
        </div>

        <!-- Durasi -->
        <div class="form-group">
          <label for="durasi">Durasi <span class="required">*</span></label>
          <select name="durasi" id="durasi" required>
            <option value="">Pilih Durasi</option>
            <?php foreach (['1 Hari', '2 Hari', '3 Hari', '4 Hari', '5 Hari'] as $d): ?>
              <option value="<?= $d ?>" <?= old('durasi', $paket['durasi'] ?? '') == $d ? 'selected' : '' ?>><?= $d ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Kategori -->
        <div class="form-group">
          <label for="kategori">Jenis Paket <span class="required">*</span></label>
          <select name="kategori" id="kategori" required>
            <option value="">Pilih Kategori</option>
            <?php foreach (['Eksplorasi', 'Budaya', 'Relaksasi'] as $k): ?>
              <option value="<?= $k ?>" <?= old('kategori', $paket['kategori'] ?? '') == $k ? 'selected' : '' ?>><?= $k ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Kuota Paket -->
        <div class="form-group">
          <label for="kuota_paket">Kuota Paket <span class="required">*</span></label>
          <select name="kuota_paket" id="kuota_paket" required>
            <option value="">Pilih Kuota</option>
            <?php for ($i = 1; $i <= 10; $i++): ?>
              <option value="<?= $i ?>" <?= old('kuota_paket', $paket['kuota_paket'] ?? '') == $i ? 'selected' : '' ?>><?= $i ?> Paket</option>
            <?php endfor; ?>
          </select>
        </div>

        <!-- Rating Awal -->
        <div class="form-group">
          <label for="rating">Rating Awal (Opsional)</label>
          <select name="rating" id="rating">
            <option value="">Beri Rating</option>
            <?php for ($i = 0; $i <= 5; $i++): ?>
              <option value="<?= $i ?>" <?= old('rating', $paket['rating'] ?? '') == $i ? 'selected' : '' ?>><?= $i ?> ⭐</option>
            <?php endfor; ?>
          </select>
        </div>
      </div>

      <!-- Deskripsi -->
      <div class="form-group">
        <label for="deskripsi">Deskripsi Paket</label>
        <textarea name="deskripsi" id="deskripsi" rows="4" placeholder="Tulis deskripsi detail..."><?= old('deskripsi', $paket['deskripsi'] ?? '') ?></textarea>
      </div>

     <!-- Notifikasi -->
<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<!-- Tombol -->
<div class="form-group text-end mt-3">
  <button type="submit" class="btn btn-success px-4 py-2">Simpan</button>
</div>


<?= $this->include('layout/footer') ?>


<script>
  const inputGambar = document.getElementById('gambar');
  const preview = document.getElementById('previewImage');
  const label = document.getElementById('uploadLabel');
  const area = document.querySelector('.upload-area');

  inputGambar.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        label.classList.add('hidden');
        area.classList.remove('no-image');
        area.classList.add('has-image');
      };
      reader.readAsDataURL(file);
    }
  });
</script>



