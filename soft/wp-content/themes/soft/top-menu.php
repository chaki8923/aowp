
<?php 

$color = get_option('main_color');
$bc_color = get_option('bc_color');
$Logo = get_option('logo');

?>
<header class="top-menu" style="background-color: <?php echo $color ?>;">
  <?php
    wp_nav_menu(array(
      'theme_location'=>'topmenu',
      'conteainer' =>false,
      'menu_class' =>'header-menu',
      'items_wrap' => '<ul >%3$s</ul>',
      
    )); ?>

<a href="<?php echo esc_url( home_url() ); ?>" class="logo-link">
  <img src="<?php echo $Logo; ?>" alt="" class="logo">
</a>
</header>
<header class="sp-header" style="background-color: <?php echo $color ?>;">
<?php
    wp_nav_menu(array(
      'theme_location'=>'topmenu',
      'conteainer' =>false,
      'menu_class' =>'header-menu',
      'items_wrap' => '<ul >%3$s</ul>',
      
    )); ?>
</header>
  <!-- ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ -->
  <!-- ハンバーガーメニュー -->
  <!-- ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ -->
  <div class="bar">
    <span class="bar-top"></span>
    <span class="bar-middle"></span>
    <span class="bar-bottom"></span>
  </div>
  
  <!-- ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ -->
  <!-- TOPへ戻るボタン -->
  <!-- ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ -->
    <div class="top-return js-top" style="background-color: <?php echo $bc_color; ?>;">
    <span>TOPへ</span>
  </div>