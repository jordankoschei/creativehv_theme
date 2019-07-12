  <footer class="footer">
    <div class="inner">
      <?php wp_nav_menu(array('menu' => 'Footer Menu', 'container' => 'div')); ?>

      <div class="footer-left">
        <span class="copyright">Copyright <?php echo date('Y'); ?> Talentbase, Inc.</span>
        <span class="heart">Made with <span>♥</span> in and for the Hudson Valley.</span>
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>
