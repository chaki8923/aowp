<?php


require('head.php'); 

?>
<?php get_header(); ?>
<main class="main">
  <div class="single-news__image">
    <?php echo the_post_thumbnail(); ?>
    <h2 class="single-news__title"><?php echo the_title() ?></h2>
  </div>
  <div class="page-content">
    <?php echo the_content(); ?>
  </div>
</main>
<?php get_footer(); ?>