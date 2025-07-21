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
        <div class="password-wrapper" style="position: relative;">
          <input 
            type="password" 
            name="password" 
            id="password" 
            required 
            style="width: 100%; padding-right: 50px; height: 40px; box-sizing: border-box;"
          >

          <button 
            type="button" 
            id="togglePassword" 
            style="
              position: absolute;
              top: 50%;
              right: 10px;
              transform: translateY(-50%);
              background: none;
              border: none;
              cursor: pointer;
              display: flex;
              align-items: center;
              padding: 0;
              font-size: 14px;
              color: #333;
            "
          >
            <i class="fa-solid fa-eye-slash" id="eyeIcon" style="margin-right: 5px;"></i>
            <span id="toggleText">Show</span>
          </button>
        </div>

        <div class="options" style="margin-top: 10px;">
          <label>
            <input type="checkbox" name="remember" checked>
            Keep me signed in until I sign out
          </label>
        </div>

        <button type="submit" class="btn-signin">Sign In</button>
      </form>

      <div class="link-options" style="margin-top: 15px;">
        <a href="<?= site_url('/forgot') ?>">Forgot your password?</a>
        <p>Don't have an account? <a href="/register"><strong>Sign Up</strong></a></p>
      </div>
    </div>
  </div>
</div>

<!-- Toggle Password Script -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    const toggleText = document.getElementById('toggleText');

    toggleBtn.addEventListener('click', function (e) {
      e.preventDefault();
      const isPassword = passwordInput.type === 'password';
      passwordInput.type = isPassword ? 'text' : 'password';
      icon.classList.toggle('fa-eye');
      icon.classList.toggle('fa-eye-slash');
      toggleText.textContent = isPassword ? 'Hide' : 'Show';
    });
  });
</script>

<?= $this->include('layout/footer') ?>