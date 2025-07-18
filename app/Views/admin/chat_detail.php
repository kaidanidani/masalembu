<?= $this->include('layout/header') ?>
  <div class="container mt-5">
  <h2 class="mb-4 text-center">Riwayat Chat Semua Pengguna</h2>
  <div class="row">
    <?php foreach ($groupedChats as $index => $chatGroup): ?>
      <div class="col-md-6 mb-4">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <div>
              <strong><?= esc($chatGroup['nama']) ?></strong><br>
              <small class="text-muted">ID: <?= esc($chatGroup['user_id']) ?></small>
            </div>
            <!-- Tombol di card-header -->
<button 
  class="btn btn-sm btn-outline-primary" 
  data-bs-toggle="modal" 
  data-bs-target="#chatModal<?= $index ?>" 
  title="Lihat Semua Chat">
  <i class="bi bi-eye-fill"></i>
</button>

          </div>
          <div class="card-body" style="max-height: 150px; overflow-y: auto;">
            <?php foreach ($chatGroup['messages'] as $msg): ?>
              <div class="mb-2">
                <span class="badge bg-<?= $msg->sender === 'user' ? 'primary' : 'success' ?>">
                  <?= esc(ucfirst($msg->sender)) ?>
                </span>
                <small class="text-muted"><?= date('d M Y H:i', strtotime($msg->created_at)) ?></small>
                <div><?= esc($msg->message) ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="chatModal<?= $index ?>" tabindex="-1" aria-labelledby="chatModalLabel<?= $index ?>" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="chatModalLabel<?= $index ?>">Chat Lengkap: <?= esc($chatGroup['nama']) ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
              <?php foreach ($chatGroup['messages'] as $msg): ?>
                <div class="mb-3">
                  <span class="badge bg-<?= $msg->sender === 'user' ? 'primary' : 'success' ?>">
                    <?= esc(ucfirst($msg->sender)) ?>
                  </span>
                  <small class="text-muted"><?= date('d M Y H:i', strtotime($msg->created_at)) ?></small>
                  <div><?= esc($msg->message) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


  
<?= $this->include('layout/footer_admin') ?>
