<?= $this->include('layout/header') ?>

<div class="container mt-5">
  <h2 class="mb-4">Daftar Pemesanan Saya</h2>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Paket Wisata</th>
        <th>Tanggal</th>
        <th>Jumlah Penumpang</th>
        <th>Total Bayar</th>
          <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($pemesanan as $item): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= esc($item['nama_lengkap']) ?></td>
          <td><?= esc($item['paket_wisata']) ?></td>
          <td><?= esc($item['tanggal_berangkat']) ?> - <?= esc($item['tanggal_pulang']) ?></td>
          <td><?= esc($item['jumlah_penumpang']) ?></td>
          <td>Rp <?= number_format($item['total_bayar'], 0, ',', '.') ?></td>
              <td>
      <a href="/admin/pemesanan/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
      <a href="/admin/pemesanan/delete/<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pemesanan ini?')">Hapus</a>
    </td>

        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

