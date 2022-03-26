<?php

require('head.php');
?>
<?php if (!is_user_logged_in() && !is_bot()) {
  setPostViews(get_the_ID());
}

if ( is_post_type_archive() && !is_date() ) {
  $title = post_type_archive_title( '', false );
}    elseif ( is_date() ) {
  $date  = single_month_title('',false);
  $point = strpos($date,'月');
  $title = mb_substr($date,$point+1).'年'.mb_substr($date,0,$point+1);
}

get_header();
?>

<main class="main page-container">
<?php require('loading.php'); ?>
  <h1 class="page-title"><?php echo $title; ?>の記事一覧</h1>
  <div class="category-topImg">
    <img src="<?php the_post_thumbnail_url();  ?>" alt="サムネイル画像">
  </div>
  <div class="category-inner">
  <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
    <a  href="<?php the_permalink(); ?>" class="category-panel">
      <div class="category-panel--left">
        <span class="category-panel--date"><?php the_time('Y.m.d') ?></span>
        <h2 class="category-panel--title"><?php the_title(); ?></h2>
        <div class="category-panel--text">
          <p>
          <?php echo wp_trim_words(get_the_content(), 70, '...'); ?>
          </p>
        </div>
      </div>
      <div class="category-panel--right">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
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
  <?php require('sidebar.php'); ?>
</main>
<?php get_footer(); ?>
