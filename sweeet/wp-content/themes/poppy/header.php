<?php 
$Main_img = [];

for ($i = 1; $i <= 19; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);

}


?>
<body <?php body_class(); ?>>
<div class="bar">
    <span class="menu">MENU</span>
    <span class="close">CLOSE</span>
    <span class="bar-top"></span>
    <span class="bar-bottom"></span>
  </div>
  <a href="<?php echo esc_url( home_url() ); ?>" class="main-logo" style="<?php if(!$Main_img[10]) echo "display:none"  ?>">
  <img src="<?php echo $Main_img[10]; ?>" alt="ロゴ">
 </a>
  <header class="header">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'top_menu',
      'container' => false,
      'menuclass' => 'js-ul',
      'items_wrap' => '<ul>%3$s</ul>',
    ));
    ?>

 
  </header>

  
 