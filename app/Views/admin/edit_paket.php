<?= $this->include('layout/header') ?>

<div class="container py-4">
  <h2>Edit Paket Wisata</h2>
  <form action="<?= site_url('admin/paket/update/' . $paket['id']) ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Paket</label>
      <input type="text" name="nama" class="form-control" value="<?= esc($paket['nama']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control" required>
        <option value="Eksplorasi" <?= $paket['kategori'] === 'Eksplorasi' ? 'selected' : '' ?>>Eksplorasi</option>
        <option value="Budaya & Tradisi" <?= $paket['kategori'] === 'Budaya & Tradisi' ? 'selected' : '' ?>>Budaya & Tradisi</option>
        <option value="Keluarga & Relaksasi" <?= $paket['kategori'] === 'Keluarga & Relaksasi' ? 'selected' : '' ?>>Keluarga & Relaksasi</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Harga</label>
      <input type="number" name="harga" class="form-control" value="<?= esc($paket['harga']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Durasi (hari)</label>
      <input type="number" name="durasi" class="form-control" value="<?= esc($paket['durasi']) ?>" required>
    </div>

    <div class="mb-3">
      <label>Fasilitas</label>
      <textarea name="fasilitas" class="form-control" rows="3"><?= esc($paket['fasilitas']) ?></textarea>
    </div>

    <div class="mb-3">
      <label>Gambar (upload baru jika ingin ganti)</label><br>
      <img src="<?= base_url('uploads/' . $paket['gambar']) ?>" width="150" class="img-thumbnail mb-2">
      <input type="file" name="gambar" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Paket</button>
    <a href="<?= site_url('admin/paket') ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<?= $this->include('layout/footer') ?>
