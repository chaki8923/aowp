<?php
require('head.php');
require('getplugin.php');

get_header();
?>

<main>
  <?php require('loading.php'); ?>
  <div class="fadeslider">
    <h1 class="store-title"><?php echo $Store_name; ?></h1>
    <img src="<?php echo $Main_img[1]; ?>" alt="スライダー画像" id="sweet1" class="sweet">
    <img src="<?php echo $Main_img[2]; ?>" alt="スライダー画像" id="sweet2" class="sweet">
    <img src="<?php if (!$Main_img[3]) {
                echo $Main_img[2];
              } else {
                echo $Main_img[3];
              } ?>" alt="スライダー画像" id="sweet3" class="sweet">
  </div>
  <section class="main">
    <div class="main-topImg paralla" style="background-image: url('<?php echo $Main_img[9] ?>')"></div>


    <div class="main-inner">
      <h3 class="main-inner__title"><?php echo $Title[1]; ?></h3>
      <h1 class="main-inner__apeal"><?php echo $Title[2]; ?></h1>
      <?php for ($i = 1; $i <= 4; $i++) : ?>
        <p class="main-inner__text"><?php echo $Slide_text[$i]; ?></p>
      <?php endfor; ?>
    </div>
    <div class="main-bottomImg">
      <?php if ($Top_flg[4] == 1) : ?>
        <video playsinline autoplay muted loop>
          <source src="<?php echo $Movie[4]; ?>">
        </video>
      <?php else : ?>
        <img src="<?php echo $Main_img[4]; ?>" alt="" 訴求画像>
      <?php endif; ?>
    </div>
    <div class="main-rightbc">
      <div class="main-rightbc_img">
        <?php if ($Top_flg[5] == 1) : ?>
          <video playsinline autoplay muted loop>
            <source src="<?php echo $Movie[5]; ?>">
          </video>
        <?php else : ?>
          <img src="<?php echo $Main_img[5]; ?>" alt="訴求画像">
        <?php endif; ?>
      </div>
    </div>
    <h1 class="store-title store-title__middle"><?php echo $Store_name; ?></h1>
    <div class="main-bottom">
      <h3 class="main-inner__title"><?php echo $Title[3]; ?></h3>
      <h1 class="main-inner__apeal"><?php echo $Title[4]; ?></h1>
      <?php for ($i = 5; $i <= 8; $i++) : ?>
        <p class="main-inner__text"><?php echo $Slide_text[$i]; ?></p>
      <?php endfor; ?>
    </div>
    <div class="main-video">
      <?php if ($Top_flg[6] == 1) : ?>
        <video playsinline autoplay muted loop>
          <source src="<?php echo $Movie[6]; ?>">
        </video>
      <?php else : ?>
        <img src="<?php echo $Main_img[6]; ?>" alt="訴求画像">
      <?php endif; ?>
    </div>
  </section>
  <section class="product">
    <div class="title-cover">
      <h1 class="store-title product-title"><?php echo $Title[5]; ?></h1>
    </div>
    <div class="p-kv__img">
      <img src="<?php echo $Main_img[7]; ?>" alt="" class="js-target-parallax">
    </div>

    </div>

    <?php
    $args = array(
      'post_type' => 'product', /*商品を指定 */
      'paged' => $paged,
      'posts_per_page' => 9 // ○件の記事を取得
    ); ?>
    <div class="product-table">
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <div class="product-panel">
            <div class="product-panel__img js-productImg">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="商品画像">
            </div>
            <div class="product-panel__title">
              <h3><?php echo get_post_meta($post->ID, 'plice', true);  ?></h3>
            </div>
            <div class="product-panel__text">
              <p><?php echo get_post_meta($post->ID, 'menu_text', true);  ?></p>
            </div>
            <!-- アイコン -->
            <?php if (get_post_meta($post->ID, 'check_flg', true) == 2) :  ?>
              <span class="badge  new">
                最新作
              </span>
            <?php elseif (get_post_meta($post->ID, 'check_flg', true) == 1) : ?>

              <span class="badge popu">
                一番<br>人気
              </span>
            <?php endif; ?>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>

    </div>
  </section>
  <section class="map" id="map">
    <div class="title-cover">
      <h1 class="store-title map-title"><?php echo $Title[6]; ?></h1>
    </div>

    <div class="map-sukejule">
      <div class="map-sukejule__map">
        <img src="<?php echo $Main_img[8]; ?>" alt="店舗外観">
      </div>
      <div class="map-sukejule__graph">
        <table class="map-sukejule__table">
          <h2 class="map-sukejule__title"><?php echo $Title[7]; ?></h2>
          <?php for ($i = 0; $i <= 6; $i++) : ?>
            <tr>
              <th><?php echo $Month[$i] ?><span>月</span><?php echo $Day[$i] ?><span>月</span>(<?php echo  $week[$i] ?>)</th>
              <td><?php echo $Plase[$i]; ?></td>
            </tr>
          <?php endfor; ?>
        </table>
      </div>
    </div>
  </section>


  <?php
  $args = array(
    'post_type' => 'post', /* 投稿タイプを指定 */
    'paged' => $paged,
    'posts_per_page' => 8 // 4件の記事を取得
  ); ?>
  <section class="news">
    <div class="title-cover">
      <h1 class="news-title store-title">NEWS</h1>
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
    <a href="<?php echo get_permalink(28); ?>" class="news-list">NEWS LIST ></a>

  </section>
  <?php get_footer(); ?>
</main>