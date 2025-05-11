<footer>
  <p>@<?php echo date('Y'); ?> ProPro プログラミングスクール</p>
</footer>
<?php wp_footer(); ?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const nav = document.getElementById('nav');

    hamburger.addEventListener('click', () => {
      nav.classList.toggle('open');
    });
  });
</script>

</body>
</html>
