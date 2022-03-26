<?php for ($i = 2; $i <= 2; $i++) {

$logo = get_option('main_view' . $i);
}

?>

<header class="header">
  <a href="<?php echo home_url(); ?>" class="sp-logo" style="<?php if (!$logo) echo "display:none"; ?>">
    <img src="<?php echo $logo; ?>" alt="ロゴ">
  </a>
  <?php
  wp_nav_menu(array(
    'theme_location' => 'topmenu',
    'conteainer' => '',
    'menu_class' => 'header-menu',
    'items_wrap' => '<ul class="top-menu" >%3$s</ul>',

  )); ?>
</header>