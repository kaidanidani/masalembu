<!-- Footer Start -->
<footer class="footer">
  <div class="container">
    <div class="row text-start text-md-left">
      <div class="col-md-4 mb-4">
        <img src="<?= base_url('../foto/logo_new.png') ?>" alt="Logo Masalembu" class="footer-logo img-fluid">
        <p>
          Setiap perjalanan adalah kisah yang bermakna. Tour Masalembu menghadirkan jejak, menjelajah keunikan alam, dan meresapi degupan alam demi pengalaman yang tak terlupakan.
        </p>
        <div class="footer-socials mt-3">
          <a href="#"><img src="<?= base_url('assets/icons/icon-fb.svg') ?>" alt="Facebook"></a>
          <a href="#"><img src="<?= base_url('assets/icons/icon-ig.svg') ?>" alt="Instagram"></a>
          <a href="#"><img src="<?= base_url('assets/icons/icon-yt.svg') ?>" alt="YouTube"></a>
          <a href="#"><img src="<?= base_url('assets/icons/icon-wa.svg') ?>" alt="WhatsApp"></a>
        </div>
      </div>

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

      <div class="col-md-4 mb-4">
        <h5 class="fw-bold">Pusat Kontak</h5>
        <p class="mb-1">+6283-2220-627</p>
        <p class="mb-0">msblkekwsiata@gmail.com</p>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p class="mb-0">© Copyright 2025. All rights reserved.</p>
  </div>
</footer>
<!-- Footer End -->



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<script>
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.custom-navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');      // tambahkan class yang menghilangkan bg
    } else {
      navbar.classList.remove('scrolled');   // kembalikan bg saat di atas
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
