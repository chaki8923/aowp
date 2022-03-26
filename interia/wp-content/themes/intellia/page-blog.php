<?php
require('head.php');
require('getplugin.php');
get_header();
$_SESSION['page'] = get_query_var( 'paged' ); 
update_option('current_page' ,$_SESSION['page']);

?>
<main class="main blog-page">
  <h2 class="blog-title"><?php the_title(); ?>一覧</h2>
  <?php require('loading.php'); ?>
  <div class="blog-container">
    <?php
    $args = array(
      'post_type' => 'post', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 10,
    ); ?>
    <?php $wp_query = new WP_Query($args); ?>
    <?php if ($wp_query->have_posts()) : ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
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