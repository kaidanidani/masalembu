<footer>
    <div class="container">
        <p>&copy; <?= date('Y') ?> Masalembu Island. All rights reserved.</p>
    </div>
</footer>

<!-- java Script -->
<!-- Hanya gunakan SATU versi Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script custom -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggle = document.getElementById('menu-toggle');
        const navLinks = document.querySelector('.nav-links');
        toggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    });
</script>
</body>
</html>
