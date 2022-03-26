<?php

require('head.php');
require('getplugin.php');
get_header();
?>


<?php
$args = array(
  'post_type' => 'information', /* 投稿タイプを指定 */
  'paged' => $paged,
  'posts_per_page' => 10 // 4件の記事を取得
); ?>
<div class="info-container">
  <div class="p-title">
    <h1><?php if (empty($Info_title)) {
          echo 'INFORMATION';
        } else {
          echo $Info_title;
        } ?></h1>
  </div>
  <div class="info-panel__wrapper">
    <?php $wp_query = new WP_Query($args); ?>
    <?php if ($wp_query->have_posts()) : ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="info-panel js-info-panel">
          <div class="info-thumbnail">
            <img src="<?php echo the_post_thumbnail_url() ?>" alt="サムネイル" class="js-info-image" style="<?php if (!has_post_thumbnail()) echo "display:none;";  ?>">
          </div>
          <div class="info-content">
            <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?> </p>
            <span><?php echo get_post_time('Y.m.d'); ?></span>
          </div>
        </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <li>ニュースはありません</li>
    <?php endif; ?>

  </div>

  <?php
  //ページネーション
  if (function_exists('pagination')) {
    pagination();
  }
  ?>

</div>
</div>


<?php get_footer(); ?>