<?php

require('head.php');
require('getplugin.php');

get_header();
?>

 <div class="about-container">
   <h2 class="title"><?php if(empty($About_title)){ echo 'ABOUT';}else{echo $About_title; } ?></h2>
   <div class="single-inner">
     <div class="thumbnail">
       <img src="<?php echo the_post_thumbnail_url(); ?>" alt="サムネイル">
     </div>
     <div class="single-inner_content">

       <?php echo the_content(); ?>
       <section class="history">

       <?php  dynamic_sidebar('about_widget'); ?>
       </section>
     </div>
   </div>
 </div>
  <?php get_footer(); ?>