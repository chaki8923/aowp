<?php
require('head.php');
require('getplugin.php');
get_header();
$_SESSION['page'] = get_query_var( 'paged' ); 
update_option('current_page' ,$_SESSION['page']);
?>
  
  <main>
    <?php require('loading.php'); ?>
    
  <?php
  $args = array(
    'post_type' => 'post', /* 投稿タイプを指定 */
    'paged' => $paged,
    'posts_per_page' => 8 // 8件の記事を取得
  ); ?>
  <section class="news blog-news">
    <div class="title-cover">
      <h1 class="news-title store-title active"><?php the_title(); ?>一覧</h1>
    </div>
    <div class="news-area">
      <!--------------------- bob1------------------- -->
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <a href="<?php the_permalink(); ?>">
        <div class="news-box">
          <div class="news-box__leftImg" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
          </div>
          <div class="news-box__text">
            <p><?php the_title(); ?></p>
            <span class="date"><?php echo get_post_time('Y.m.d'); ?></span>
            <span class="detail-arrow">＞</span>
            <div class="news-svg">
              <svg viewBox="0 0 160 250" version="1.1">
                <path d="M160,9.09494702e-13 L160,250 C83.8467314,250 30.5133981,250 0,250 C62.0781553,234.015625 80,103.660156 105.673828,55.0234375 C122.789714,22.5989583 140.898438,4.2578125 160,9.09494702e-13 Z"></path>
              </svg>
            </div>

          </div>
        </div>
      </a>
      <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    
  <?php
  //ページネーション
  if (function_exists('pagination')) {
    pagination();
  }
  ?>
  </section>
  <?php require('sidebar.php'); ?>

  </main>
  <?php get_footer(); ?>
