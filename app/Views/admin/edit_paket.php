<?= $this->include('layout/header_admin') ?>


<!-- Hero Section -->
<section class="admin-hero text-white text-center" style="background: url('<?= base_url('foto/destinasi.jpg') ?>') center/cover no-repeat; padding: 100px 0;">
  <div class="container">
    <h1 class="display-4 fw-bold" style="font-family: 'Pacifico', cursive;">Edit Paket Wisata</h1>
    <p class="lead fs-4 text-danger fw-semibold">Dashboard Admin</p>
  </div>
</section>

<section class="tambah-paket-section">

    <form action="<?= base_url('admin/paket/update/' . $paket['id']) ?>" method="post" enctype="multipart/form-data">


     <!-- Upload Gambar -->
<div class="form-group upload-box">
  <label for="gambar">Foto Paket Wisata <span class="required">*</span></label>

  <div class="upload-area <?= $paket['gambar'] ? 'has-image' : 'no-image' ?>" onclick="document.getElementById('gambar').click()">
    
    <!-- Gambar Preview -->
    <img id="previewImage" src="<?= $paket['gambar'] ? base_url('foto/' . $paket['gambar']) : '' ?>" 
         alt="Preview Gambar" class="<?= $paket['gambar'] ? '' : 'hidden' ?>">

    <!-- Label Ganti Gambar -->
    <label class="upload-label <?= $paket['gambar'] ? 'hidden' : '' ?>" id="uploadLabel">
      <i class="bi bi-arrow-repeat"></i> + Ganti Gambar
    </label>

    <!-- Input -->
    <input type="file" name="gambar" id="gambar" accept="image/*" hidden>
  </div>
</div>


      <!-- Nama Paket -->
      <div class="form-group">
        <label for="nama">Nama Paket Wisata <span class="required">*</span></label>
        <input type="text" name="nama" id="nama" value="<?= $paket['nama'] ?>" required>
      </div>

      <!-- Harga -->
      <div class="form-group">
        <label for="harga">Harga Paket Wisata <span class="required">*</span></label>
        <input type="number" name="harga" id="harga" value="<?= $paket['harga'] ?>" required>
      </div>

      <!-- Fasilitas -->
      <div class="form-group">
        <label for="fasilitas">Fasilitas Paket Wisata <span class="required">*</span></label>
        <textarea name="fasilitas" rows="4" required><?= $paket['fasilitas'] ?></textarea>
      </div>

      <!-- Dropdown dan lainnya -->
      <div class="dropdown-grid">
        <div class="form-group">
           <label for="Durasi">Durasi <span class="required">*</span></label>
          <select name="durasi" required>
            <option value="">Durasi Paket</option>
            <option <?= $paket['durasi'] == '1 Hari' ? 'selected' : '' ?>>1 Hari</option>
            <option <?= $paket['durasi'] == '2 Hari' ? 'selected' : '' ?>>2 Hari</option>
            <option <?= $paket['durasi'] == '3 Hari' ? 'selected' : '' ?>>3 Hari</option>
            <option <?= $paket['durasi'] == '4 Hari' ? 'selected' : '' ?>>4 Hari</option>
            <option <?= $paket['durasi'] == '5 Hari' ? 'selected' : '' ?>>5 Hari</option>
          </select>
        </div>
        <div class="form-group">
          <label for="Kategori">Kategori <span class="required">*</span></label>
          <select name="kategori" required>
            <option value="">Jenis Paket</option>
            <option <?= $paket['kategori'] == 'Eksplorasi' ? 'selected' : '' ?>>Eksplorasi</option>
            <option <?= $paket['kategori'] == 'Budaya' ? 'selected' : '' ?>>Budaya</option>
            <option <?= $paket['kategori'] == 'Relaksasi' ? 'selected' : '' ?>>Relaksasi</option>
          </select>
        </div>
           <div class="form-group">
  <label for="kuota_paket">Kuota Paket <span class="required">*</span></label>
  <input type="number" name="kuota_paket" value="<?= $paket['kuota_paket'] ?? '' ?>" required>
</div>

<div class="form-group">
  <label for="kuota_orang">Kuota Orang <span class="required">*</span></label>
  <input type="number" name="kuota_orang" value="<?= $paket['kuota_orang'] ?? '' ?>" required>
</div>
        <div class="form-group">
          <label>Rating (opsional)</label>
          <input type="number" step="0.1" name="rating" value="<?= $paket['rating'] ?>">
        </div>

      </div>

      <!-- Deskripsi -->
     <div class="form-group">
  <label>Deskripsi</label>
  <textarea name="deskripsi" rows="4"><?= $paket['deskripsi'] ?></textarea>

  <div class="button-container">
    <button type="submit" class="btn-simpan">Simpan</button>
  </div>
</div>


    </form>
  </div>
</section>

<?=$this->include('layout/footer_admin') ?>


<script>
  const gambarInput = document.getElementById('gambar');
  const previewImage = document.getElementById('previewImage');
  const uploadLabel = document.getElementById('uploadLabel');
  const uploadArea = document.querySelector('.upload-area');

  gambarInput.addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (evt) {
        previewImage.src = evt.target.result;
        previewImage.classList.remove('hidden');
        uploadLabel.classList.add('hidden');
        uploadArea.classList.remove('no-image');
        uploadArea.classList.add('has-image');
      };
      reader.readAsDataURL(file);
    }
  });

  window.addEventListener('DOMContentLoaded', () => {
    if (previewImage && previewImage.src && !previewImage.src.includes('default.jpg') && previewImage.src.trim() !== '') {
      uploadArea.classList.remove('no-image');
      uploadArea.classList.add('has-image');
      uploadLabel.classList.add('hidden');
    } else {
      uploadArea.classList.remove('has-image');
      uploadArea.classList.add('no-image');
      uploadLabel.classList.remove('hidden');
    }
  });
</script>

