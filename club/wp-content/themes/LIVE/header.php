<?php $Main_img = [];
 
    for ($i = 1; $i <= 20; $i++) {

      $Main_img[$i] =  get_option('main_view' . $i);
    }
?>
<body <?php body_class(); ?>>
<a href="<?php echo home_url(); ?>" class="main-logo" style="<?php if(!$Main_img[1]) echo "display:none"; ?>">
<img src="<?php echo $Main_img[1] ?>" alt="メインロゴ">
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

  <div class="js-top" style="<?php if(is_home()) echo "display:none"; ?>">
    <span>TOP</span>
  </div>