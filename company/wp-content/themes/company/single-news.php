<?php
require('getplugin.php');

require('head.php');
?>
<?php
get_header();
global $post;
?>
<?php if ($wp_query->have_posts()) : ?>
  <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <main class="single single-news">
      <div class="single-news__image">
        <?php echo the_post_thumbnail(); ?>
        <h2 class="single-news__title"><?php echo the_title() ?></h2>
      </div>
  <div class="news-content">
    <?php echo the_content(); ?>
  </div>
    <?php endwhile; ?>
  <?php else : ?>
    <h3>記事がありません</h3>
    <p>表示する記事はありませんでした。</p>
  <?php endif; ?>
  

    </main>

      <?php get_footer(); ?>