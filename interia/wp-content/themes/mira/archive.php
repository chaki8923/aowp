<?php
require('head.php');
require('getplugin.php');
if ( is_post_type_archive() && !is_date() ) {
  $title = post_type_archive_title( '', false );
}    elseif ( is_date() ) {
  $date  = single_month_title('',false);
  $point = strpos($date,'月');
  $title = mb_substr($date,$point+1).'年'.mb_substr($date,0,$point+1);
}

get_header();
?>
<main class="main blog-page">
<h2 class="blog-title"><?php echo $title;  ?>の記事一覧</h2>
<?php require('loading.php'); ?>
  <div class="blog-container">
  <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="blog-card js-card">
          <div class="blog-card__img">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" class="js-card-image">
          </div>
          <div class="blog-card__text">
            <h3><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
            <span><?php the_time('Y.m.d'); ?></span>
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
  
  
</main>
<?php require('sidebar.php'); ?>
<div class="map-wraper"></div>
    <section class="address">
      <?php echo $Address_map; ?>
      <div class="address-inner">
        <div class="address-inner_text">
          <h2><?php echo $Shop_name; ?></h2>
          <p><?php echo $Company_name; ?></p>
          <p><?php echo $Address_name; ?></p>
          <p>TEL：<?php echo $Tell_number; ?></p>
          <ul>
            <?php for ($i = 11; $i <= 19; $i++) : ?>
              <li style="<?php if (!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i]; ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン"></a></li>
            <?php endfor; ?>
          </ul>
        </div>
      </div>
    </section>

<?php get_footer(); ?>