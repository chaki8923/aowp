<?php 



for ($i = 20; $i <= 20; $i++) {

  $logo=  get_option('main_view' . $i);

}

?>
<body <?php body_class(); ?>>

  <div class="bar">
    <span class="bar-top"></span>
    <span class="bar-middle"></span>
    <span class="bar-bottom"></span>
  </div>
  <!--------------- PCヘッダー ----------------->
    <a href="<?php echo home_url(); ?>" class="logo" style="<?php if(!$logo) echo "display:none;";  ?>">
  <img src="<?php echo $logo; ?>" alt="ロゴ">
  </a>
    <?php get_template_part('top-menu', 'topmenu'); ?>
  
 