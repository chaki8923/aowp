<?php 
$Main_img = [];

for ($i = 4; $i <= 4; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);

}
?>
<body <?php body_class(); ?>>
  <a href="<?php echo esc_url(home_url()); ?>" class="logo" style="<?php if(!$Main_img[4]) echo "display:none;"; ?>">
    <img src="<?php echo $Main_img[4]; ?>" alt="ロゴ">
  </a>
  <div class="bar">
    <span class="bar-top"></span>
    <span class="bar-middle"></span>
    <span class="bar-bottom"></span>
  </div>
  <!--------------- PCヘッダー ----------------->
  <header class="header">

  <?php
    wp_nav_menu(array(
      'theme_location' => 'topmenu',
      'container' => '',
      'menuclass' => 'top-menu',
      'items_wrap' => '<ul >%3$s</ul>',
    ));
    ?>
  </header>

  <header class="sp-header">
    <?php
  wp_nav_menu(array(
      'theme_location' => 'topmenu',
      'container' => '',
      'menuclass' => 'top-menu',
      'items_wrap' => '<ul >%3$s</ul>',
    ));
    ?>
  </header>
  
 