<?php
require('head.php');
require('getplugin.php');
get_header();
?>

<main class="main">
  <!-- ローディングアイコン -->
  <div class="loading">
    <div class="loader">
      <h1>LOADING</h1>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div class="main-catch">
    <h1 class="main-catch__title" style="<?php if ($Top_flg == 2) echo "display:none" ?>">
      <?php echo $Movie_text; ?>
    </h1>
    <video playsinline autoplay muted loop class="main-movie" style="<?php if ($Top_flg == 2) echo "display:none" ?>">
      <source src="<?php echo $Movie ?>">
    </video>
    <div class="fadeslider" style="<?php if ($Top_flg == 1) echo "display:none" ?>">
      <ul>
        <!-- スライドショーの実装をやる -->
        <h2 style="<?php if ($Top_flg == 1) echo "display:none" ?>"><?php echo $Slide_title; ?></h2>
        <?php for ($i = 1; $i <= 3; $i++) : ?>
          <li><img src="<?php echo $Top_img[$i]; ?>" alt="スライドショー" class="js-slide"></li>
        <?php endfor; ?>
      </ul>
    </div>
  </div>
  <!---------------- about ------------------------>
  <section class="about">

    <h1 class="section-title"><?php echo $About_title; ?></h1>


    <?php

    $args = array(
      'post_type' => 'about', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 4 // 4件の記事を取得
    ); ?>
    <?php $wp_query = new WP_Query($args); ?>
    <?php if ($wp_query->have_posts()) : ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <div class="about-box">
          <div class="about-left" style="background: <?php echo get_post_meta($post->ID, 'back-color', true); ?>;">
            <span class="triangle" style="background-color: <?php echo get_post_meta($post->ID, 'back-color', true); ?>;"></span>
            <a href="<?php echo the_permalink(); ?>" class="about-left__inner">
              <h1 class="about-left__title"><?php the_title(); ?></h1>
              <span class="about-left__titlesub"><?php echo get_post_meta($post->ID, 'sub_title', true); ?></span>
              <a href="<?php echo the_permalink(); ?>" class="about-detail">詳しくはこちら</a>
            </a>
            <div class="l-01__number"><?php echo get_post_meta($post->ID, 'back-number', true); ?></div>
          </div>
          <div class="about-right r-01" style="background-image: url('<?php echo get_post_meta($post->ID, 'back-img', true); ?>');">
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <li>ニュースはありません</li>
    <?php endif; ?>
    </div>
  </section>
  <!---------------- 業務内容 ------------------------>
  <section class="job">
    <div class="p-kv__img">
      <img src="<?php echo $Work_bc; ?>" alt="" class="js-target-parallax">
    </div>
    <h1 class="job-title"><?php echo $Work_title; ?></h1>
    <div class="job-area">
      <?php for ($i = 1; $i <= 3; $i++) : ?>
        <div class="job-box">
          <img src="<?php echo $Icon_img[$i]; ?>" alt="アイコン" class="job-box__logo" style="<?php if (!$Icon_img[$i]) echo "display:none;";  ?>">
          <h2 class="job-box__title"><?php echo $Work_text[$i]; ?></h2>
        </div>
      <?php endfor; ?>
    </div>
    <a href="<?php echo get_page_link(11); ?>" class="job-area__detail">詳しくはこちら</a>
  </section>
  <section class="interview">
    <h1 class="interview-title"><?php echo $Interview_title; ?></h1>

    <!------------------ インタビューエリア ---------------------->

    <!-- PCバージョンスライダー -->

    <?php $args = array(
      'post_type' => 'interview', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 8 // 6件の記事を取得
    ); ?>
    <div class="slider-pc">
      <div class="slider">
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <!-- インタビューパネル１ -->
            <a href="<?php the_permalink(); ?>" class="interview-panel">
              <!-- 先輩画像 -->
              <div class="interview-panel__person" style="background-image: url('<?php echo get_post_meta($post->ID, 'actor-img', true); ?>');">

                <!-- 所属ラベル -->
                <div class="interview-panel__label">
                  <span class="c-label eigyou" style="background-color: <?php echo get_post_meta($post->ID, 'label-color', true); ?>;"><?php echo the_title(); ?></span>
                  <p><?php echo get_post_meta($post->ID, 'actor-name', true); ?></p>
                </div>
              </div>
              <!-- 所属コメント -->
              <div class="interview-panel__comment">
                <?php echo get_post_meta($post->ID, 'actor-comment', true) ?>
              </div>
            </a>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>
      </div>
    </div>

    <!-- スマホバージョンスライダー -->
    <div class="slider-spphone">
      <div class="slider-sp">
        <!-- インタビューパネル１ -->
        <?php

        $args = array(
          'post_type' => 'interview', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 8 // 6件の記事を取得
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <!-- インタビューパネル１ -->
            <a href="<?php the_permalink(); ?>" class="interview-panel">
              <!-- 先輩画像 -->
              <div class="interview-panel__person" style="background-image: url('<?php echo get_post_meta($post->ID, 'actor-img', true); ?>');">

                <!-- 所属ラベル -->
                <div class="interview-panel__label">
                  <span class="c-label eigyou" style="background-color: <?php echo get_post_meta($post->ID, 'label-color', true); ?>;"><?php the_title(); ?></span>
                  <p><?php echo get_post_meta($post->ID, 'actor-name', true); ?></p>
                </div>
              </div>
              <!-- 所属コメント -->
              <div class="interview-panel__comment">
                <?php echo get_post_meta($post->ID, 'actor-comment', true) ?>
              </div>
            </a>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>

      </div>
    </div>

  </section>

  <section class="system">
    <h1 class="system-title"><?php echo $Another_title ?></h1>
    <div class="system-area">
      <?php for ($i = 4; $i <= 5; $i++) : ?>
        <div class="system-left" style="background-image: url('<?php echo $Another_bc[$i]; ?>');">
          <a href="<?php echo get_page_link(117); ?>" class="system-left__box">
            <img src="<?php echo $Icon_img[$i]; ?>" alt="アイコン" style="<?php if (!$Icon_img[$i]) echo "display:none;";  ?>">
            <h2><?php echo $Another_text[$i]; ?></h2>
          </a>
        </div>
      <?php endfor; ?>
    </div>
  </section>
  <section class="news">
    <h1 class="news-title">ニュース</h1>
    <ul>
      <?php

      $args = array(
        'post_type' => 'post', /* 投稿タイプを指定 */
        'paged' => $paged,
        'posts_per_page' => 10 // 6件の記事を取得
      ); ?>
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <li class="news-list"><?php echo the_title(); ?></li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>
    </ul>
  </section>

</main>

<?php get_footer(); ?>