<?php 
$color = get_option('main_color') ?>
<footer id="footer" class="js-footer footer" style="background-color: <?php echo $color; ?>">
  <?php

  wp_nav_menu(array(
    'theme_location' => 'footermenu',
    'container' => '',
    'menuclass' => 'footer-menu',
    'items_wrap' => '<ul >%3$s</ul>',
  ));
  ?>

  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</footer>
</body>


</html>