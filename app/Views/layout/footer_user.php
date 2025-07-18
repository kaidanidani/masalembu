<!-- FOOTER - MASALEMBU -->
<footer class="pt-5 text-white footer-masalembu">
  <div class="container">
    <div class="row text-left text-md-left">
      <!-- Logo & Deskripsi -->
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

      <!-- Tautan Cepat -->
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

      <!-- Kontak -->
      <div class="col-md-4 mb-4">
        <h6 class="fw-bold">Pusat Kontak</h6>
        <p class="small mb-1">+6223-2220-627</p>
        <p class="small mb-0">
          <a href="mailto:msblkowisata@gmail.com" class="text-white text-decoration-none">msblkowisata@gmail.com</a>
        </p>
      </div>
    </div>
  </div>
  <div class="footer-bottom text-center text-dark py-2 mt-4">
    <small>&copy; 2025, All rights reserved.</small>
  </div>
</footer>

<!-- Floating Chat Icon -->
<button class="btn btn-primary rounded-circle shadow-lg chat-toggle-btn position-fixed" id="chatToggle" style="bottom: 30px; right: 30px; z-index: 1050;">
  <i class="bi bi-chat-dots-fill fs-4"></i>
</button>

<!-- Chat Box -->
<div id="chatBox" class="d-none position-fixed shadow-lg rounded bg-white p-3" style="bottom: 100px; right: 30px; width: 350px; height: 400px; resize: both; overflow: hidden; z-index: 1050;">
  <div class="d-flex flex-column h-100">
    <div class="d-flex justify-content-between align-items-center mb-2">
      <strong><i class="bi bi-robot me-2 text-primary"></i>MasalembuBot</strong>
      <div class="d-flex align-items-center gap-2">
        <button id="fullscreenBtn" class="btn btn-sm btn-outline-secondary d-md-none">
          <i class="bi bi-arrows-fullscreen"></i>
        </button>
        <button class="btn-close" id="closeChat" aria-label="Close"></button>
      </div>
    </div>

    <div id="chatMessages" class="flex-grow-1 overflow-auto mb-2 px-1" style="font-size: 0.9rem;"></div>

    <form id="chatForm" class="input-group">
      <input type="text" id="userMessage" class="form-control" placeholder="Ketik pesan..." required>
      <button type="submit" class="btn btn-primary">
        <i class="bi bi-send"></i>
      </button>
    </form>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>



<!-- Global BASE_URL agar Script.js bisa fetch ke controller -->
<script>const BASE_URL = "<?= base_url() ?>";</script>
<script src="<?= base_url('js/Script.js') ?>"></script>
