<?php require('getplugin.php'); ?>
<footer class="js-footer footer">
  <div class="footer-left">
    <a href="<?php echo home_url(); ?>" class="footer-left__logo" style="<?php if(!$Logo) echo "display:none;" ?>">
      <img src="<?php echo $Logo; ?>" alt="会社ロゴ">
    </a>
    <p class="footer-left__add"><?php echo $Add; ?></p>
  </div>
  <div class="footer-right">
  <?php

wp_nav_menu(array(
  'theme_location' => 'footermenu',
  'container' => false,
  'menuclass' => 'footer-menu',
  'items_wrap' => '<ul >%3$s</ul>',
));
?>
    <a href="<?php echo $Entry_link; ?>" class="footer-recruite">応募はコチラから ></a>
  </div>
</footer>
<div class="copy-right"><?php echo $Copy_text; ?></div>
<?php
  wp_deregister_script('jquery');
  $uri = get_template_directory_uri();


  //独自のスクリプトを読み込む
  add_action('wp_enqueue_scripts', 'enqueue_scripts');
  $Copy_text = get_option('copy_text');
  ?>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/simpleParallax.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/slick.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/slick.css">
  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>

</html>