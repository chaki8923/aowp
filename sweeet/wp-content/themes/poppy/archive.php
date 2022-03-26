<?php
require('head.php');
require('getplugin.php');

get_header();

if ( is_post_type_archive() && !is_date() ) {
  $title = post_type_archive_title( '', false );
}    elseif ( is_date() ) {
  $date  = single_month_title('',false);
  $point = strpos($date,'月');
  $title = mb_substr($date,$point+1).'年'.mb_substr($date,0,$point+1);
}
?>

<main>

<?php require('loading.php'); ?>

  <section class="news  blog-news">
    <div class="title-cover">
      <h1 class="news-title active store-title"><?php echo $title;  ?>の記事一覧</h1>
    </div>
    <?php if (have_posts()) : ?>
      <div class="news-area">
        <!--------------------- bob1------------------- -->
        <?php while (have_posts()) : the_post(); ?>
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
