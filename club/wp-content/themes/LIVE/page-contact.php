<?php
require('head.php');


get_header();
?>

<div class="single-blog contact-inner">
  <div class="after" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
  </div>

    <?php the_content(); ?>
  </div>
  <?php get_footer(); ?>
</body>

</html>