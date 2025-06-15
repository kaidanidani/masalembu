<?= $this->include('layout/header') ?>
<!-- Navigasi -->
    <ul class="nav-links d-none d-md-flex align-items-center gap-4">
      <li><a href="#">Beranda</a></li>
      <li class="dropdown">
        <a href="#">Sumber ▾</a>
        <ul class="dropdown-menu">
          <li><a href="#">Destinasi Wisata</a></li>
          <li><a href="#">Oleh - Oleh</a></li>
          <li><a href="#">Paket Liburan</a></li>
          <li><a href="#">Berita</a></li>
        </ul>
      </li>
      <li><a href="#">Kontak</a></li>
      <li><a href="#">Tentang Kami</a></li>
      <li><a href="#" class="btn-login">Login</a></li>
    </ul>
  </div>
</nav>
<!-- HERO -->
<section class="hero custom-padding">
  <div class="hero-content">
    <h1 class="display-4">Tour Masalembu Island</h1>
    <p class="lead">Scuba | Diving | Snorkeling | Kakatua | Seafood</p>
    <a href="#" class="btn btn-primary">Mulai Jelajahi</a>
  </div>
</section>

</section>

<!-- Explore Section -->
<section class="container my-5">
  <h2 class="text-center mb-4">Explore Masalembu</h2>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 justify-content-center">
    <?php
    // Data untuk setiap item
    $items = [
      [
        'img' => 'foto/snorkeling.png',
        'title' => 'Snorkeling Area',
        'description' => 'Jelajahi keindahan bawah laut dengan beragam biota laut.',
      ],
      [
        'img' => 'foto/diving.png',
        'title' => 'Diving Spot',
        'description' => 'Selami kedalaman untuk pengalaman menyelam yang tak terlupakan.',
      ],
      [
        'img' => 'foto/scuba.png',
        'title' => 'Scuba Spot',
        'description' => 'Rasakan sensasi petualangan menyelam dengan peralatan lengkap.',
      ],
      [
        'img' => 'foto/burung-kakatua.png',
        'title' => 'Aneka Burung Kakatua',
        'description' => 'Saksikan keberagaman burung kakatua endemik Masalembu.',
      ],
      [
        'img' => 'foto/seafood.png',
        'title' => 'Aneka Seafood',
        'description' => 'Nikmati hidangan laut segar yang langsung dari perairan Masalembu.',
      ],
    ];

    foreach ($items as $item):
    ?>
      <div class="col">
        <div class="card h-100 explore-card">
          <img src="<?= base_url($item['img']) ?>" class="card-img-top" alt="<?= $item['title'] ?>">
          <div class="card-body d-flex align-items-center justify-content-center">
            <h5 class="card-title text-center mb-0"><?= $item['title'] ?></h5>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Carousel Section -->
<section class="container my-5">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner" style="height: 500px;">
      <div class="carousel-item active">
        <img src="../foto/view3.jpg" class="d-block w-100" alt="View 3">
      </div>
      <div class="carousel-item">
        <img src="../foto/view4.jpg" class="d-block w-100" alt="View 4">
      </div>
      <div class="carousel-item">
        <img src="../foto/view5.jpg" class="d-block w-100" alt="View 5">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>


