<?php

require('head.php');
get_header();
?>

<main class="main">
  <div class="thumbnail">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
  </div>
  <section class="reqruit">
    <div class="title">
      <h1><?php the_title(); ?></h1>
      <div class="bread">
        <ul class="bread-item">
          <?php mytheme_breadcrumb(); ?>
        </ul>
      </div>
    </div>
  </section>
  <section class="detail page-content">
  
    <?php the_content(); ?>
  </section>

</main>
<?php get_footer(); ?>