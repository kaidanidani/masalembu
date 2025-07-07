<footer class="pt-5 text-white footer-masalembu">
  <div class="container">
    <div class="row text-left text-md-left">

      <!-- Kolom 1: Logo & Deskripsi -->
      <div class="col-md-4 mb-4">
        <div class="d-flex align-items-center mb-3">
          <img src="../foto/logo_new.png" alt="Logo Masalembu" class="img-fluid me-2" style="max-width: 50px;">
          <span class="fs-5 fw-bold text-dark">Masalembu</span>
        </div>
        <p class="small">
          Setiap perjalanan adalah kisah yang bermakna. Tour Masalembu mengabadikan jejak, menjelajahi keindahan, dan menyatu dengan alam demi pengalaman yang tak terlupakan.
        </p>
        <div class="d-flex gap-3 mt-3">
          <a href="#"><img src="../assets/icons/icon-ig.svg" alt="Instagram" width="20" height="20"></a>
          <a href="#"><img src="../assets/icons/icon-yt.svg" alt="YouTube" width="20" height="20"></a>
          <a href="#"><img src="../assets/icons/icon-x.svg" alt="X" width="20" height="20"></a>
          <a href="#"><img src="../assets/icons/icon-wa.svg" alt="WhatsApp" width="20" height="20"></a>
        </div>
      </div>

      <!-- Kolom 2: Tautan Cepat -->
      <div class="col-md-4 mb-4">
        <h6 class="fw-bold">Tautan Cepat</h6>
        <ul class="list-unstyled small">
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
        <h6 class="fw-bold">Pusat Kontak</h6>
        <p class="small mb-1">+6223-2220-627</p>
        <p class="small mb-0">
          <a href="mailto:msblkowisata@gmail.com" class="text-white text-decoration-none">msblkowisata@gmail.com</a>
        </p>
      </div>
    </div>
  </div>

  <!-- Copyright -->
  <div class="footer-bottom text-center text-dark py-2 mt-4">
    <small>&copy; Copyright 2025, All rights reserved.</small>
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
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    grabCursor: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    }
  });
</script>


</body>

</html>