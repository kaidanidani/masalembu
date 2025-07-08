<!-- app/Views/auth/ForgotAkunUser.php -->
<form method="post" action="<?= site_url('auth/reset') ?>">
    <input type="email" name="email" placeholder="Masukkan email anda" required>
    <input type="password" name="password" placeholder="Password baru" required>
    <button type="submit">Reset Password</button>
</form>

