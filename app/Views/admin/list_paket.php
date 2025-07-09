<?= $this->include('layout/header') ?>

<div class="container mt-4">
  <h2>Daftar Paket Wisata</h2>
  <a href="<?= site_url('admin/paket/create') ?>" class="btn btn-success mb-3">Tambah Paket</a>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php endif; ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Durasi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($paket as $row): ?>
      <tr>
        <td><?= esc($row['nama']) ?></td>
        <td><?= esc($row['kategori']) ?></td>
        <td>Rp. <?= number_format($row['harga']) ?></td>
        <td><?= esc($row['durasi']) ?> hari</td>
        <td>
          <a href="<?= site_url('admin/paket/edit/' . $row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="<?= site_url('admin/paket/delete/' . $row['id']) ?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $this->include('layout/footer') ?>
