<?= $this->include('layout/header_admin') ?>

<?php if (isset($success)): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= esc($success) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
  </div>
<?php endif; ?>

<?php if (isset($error)): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= esc($error) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
  </div>
<?php endif; ?>


<style>
.daftar-paket-section {
  padding: 40px 20px;
  background-color: #f9f9f9;
  min-height: 100vh;
}
.section-title {
  font-size: 26px;
  font-weight: bold;
  margin-bottom: 25px;
  color: #333;
  text-align: center;
}
.filter-kuota {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 30px;
  align-items: center;
}
.filter-buttons {
  display: flex;
  gap: 10px;
}
.filter-btn {
  padding: 10px 20px;
  background: #eee;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
}
.filter-btn.aktif {
  background: #f4c542;
  color: #000;
}
.card-paket {
  display: flex;
  gap: 20px;
  padding: 20px;
  border-radius: 12px;
  background: #fff;
  box-shadow: 0 2px 4px rgba(0,0,0,0.05);
  margin-bottom: 20px;
  position: relative;
  min-height: 200px;
  align-items: flex-start;
}
.card-paket.tersedia {
  background-color: #fffff3;
}
.gambar-paket img {
  width: 180px;
  height: 130px;
  object-fit: cover;
  border-radius: 10px;
}
.detail-paket {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.detail-paket h5 {
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 8px;
}
.detail-paket .harga {
  font-size: 18px;
  font-weight: 600;
  color: #1a1a1a;
}
.detail-paket p {
  margin: 4px 0;
  font-size: 14px;
}
.aksi-paket {
  position: absolute;
  bottom: 10px;
  right: 15px;
}
.btn-edit, .btn-delete {
  font-size: 18px;
  background: none;
  border: none;
  margin-right: 10px;
  cursor: pointer;
}
.btn-edit { color: #007bff; }
.btn-delete { color: #dc3545; }

.fixed-tambah {
  position: fixed;
  right: 20px;
  bottom: 30px;
  z-index: 1000;
  transition: opacity 0.3s;
}
.fixed-tambah.faded {
  opacity: 0;
  pointer-events: none;
}
.btn-tambah {
  background-color: #007bff;
  color: white;
  padding: 12px 24px;
  border-radius: 10px;
  font-weight: 100px;
  text-decoration: none;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

/* Responsive */
@media (max-width: 768px) {
  .card-paket {
    flex-direction: column;
    align-items: flex-start;
  }
  .gambar-paket img {
    width: 100%;
    height: auto;
  }
  .aksi-paket {
    position: static;
    margin-top: 10px;
  }
}

.filter-kuota-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: nowrap; /* tidak wrap biar tetap satu baris */
  gap: 1rem;
  margin-bottom: 20px;
  flex-direction: row;
}

.filter-buttons {
  display: flex;
  gap: 0.5rem;
  flex-wrap: nowrap;
}

.search-form {
  display: flex;
  align-items: center;
  flex: 1;
  max-width: 400px;
  min-width: 0; /* penting untuk mencegah input melebihi container */
}

.search-form input {
  flex: 1;
  min-width: 0;
}

</style>

<section class="admin-hero text-white text-center" style="background: url('<?= base_url('foto/destinasi.jpg') ?>') center/cover no-repeat; padding: 100px 0;">
  <div class="container">
    <h1 class="display-4 fw-bold" style="font-family: 'Pacifico', cursive;">Daftar Paket Wisata</h1>
    <p class="lead fs-4 text-danger fw-semibold">Dashboard Admin</p>
  </div>
</section>

<section class="daftar-paket-section">
  <div class="container">

    <!-- Filter Kuota + Search -->
<div class="filter-kuota-wrapper">
  <div class="filter-buttons">
    <button class="filter-btn aktif" data-filter="tersedia">Tersedia (<?= $tersediaCount ?>)</button>
    <button class="filter-btn" data-filter="habis">Habis (<?= $habisCount ?>)</button>
    <button class="filter-btn" data-filter="semua">Semua</button>
  </div>
  <form method="get" class="search-form">
    <input type="text" name="search" class="form-control" placeholder="Cari nama atau kategori..." value="<?= esc($search ?? '') ?>">
    <button class="btn btn-primary ms-2">Cari</button>
  </form>
</div>


    <!-- Daftar Paket -->
    <?php foreach ($paket as $p): ?>
    <div class="card-paket <?= ($p['kuota_paket'] > 0) ? 'tersedia' : 'habis' ?>">
      <div class="gambar-paket">
        <img src="<?= base_url('foto/' . $p['gambar']) ?>" alt="<?= esc($p['nama']) ?>">
      </div>
      <div class="detail-paket">
        <h5><?= esc($p['nama']) ?></h5>
        <p class="harga">Rp. <?= number_format($p['harga'], 0, ',', '.') ?></p>
        <p>Fasilitas: <?= esc($p['fasilitas']) ?></p>
        <p>Paket Wisata <?= esc($p['kuota_orang']) ?> Orang</p>
        <p>Stok: <?= esc($p['kuota_paket']) ?> Paket</p>
        <p>Durasi: <?= esc($p['durasi']) ?></p>
        <p>
          Rating: <?= number_format($p['rating_dinamis'], 1) ?>
          <?php
            $rating = round($p['rating_dinamis']);
            for ($r = 1; $r <= 5; $r++) {
              echo '<i class="bi bi-star' . ($r <= $rating ? '-fill' : '') . ' text-warning"></i>';
            }
          ?>
        </p>
        <div class="aksi-paket">
          <a href="<?= base_url('admin/paket/edit/' . $p['id']) ?>" class="btn-edit" title="Edit"><i class="bi bi-pencil-square"></i></a>
          <form action="<?= base_url('admin/paket/delete/' . $p['id']) ?>" method="post" onsubmit="return confirm('Yakin hapus paket ini?')" style="display:inline">
            <button type="submit" class="btn-delete" title="Hapus"><i class="bi bi-trash-fill"></i></button>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Tombol Tambah -->
  <div class="fixed-tambah faded" id="fixedTambah">
    <a href="<?= base_url('admin/tambah-paket') ?>" class="btn-tambah">Tambah Paket Baru</a>
  </div>
</section>

<?= $this->include('layout/footer') ?>

<script>
  const btnTambah = document.getElementById('fixedTambah');
  const footer = document.querySelector('footer');

  window.addEventListener('scroll', function () {
    const scrollY = window.scrollY;
    const windowHeight = window.innerHeight;
    const footerTop = footer.getBoundingClientRect().top + scrollY;

    if (scrollY + windowHeight >= footerTop - 80) {
      btnTambah.classList.remove('faded');
    } else if (scrollY < 100) {
      btnTambah.classList.add('faded');
    } else {
      btnTambah.classList.remove('faded');
    }
  });

  // FILTER LOGIC
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('aktif'));
      btn.classList.add('aktif');

      const filter = btn.dataset.filter;
      document.querySelectorAll('.card-paket').forEach(card => {
        card.style.display = (filter === 'semua' || card.classList.contains(filter)) ? 'flex' : 'none';
      });
    });
  });
</script>
