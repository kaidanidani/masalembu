<?= $this->include('layout/header_user') ?>

<section class="hero-section1 mb-5">
    <div class="hero-wisata">
        <h1 class="title-wisata">Cek Pesanan</h1>
    </div>
</section>

<div class="container mb-5">
    <?php
    $statusList = [
        'semua' => 'Semua',
        'belum_bayar' => 'Belum Bayar',
        'menunggu_kapal' => 'Menunggu Kapal',
        'proses_keberangkatan' => 'Proses Keberangkatan',
        'selesai' => 'Selesai',
        'dibatalkan' => 'Dibatalkan'
    ];
    ?>
    <div class="d-flex flex-wrap justify-content-center gap-2 mb-4 px-2 py-3 shadow rounded bg-light">
        <?php foreach ($statusList as $key => $label): ?>
            <a href="?status=<?= $key ?>" class="btn"
                style="<?= $statusAktif === $key ? 'background:#FFC107;color:black;font-weight:bold' : 'background:#E0E0E0;color:black' ?>">
                <?= $label ?>
            </a>
        <?php endforeach; ?>
    </div>

    <?php if (empty($pemesananList)): ?>
        <p class="text-muted">Belum ada pemesanan di status ini.</p>
    <?php endif; ?>

    <?php foreach ($pemesananList as $pes): ?>
        <a href="<?= site_url('home/detail-pesanan/' . $pes['id']) ?>" class="text-decoration-none text-dark">
            <div class="card shadow-sm mb-4 hover-pointer">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img src="<?= base_url('foto/paket_masalembu_adventure.png') ?>" class="img-fluid rounded-start" alt="Foto Paket">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= esc($pes['nama_paket']) ?>
                                <span class="text-danger float-end">
                                    Rp <?= number_format($pes['total_bayar'], 0, ',', '.') ?>
                                </span>
                            </h5>
                            <p class="mb-1"><strong>Jumlah:</strong> <?= esc($pes['jumlah_penumpang']) ?> orang</p>
                            <p class="mb-1">
                                <strong>Jadwal Berangkat:</strong>
                                <?= $pes['tanggal_berangkat'] ? date('d F Y', strtotime($pes['tanggal_berangkat'])) : 'Menyesuaikan Jadwal Kapal' ?>
                            </p>
                            <p class="mb-1"><strong>Status:</strong> <?= esc(formatStatus($pes['status'])) ?></p>

                            <?php if ($pes['status'] === 'belum_bayar'): ?>
                                <?php if (strtotime($pes['batas_bayar']) > time()): ?>
                                    <a href="<?= site_url('home/bayar-midtrans/' . $pes['id']) ?>" class="btn btn-sm btn-warning mt-2">
                                        Bayar Sekarang
                                    </a>
                                <?php else: ?>
                                    <span class="text-danger d-block mt-2">Waktu pembayaran habis</span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

<?= $this->include('layout/footer') ?>