<!-- Destinasi Wisata -->
<section class="container my-5">
  <div class="row">
    <div class="col-lg-6">
      <h2 class="text-center mb-4">Destinasi Wisata</h2>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        $destinasi_items = [
          [
            'img' => 'foto/destinasi1.png',
            'title' => 'Menjelajahi Keindahan Tersembunyi Masalembu: Surga di Tengah Laut',
          ],
          [
            'img' => 'foto/destinasi2.png',
            'title' => 'Pulau Karang Masalembu yang Menyimpan Berbagai Biota Laut',
          ],
          [
            'img' => 'foto/destinasi3.png',
            'title' => 'Pesona Senja di Masalembu: Keindahan Sunset yang Memukau di Ufuk Laut',
          ],
          [
            'img' => 'foto/destinasi4.png',
            'title' => 'Pantai Masna: Pasir yang Begitu Putih Menawan',
          ],
        ];

        foreach ($destinasi_items as $item):
        ?>
          <div class="col">
            <div class="card h-100 destinasi-card">
              <img src="<?= base_url($item['img']) ?>" class="card-img-top" alt="<?= $item['title'] ?>">
              <div class="card-body">
                <p class="card-text mb-3"><?= $item['title'] ?></p>
                <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="col-lg-6">
      <h2 class="text-center mb-4">Oleh - Oleh</h2>
      <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        $oleh_oleh_items = [
          [
            'img' => 'foto/oleholeh1.png',
            'title' => 'Rekomendasi Buah Tangan untuk Dibawa Pulang',
          ],
          [
            'img' => 'foto/oleholeh2.png',
            'title' => 'Rekomendasi Buah Tangan untuk Dibawa Pulang',
          ],
          [
            'img' => 'foto/oleholeh3.png',
            'title' => 'Rekomendasi Buah Tangan untuk Dibawa Pulang',
          ],
          [
            'img' => 'foto/oleholeh4.png',
            'title' => 'Rekomendasi Buah Tangan untuk Dibawa Pulang',
          ],
        ];

        foreach ($oleh_oleh_items as $item):
        ?>
          <div class="col">
            <div class="card h-100 destinasi-card">
              <img src="<?= base_url($item['img']) ?>" class="card-img-top" alt="<?= $item['title'] ?>">
              <div class="card-body">
                <p class="card-text mb-3"><?= $item['title'] ?></p>
                <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!--PAKET WISATA BUDAYA & TRADISI-->
<div class="text-center py-2 mb-3 bg-primary text-white fs-4 fw-bold">
  Paket Wisata Eksplorasi
</div>

<!-- CARD Paket Wisata Section -->
<section class="container my-5">
  <div class="row justify-content-center gy-4">
    <?php
    // Data untuk setiap paket wisata
    $paket_wisata_items = [
      [
        'img' => 'foto/paket_masalembu_adventure.png',
        'price' => 'Rp 3.000.000',
        'title' => 'Masalembu Adventure',
        'button_text' => 'Pesan Sekarang',
        'facilities' => [
          'Transportasi laut',
          'Home Stay',
          'Makan 3x sehari',
          'Pemandu wisata lokal',
          'Peralatan snorkeling',
          'Dokumentasi foto & video (kamera DSLR & GoPro)',
        ],
        'duration' => '2 Days',
        'rating' => 5, // Jumlah bintang
      ],
      [
        'img' => 'foto/paket_island_hopping.png',
        'price' => 'Rp 3.000.000',
        'title' => 'Island Hopping Masalembu',
        'button_text' => 'Pesan Sekarang',
        'facilities' => [
          'Perahu untuk keliling pulau',
          'Makan siang & snack',
          'Pemandu wisata lokal',
          'Snorkeling di beberapa spot terbaik',
          'Dokumentasi drone & GoPro',
        ],
        'duration' => '2 Days',
        'rating' => 4,
      ],
      [
        'img' => 'foto/paket_snorkeling_diving.png', // Ganti dengan path gambar
        'price' => 'Rp 3.000.000',
        'title' => 'Snorkeling & Diving Paradise',
        'button_text' => 'Pesan Sekarang',
        'facilities' => [
          'Kapal menuju spot snorkeling/diving',
          'Sewa alat snorkeling & diving',
          'Guide penyelam profesional',
          'Makan siang di pulau terpencil',
          'Dokumentasi bawah laut (GoPro)',
        ],
        'duration' => '2 Days',
        'rating' => 5,
      ],
    ];

    foreach ($paket_wisata_items as $paket):
    ?>
      <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
        <div class="card paket-wisata-card">
          <div class="image-wrapper">
            <img src="<?= base_url($paket['img']) ?>" class="card-img-top" alt="<?= $paket['title'] ?>">
            <div class="price-tag-bottom"><?= $paket['price'] ?></div>
          </div>
          <div class="card-body">
            <h5 class="card-title d-flex justify-content-between align-items-center mb-2">
              <span><?= $paket['title'] ?></span>
              <a href="#" class="btn btn-primary btn-sm"><?= $paket['button_text'] ?></a>
            </h5>
            <p class="card-text facilities-list">
              Fasilitas :
            <ul>
              <?php foreach ($paket['facilities'] as $facility): ?>
                <li><?= $facility ?></li>
              <?php endforeach; ?>
            </ul>
            </p>
            <hr>
            <p class="text-muted mb-0 d-flex justify-content-between align-items-center">
              <span>Duration : <?= $paket['duration'] ?></span>
              <span class="star-rating">
                <?php for ($i = 0; $i < 5; $i++): ?>
                  <?php if ($i < $paket['rating']): ?>
                    <i class="fas fa-star text-warning"></i>
                  <?php else: ?>
                    <i class="far fa-star text-secondary"></i>
                  <?php endif; ?>
                <?php endfor; ?>
              </span>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!--Paket Wisata Budaya & Tradisi  -->
