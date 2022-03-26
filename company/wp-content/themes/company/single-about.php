<?php 
$site_title = 'HUMAN|私たちについて';
require('head.php'); ?>
<?php get_header(); ?>
<main class="main">
  <?php get_template_part('top-menu', 'topmenu'); ?>
  <div class="thumbnail">
    <?php the_post_thumbnail(); ?>
  </div>

  <div class="inner">
    <div class="bread">
        <ul class="bread-item">
          <?php mytheme_breadcrumb(); ?>
        </ul>
    </div>
    <div class="top-content">
      <h1 class="single-title"><?php the_title(); ?></h1>
      <span class="single-subtitle"> <?php echo get_post_meta($post->ID, 'sub_title', true); ?></span>
      <span class="number"><?php echo get_post_meta($post->ID, 'back-number', true); ?></span>
    </div>

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; ?>
    <?php else : ?>

      <h3>記事がありません</h3>
      <p>表示する記事はありませんでした。</p>

    <?php endif; ?>
    <!-- ループ終了 -->
  </div>
</main>
<?php get_footer(); ?>