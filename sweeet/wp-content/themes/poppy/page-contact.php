<?php
require('head.php');


get_header();
?>

<div class="single-blog">
<div class="thumbnail">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
  </div>
  <div class="map-wraper"></div>
  <?php the_content(); ?>

</div>
<?php get_footer(); ?>


