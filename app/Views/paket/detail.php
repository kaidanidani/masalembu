<?= $this->include('layout/header') ?>

<div class="container mt-5 pt-4 pb-4 bg-info shadow-none p-3 mb-5 bg-light rounded">

  <!-- DETAIL PAKET -->
  <div class="row mb-5">
    <div class="col-md-6">
      <img src="<?= base_url('foto/' . $paket['gambar']) ?>" class="img-fluid rounded" alt="<?= esc($paket['nama']) ?>" />
    </div>
    <div class="col-md-6">
      <h3><?= esc($paket['nama']) ?></h3>
      <p class="text-warning fw-semibold">⭐ <?= number_format($paket['rating'], 1) ?> / 5.0</p>
      <h4 class="text-danger fw-bold">Rp. <?= number_format($paket['harga'], 0, ',', '.') ?></h4>

      <ul>
        <?php foreach ($paket['fasilitas'] as $f): ?>
          <li><?= esc(trim($f)) ?></li>
        <?php endforeach ?>
      </ul>

      <?php if (!empty($paket['slug'])): ?>
        <?php $redirectUrl = base_url('/home/form-pemesanan/' . $paket['slug']); ?>
        <a href="<?= session()->get('is_logged_in') ? $redirectUrl : site_url('/login?redirect=' . urlencode($redirectUrl)) ?>" class="btn btn-primary mt-3">
          Pesan Sekarang
        </a>
      <?php else: ?>
        <button class="btn btn-secondary mt-3" disabled>Paket Tidak Valid</button>
      <?php endif ?>
    </div>
  </div>
  <!-- Floating Chat Icon -->
<button class="btn btn-primary rounded-circle shadow-lg chat-toggle-btn" id="chatToggle">
  <i class="bi bi-chat-dots-fill fs-4"></i>
</button>

<!-- Chat Box -->
<div class="chat-box shadow rounded d-none" id="chatBox">
  <div class="chat-header bg-primary text-white p-2 rounded-top d-flex justify-content-between">
    <span><i class="bi bi-robot"></i> Chat Bantuan</span>
    <button class="btn-close btn-close-white btn-sm" id="closeChat"></button>
  </div>
  <div class="chat-body p-3" id="chatMessages" style="height: 250px; overflow-y: auto;">
    <div class="text-muted small">Silakan ketik pertanyaanmu...</div>
  </div>
  <div class="chat-footer p-2">
    <form id="chatForm">
      <input type="text" class="form-control" id="userMessage" placeholder="Tulis pesan..." />
    </form>
  </div>
</div>

      </div>

 
<!-- PENILAIAN PELANGGAN -->
<div class="row mt-5 px-5">
  <div class="col-12">
    <h4 class="fw-bold mb-4">Penilaian Pelanggan :</h4>
  </div>

  <?php if (!empty($reviews)): ?>
    <?php foreach ($reviews as $p): ?>
      <div class="col-md-6 col-lg-4 mb-4 px-2">
        <div class="border rounded shadow-sm p-4 h-100 bg-white">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <strong><?= esc($p['nama_lengkap']) ?></strong>
            <div>
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <i class="bi bi-star<?= $i <= $p['rating_user'] ? '-fill text-warning' : '' ?>"></i>
              <?php endfor ?>
            </div>
          </div>
          <p class="mb-0"><?= esc($p['feedback_user']) ?></p>
        </div>
      </div>
    <?php endforeach ?>
  <?php else: ?>
    <div class="col-12">
      <p class="text-muted">Belum ada penilaian dari pelanggan.</p>
    </div>
  <?php endif ?>
</div>

<!-- px-3 pada .row	Memberi padding horizontal (kiri-kanan) ke seluruh baris
px-2 pada .col-md-6	Memberi padding antar kolom agar tidak rapat
p-4 dalam card	Memberi ruang lebih luas dalam isi card (atas, bawah, kiri, kanan)
mb-2	Jarak antara nama dan bintang
mb-4 di judul	Agar judul tidak terlalu dekat dengan card -->

<?= $this->include('layout/footer') ?>


<!-- Script  -->

<script>
  const chatToggle = document.getElementById('chatToggle');
  const chatBox = document.getElementById('chatBox');
  const closeChat = document.getElementById('closeChat');
  const chatForm = document.getElementById('chatForm');
  const chatMessages = document.getElementById('chatMessages');
  const userMessage = document.getElementById('userMessage');

  chatToggle.addEventListener('click', () => {
    chatBox.classList.toggle('d-none');
  });

  closeChat.addEventListener('click', () => {
    chatBox.classList.add('d-none');
  });

  chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = userMessage.value.trim();
    if (!message) return;

    // Tampilkan pesan user
    const userDiv = document.createElement('div');
    userDiv.className = 'text-end mb-2';
    userDiv.innerHTML = `<span class="badge bg-primary">${message}</span>`;
    chatMessages.appendChild(userDiv);
    userMessage.value = '';

    // Kirim ke API ChatGPT
    const response = await fetch('/chatgpt-api', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message })
    });

    const result = await response.json();
    const botDiv = document.createElement('div');
    botDiv.className = 'text-start mb-2';
    botDiv.innerHTML = `<span class="badge bg-secondary">${result.reply}</span>`;
    chatMessages.appendChild(botDiv);

    chatMessages.scrollTop = chatMessages.scrollHeight;
  });
</script>
