<?= $this->include('layout/header') ?>

<!-- REGISTER CONTAINER -->
<div class="login-container" style="display: flex; height: 100vh; overflow: hidden; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
  <div class="left-side" style="flex: 1; height: 100%;">
    <img src="../foto/destinasi.jpg" alt="Sunset View" style="width: 100%; height: 100%; object-fit: cover;">
  </div>

  <div class="right-side" style="flex: 1; height: 100%; background-color: #5b88a9; padding: 20px; display: flex; justify-content: center; align-items: flex-start;">
    <div class="form-box" style="width: 100%; max-width: 400px; background-color: transparent;">

      <h2 style="color: white; font-size: 24px; margin-bottom: 5px;">Sign Up</h2>
      <p style="font-size: 14px; color: #e4e4e4; margin-bottom: 15px;">Sign up for free to access to any of our products</p>

      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
      <?php endif; ?>
      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= site_url('auth/saveRegister') ?>" method="post">
        <label for="nama" style="color: white;">Nama</label>
        <input type="text" name="nama" id="nama" required style="width: 100%; padding: 10px; border-radius: 5px; margin-bottom: 10px; border: none;">

        <label for="tanggal_lahir" style="color: white;">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required style="width: 100%; padding: 10px; border-radius: 5px; margin-bottom: 10px; border: none;">

        <label for="alamat" style="color: white;">Tempat Tinggal</label>
        <input type="text" name="alamat" id="alamat" required style="width: 100%; padding: 10px; border-radius: 5px; margin-bottom: 10px; border: none;">

        <label for="email" style="color: white;">Email</label>
        <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; border-radius: 5px; margin-bottom: 10px; border: none;">

        <!-- PASSWORD -->
        <label for="password" style="color: white;">Password</label>
        <div class="password-wrapper" style="position: relative;">
          <input 
            type="password" 
            name="password" 
            id="password" 
            required 
            style="width: 100%; padding: 10px; padding-right: 50px; border-radius: 5px; border: none;"
          >
          <button 
            type="button" 
            id="togglePassword" 
            style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); background: none; border: none; color: white; cursor: pointer;"
          >
            <i class="fa fa-eye-slash" id="eyeIcon"></i> <span id="toggleText">Hide</span>
          </button>
        </div>
        <small style="font-size: 12px; color: #e0e0e0; margin-top: 4px; display: block; margin-bottom: 10px;">
          Use 8 or more characters with a mix of letters, numbers & symbols
        </small>

        <!-- CONFIRM PASSWORD -->
        <label for="confirm_password" style="color: white;">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" required style="width: 100%; padding: 10px; border-radius: 5px; border: none;">
        <small style="font-size: 12px; color: #e0e0e0; margin-top: 4px; display: block; margin-bottom: 10px;">
          Use 8 or more characters with a mix of letters, numbers & symbols
        </small>

        <!-- Checkbox -->
        <div style="margin: 10px 0;">
          <label style="font-size: 14px; color: white;">
            <input type="checkbox" required> 
            I agree to our <a href="#" style="color: white; text-decoration: underline;">Terms of use</a> and <a href="#" style="color: white; text-decoration: underline;">Privacy Policy</a>
          </label>
        </div>

        <button type="submit" class="btn-signin" style="background-color: #043d68; color: white; border: none; border-radius: 25px; padding: 10px 20px; width: 100%; font-size: 16px; margin-top: 10px; cursor: pointer;">Sign Up</button>
      </form>

      <div class="link-options" style="margin-top: 10px; color: white;">
        Already have an account? <a href="/login" style="color: white; text-decoration: underline;"><strong>Log in</strong></a>
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
