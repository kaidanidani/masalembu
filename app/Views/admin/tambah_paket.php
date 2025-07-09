<?= $this->include('layout/header') ?>

<div class="container mt-4">
  <h2>Tambah Paket Wisata</h2>
  <form action="<?= site_url('admin/paket/store') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Paket</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Slug</label>
      <input type="text" name="slug" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control">
        <option value="Eksplorasi">Eksplorasi</option>
        <option value="Budaya & Tradisi">Budaya & Tradisi</option>
        <option value="Keluarga & Relaksasi">Keluarga & Relaksasi</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Harga</label>
      <input type="number" name="harga" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Durasi (hari)</label>
      <input type="number" name="durasi" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Fasilitas</label>
      <textarea name="fasilitas" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
  <label>Rating</label>
  <input type="number" step="0.1" name="rating" class="form-control" value="0">
</div>

<div class="mb-3">
  <label>Deskripsi</label>
  <textarea name="deskripsi" class="form-control" rows="4"></textarea>
</div>
    <div class="mb-3">
      <label>Gambar</label>
      <input type="file" name="gambar" class="form-control" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>


  </form>

</div>

<?= $this->include('layout/footer') ?>