<div class="text-center py-2 my-2 bg-primary text-white judul-section">Paket Wisata Budaya & Tradisi</div>

<!-- CARD Paket Budaya & Tradisi -->
<section class="container my-5">
        <div class="row justify-content-center gy-4">
            <?php
            // Data untuk setiap paket wisata
            $paket_wisata_items = [
                [
                    'img' => 'foto/paket_fisherman_life.png', // Ganti dengan path gambar
                    'price' => 'Rp 3.000.000',
                    'title' => 'Fisherman\'s Life Experience',
                    'button_text' => 'Pesan Sekarang',
                    'facilities' => [
                        'Mengikuti nelayan melaut',
                        'Peralatan memancing',
                        'Workshop pengolahan hasil laut',
                        'Makan hasil tangkapan sendiri',
                        'Dokumentasi foto/video',
                    ],
                    'duration' => '2 Days',
                    'rating' => 4, // Sesuaikan rating jika berbeda
                ],
                [
                    'img' => 'foto/paket_culinary_journey.png',
                    'price' => 'Rp 3.000.000',
                    'title' => 'Masalembu Culinary Journey',
                    'button_text' => 'Pesan Sekarang',
                    'facilities' => [
                        'Cooking class makanan khas',
                        'Wisata kuliner lokal',
                        'Makan siang & makan malam spesial',
                        'Dokumentasi foto makanan',
                    ],
                    'duration' => '2 Days',
                    'rating' => 5, // Sesuaikan rating jika berbeda
                ],
            ];

            foreach ($paket_wisata_items as $paket):
            ?>
            <div class="col-md-4 col-sm-6 col-12 d-flex justify-content-center">
                <div class="card paket-wisata-card">
                    <div class="image-wrapper">
                        <img src="<?= base_url($paket['img']) ?>" class="card-img-top" alt="<?= $paket['title'] ?>">
                        <div class="price-tag-bottom"><?= $paket['price'] ?></div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center mb-2">
                            <span><?= $paket['title'] ?></span>
                            <a href="#" class="btn btn-primary btn-sm"><?= $paket['button_text'] ?></a>
                        </h5>
                        <p class="card-text facilities-list">
                            Fasilitas :
                            <ul>
                                <?php foreach ($paket['facilities'] as $facility): ?>
                                    <li><?= $facility ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </p>
                        <hr>
                        <p class="text-muted mb-0 d-flex justify-content-between align-items-center">
                            <span>Duration : <?= $paket['duration'] ?></span>
                            <span class="star-rating">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <?php if ($i < $paket['rating']): ?>
                                        <i class="fas fa-star text-warning"></i>
                                    <?php else: ?>
                                        <i class="far fa-star text-secondary"></i>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Duplikat kartu lainnya tinggal di-copy -->
  </div>
</div>

<?= $this->include('layout/footer') ?>