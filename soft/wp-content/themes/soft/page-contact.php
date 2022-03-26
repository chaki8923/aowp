<?php get_header(); ?>
<main class="main">

  
  <?php get_template_part('top-menu', 'topmenu'); ?>
  
  <!-- ========================================================== -->
  <?php require('getplugin.php'); ?>
  
  <div class="single-blog">
    <div class="thumbnail-contact">
      <img src="<?php the_post_thumbnail_url(); ?>" alt="">
    </div>
    <div class="map-wraper"></div>
    <?php the_content(); ?>
    
  </div>
</main>
<?php get_footer(); ?>


