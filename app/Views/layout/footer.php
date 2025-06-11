<footer>
    <div class="container">
        <p>&copy; <?= date('Y') ?> Masalembu Island. All rights reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<script>
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.custom-navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');      // tambahkan class yang menghilangkan bg
    } else {
      navbar.classList.remove('scrolled');   // kembalikan bg saat di atas
    }
  });
  const toggle = document.getElementById('menu-toggle');
  const navLinks = document.querySelector('.nav-links');

  toggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
  });
</script>
</body>
</html>
