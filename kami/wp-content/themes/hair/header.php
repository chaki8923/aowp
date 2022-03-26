<?php for ($i = 2; $i <= 2; $i++) {

  $logo = get_option('main_view' . $i);
}

?>

<body <?php body_class(); ?>>
  <a href="<?php echo home_url(); ?>" class="main-logo" style="<?php if (!$logo) echo "display:none"; ?>">
    <img src="<?php echo $logo; ?>" alt="ロゴ">
  </a>

  <div class="bar">
    <span class="bar-top"></span>
    <span class="bar-middle"></span>
    <span class="bar-bottom"></span>
  </div>
  <!--------------- PCヘッダー ----------------->
  <div class="header-menu">
    
    <?php get_template_part('top-menu', 'topmenu'); ?>
  </div>
  <div class="js-top">
    <span>TOP</span>
  </div>