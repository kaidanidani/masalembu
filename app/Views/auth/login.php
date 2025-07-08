<?= $this->include('layout/header') ?>

<!-- LOGIN CONTAINER -->
<div class="login-container">
  <div class="left-side">
    <img src="../foto/destinasi.jpg" alt="Sunset View" class="bg-image">
  </div>

  <div class="right-side">
    <div class="form-box">
      <h2>Sign In</h2>

      <!-- Flash Messages -->
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
      <?php endif; ?>

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <!-- FORM LOGIN -->
      <form action="/login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <div class="password-field">
          <input type="password" name="password" id="password" required>
          <button type="button" class="toggle-password" id="togglePassword">
            <i class="fa-solid fa-eye" id="eyeIcon"></i>
          </button>
        </div>

        <div class="options">
          <label>
            <input type="checkbox" name="remember"> Keep me signed in until I sign out
          </label>
        </div>

        <button type="submit" class="btn-signin">Sign In</button>
      </form>

      <div class="link-options">
        <a href="<?= site_url('/forgot') ?>">Lupa Password?</a>
        <p>Don't have an account? <a href="/register">Sign Up</a></p>
      </div>
    </div>
  </div>
</div>
<?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>


<!-- Script Toggle Password -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');

    toggleBtn.addEventListener('click', function (e) {
      e.preventDefault();
      const isPassword = passwordInput.type === 'password';
      passwordInput.type = isPassword ? 'text' : 'password';
      icon.classList.toggle('fa-eye');
      icon.classList.toggle('fa-eye-slash');
    });
  });
</script>

<?= $this->include('layout/footer') ?>
