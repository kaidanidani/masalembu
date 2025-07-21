<?= $this->include('layout/header_user') ?>

<section class="hero-section1 mb-5">
  <div class="hero-wisata"><h1 class="title-wisata">Detail Pesanan</h1></div>
</section>

<div class="container mb-5">
  <div class="card p-4 mb-4 shadow-sm bg-light">
    <h5>No. Pesanan: <?= esc($pesanan['order_id']) ?></h5>
    <p>Status: <span class="badge bg-warning text-dark"><?= ucfirst($pesanan['status']) ?></span></p>
    <ul class="timeline list-unstyled ps-3">
      <?php
        $statuses = ['belum bayar','menunggu kapal','proses keberangkatan','selesai','dibatalkan'];
        foreach ($statuses as $st):
          $done = array_search($st, $statuses) <= array_search($pesanan['status'], $statuses);
      ?>
        <li class="mb-3 d-flex align-items-center">
          <span class="me-2"><?= $done ? '✔' : '○' ?></span> <?= ucfirst($st) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="card p-4 shadow-sm bg-light">
    <div class="row">
      <div class="col-md-3"><img src="<?= base_url('foto/masalembu.jpg') ?>" class="img-fluid rounded"></div>
      <div class="col-md-9">
        <h5><?= esc($pesanan['nama_paket']) ?></h5>
        <p><?= esc($pesanan['jumlah_penumpang']) ?> x Rp <?= number_format($pesanan['harga_paket'],0,',','.') ?></p>
        <table class="table">
          <tr><td>Subtotal</td><td class="text-end">Rp <?= number_format($pesanan['harga_paket'],0,',','.') ?></td></tr>
          <tr><td>Biaya Admin</td><td class="text-end">Rp <?= number_format($pesanan['biaya_admin'],0,',','.') ?></td></tr>
          <tr><td><strong>Total</strong></td><td class="text-end text-danger"><strong>Rp <?= number_format($pesanan['total_bayar'],0,',','.') ?></strong></td></tr>
          <tr><td>Metode</td><td class="text-end"><?= esc($pesanan['bank']) ?></td></tr>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->include('layout/footer') ?>