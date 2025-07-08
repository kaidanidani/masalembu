<!-- app/Views/auth/UserRegisterAkun.php -->
<form method="post" action="<?= site_url('auth/saveRegister') ?>">
    <input type="text" name="nama" placeholder="Nama" required>
    <input type="date" name="tanggal_lahir" required>
    <input type="text" name="alamat" placeholder="Alamat" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Daftar</button>
</form>
