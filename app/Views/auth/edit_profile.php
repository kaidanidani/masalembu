<?= $this->include('layout/header') ?>
<div class="container mt-5 mb-5">
    <div class="edit-profile-card">
        <div class="row">
            <!-- Kolom Foto -->
            <div class="col-md-4 text-center d-flex align-items-center justify-content-center mb-4 mb-md-0">
                <?php if (!empty($user['foto'])): ?>
                    <img src="<?= base_url('uploads/' . $user['foto']) . '?t=' . time() ?>"
                        alt="Foto Profil"
                        class="edit-profile-avatar">
                <?php else: ?>
                    <i class="bi bi-person-circle avatar-icon"></i>
                <?php endif; ?>
            </div>

            <!-- Kolom Form -->
            <div class="col-md-8">
                <form action="/update-profile" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Username</label>
                        <input type="text" name="nama" id="nama" value="<?= esc($user['nama']) ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Change Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak diganti">
                    </div>

                    <div class="mb-3">
                        <label for="repassword" class="form-label fw-semibold">Repeated Password</label>
                        <input type="password" name="repassword" id="repassword" class="form-control" placeholder="Ulangi password baru">
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label fw-semibold">Ganti Profil</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>

                    <div class="d-flex justify-content-start mt-4">
                        <button type="submit" class="btn btn-primary me-2 px-4">Simpan</button>
                        <a href="/logout" class="btn btn-danger px-4">Logout</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>