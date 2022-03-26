<?php
require('head.php');
get_header();

$Main_img = [];
$Slide_text = [];
$Sns_link = [];
for ($i = 1; $i <= 19; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);
  $Slide_text[$i] = get_option('slide_text' . $i);
  $Sns_link[$i] = get_option('sns_link' . $i);
}


$Tell_number = get_option('tell_number');

$Shop_name = get_option('shop_name');
$Company_name = get_option('company_name');
$Address_map = get_option('address_map');
$Address_name = get_option('address_name');

?>
<!-- ------------------------------------------------>
<main class="main">
  <section class="main-imgarea">
    <div class="main-inner">
      <div class="main-text">
        <?php for ($i = 1; $i <= 2; $i++) : ?>
          <h2><?php echo $Slide_text[$i]; ?></h2>
        <?php endfor; ?>
        <div class="main-text_small">
          <?php for ($i = 3; $i <= 4; $i++) : ?>
            <p><?php echo $Slide_text[$i]; ?></p>
          <?php endfor; ?>
        </div>
      </div>
    </div>
    <div class="slide-content">
      <?php for ($i = 1; $i <= 3; $i++) : ?>
        <img src="<?php echo $Main_img[$i]; ?>" alt="" class="js-slide">
      <?php endfor; ?>
    </div>
  </section>
  <?php
  $args = array(
    'post_type' => 'product', /* 投稿タイプを指定 */
    'paged' => $paged,
    'posts_per_page' => 3
  ); ?>
  <?php $wp_query = new WP_Query($args); ?>
  <?php if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <section class="bland">
        <div class="bland-left">
          <div class="bland-left_inner">
            <p class="bland-title">BLAND</p>
            <h2><?php the_title(); ?></h2>
            <div class="main-text_small">
              <p><?php the_content(); ?></p>
            </div>
            <a href="<?php the_permalink(); ?>">MORE</a>
          </div>
        </div>
        <div class="carten"></div>
        <div class="bland-right">
          <div class="bland-right_inner">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
          </div>
        </div>
      </section>


    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php else : ?>
    <li>ニュースはありません</li>
  <?php endif; ?>

  
  <?php
  $args = array(
    'post_type' => 'product', /* 投稿タイプを指定 */
    'paged' => $paged,
    'posts_per_page' => 10,
    'offset' => 3 //表示しない件数  ));
  ); ?>
  <?php $wp_query = new WP_Query($args); ?>
  <?php if ($wp_query->have_posts()) : ?>
    <section class="other">
      <div class="other-flex">
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <div class="other-panel product-list">
        <div class="other-panel_img">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
          </a>
        </div>
        <div class="other-panel_text">
          <h3><?php the_title(); ?></h3>
        </div>
      </div>
      <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php else : ?>
    <li>ニュースはありません</li>
  <?php endif; ?>
    </div>
  </section>
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
            <li><a href="<?php echo $Sns_link[$i]; ?>"><img src="<?php echo $Main_img[$i]; ?>" alt=""></a></li>
          <?php endfor; ?>
        </ul>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>