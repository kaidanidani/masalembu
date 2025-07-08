<?= $this->include('layout/header') ?>

<div class="container mt-5">
  <h2 class="mb-4">Daftar Akun</h2>
  <form action="/register" method="post">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success w-100">Daftar</button>
    <div class="mt-2 text-center">
      Sudah punya akun? <a href="/login">Login di sini</a>
    </div>
  </form>
</div>

<?= $this->include('layout/footer') ?>
