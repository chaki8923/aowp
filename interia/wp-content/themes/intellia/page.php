<?php
require('head.php');



get_header();
?>
<main class="main page-content">
  <div class="contact-top">
    <h2><?php the_title(); ?></h2>
    
  </div>
  <?php the_content(); ?>
  
</main>



<?php get_footer(); ?>