<!-- Footer Start -->
<footer class="footer bg-dark text-white pt-5 pb-3">
  <div class="container">
    <div class="row text-start text-md-left">

      <!-- Kolom 1: Logo & Deskripsi -->
      <div class="col-md-4 mb-4">
        <img src="<?= base_url('foto/logo_new.png') ?>" alt="Logo Masalembu" class="footer-logo img-fluid mb-3" style="max-width: 100px;">
        <span class="ms-2 fs-4 fw-bold">Masalembu</span>
        <p>
          Setiap perjalanan adalah kisah yang bermakna. Tour Masalembu mengabadikan jejak, menjelajahi keindahan, dan menyatu dengan alam demi pengalaman yang tak terlupakan.
        </p>
        <div class="footer-socials d-flex gap-3 mt-3">
          <a href="#" target="_blank">
            <img src="<?= base_url('assets/icons/icon-ig.svg') ?>" alt="Instagram" width="30" height="30">
          </a>
          <a href="#" target="_blank">
            <img src="<?= base_url('assets/icons/icon-yt.svg') ?>" alt="YouTube" width="30" height="30">
          </a>
          <a href="#" target="_blank">
            <img src="<?= base_url('assets/icons/icon-x.svg') ?>" alt="X" width="30" height="30">
          </a>
          <a href="#" target="_blank">
            <img src="<?= base_url('assets/icons/icon-wa.svg') ?>" alt="Whatsapp" width="30" height="30">
          </a>
        </div>

      </div>

      <!-- Kolom 2: Tautan Cepat -->
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold">Tautan Cepat</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Beranda</a></li>
          <li><a href="#" class="text-white text-decoration-none">Destinasi Wisata</a></li>
          <li><a href="#" class="text-white text-decoration-none">Oleh - Oleh</a></li>
          <li><a href="#" class="text-white text-decoration-none">Paket Liburan</a></li>
          <li><a href="#" class="text-white text-decoration-none">Berita</a></li>
          <li><a href="#" class="text-white text-decoration-none">Kontak</a></li>
          <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Kontak -->
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold">Pusat Kontak</h5>
        <p class="mb-1">+6283-2220-627</p>
        <p class="mb-0">
          <a href="mailto:msblklekwisata@gmail.com" class="email-link">msblklekwisata@gmail.com</a>
        </p>



      </div>

    </div>

    <!-- Copyright -->
    <div class="text-center mt-4 pt-3 border-top border-secondary">
      <p class="mb-0">&copy; Copyright 2025. All rights reserved.</p>
    </div>
  </div>
</footer>
<!-- Footer End -->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<script>
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.custom-navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  const toggle = document.getElementById('menu-toggle');
  const navLinks = document.querySelector('.nav-links');
  toggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
  });
</script>

</body>

</html>