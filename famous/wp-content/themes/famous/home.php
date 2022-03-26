<?php

require('head.php');

require('getplugin.php');

get_header();
?>

<div class="demo-cont">
  <!-- slider start -->
  <div class="fnc-slider example-slider">
    <div class="fnc-slider__slides">
      <!-- slide start -->
      <div class="fnc-slide m--blend-green m--active-slide">
        <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[1]; ?>');">
          <div class="fnc-slide__mask">
            <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[1]; ?>');"></div>
          </div>
          <div class="fnc-slide__content">
            <h2 class="fnc-slide__heading">
              <div class="fnc-slide__heading-line">
                <span><?php echo $Slide_text[1]; ?></span>
              </div>

            </h2>
            <button type="button" class="fnc-slide__action-btn">

            </button>
          </div>
        </div>
      </div>
      <!-- slide end -->
      <!-- slide start -->
      <div class="fnc-slide m--blend-dark">
        <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[2]; ?>');">
          <div class="fnc-slide__mask">
            <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[2]; ?>');"></div>
          </div>
          <div class="fnc-slide__content">
            <h2 class="fnc-slide__heading">
              <div class="fnc-slide__heading-line">
                <span><?php echo $Slide_text[2]; ?></span>
              </div>

            </h2>
            <button type="button" class="fnc-slide__action-btn">

            </button>
          </div>
        </div>
      </div>
      <!-- slide end -->
      <!-- slide start -->
      <div class="fnc-slide m--blend-red">
        <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[3]; ?>');">
          <div class="fnc-slide__mask">
            <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[3]; ?>');"></div>
          </div>
          <div class="fnc-slide__content">
            <h2 class="fnc-slide__heading">
              <div class="fnc-slide__heading-line">
                <span><?php echo $Slide_text[3]; ?></span>
              </div>

            </h2>
            <button type="button" class="fnc-slide__action-btn">

            </button>
          </div>
        </div>
      </div>
      <!-- slide end -->
      <!-- slide start -->
      <div class="fnc-slide m--blend-blue">
        <div class="fnc-slide__inner" style="background-image: url('<?php echo $Main_img[4]; ?>');">
          <div class="fnc-slide__mask">
            <div class="fnc-slide__mask-inner" style="background-image: url('<?php echo $Main_img[4]; ?>');"></div>
          </div>
          <div class="fnc-slide__content">
            <h2 class="fnc-slide__heading">
              <div class="fnc-slide__heading-line">
                <span><?php echo $Slide_text[4]; ?></span>
              </div>

            </h2>
            <button type="button" class="fnc-slide__action-btn">

            </button>
          </div>
        </div>
      </div>
      <!-- slide end -->
    </div>
    <nav class="fnc-nav">
      <div class="fnc-nav__bgs">
        <div class="fnc-nav__bg m--navbg-green m--active-nav-bg"></div>
        <div class="fnc-nav__bg m--navbg-dark"></div>
        <div class="fnc-nav__bg m--navbg-red"></div>
        <div class="fnc-nav__bg m--navbg-blue"></div>
      </div>
      <div class="fnc-nav__controls">
        <button class="fnc-nav__control">
          SLIDE1
          <span class="fnc-nav__control-progress"></span>
        </button>
        <button class="fnc-nav__control">
          SLIDE2
          <span class="fnc-nav__control-progress"></span>
        </button>
        <button class="fnc-nav__control">
          SLIDE3
          <span class="fnc-nav__control-progress"></span>
        </button>
        <button class="fnc-nav__control">
          SLIDE4
          <span class="fnc-nav__control-progress"></span>
        </button>
      </div>
    </nav>
  </div>
  <!-- slider end -->
  <div class="demo-cont__credits">
    <div class="demo-cont__credits-close"></div>
    <h2 class="demo-cont__credits-heading">Made by</h2>
    <h3 class="demo-cont__credits-name">Nikolay Talanov</h3>
    <a href="https://codepen.io/suez/" target="_blank" class="demo-cont__credits-link">My codepen</a>
    <a href="https://twitter.com/NikolayTalanov" target="_blank" class="demo-cont__credits-link">My twitter</a>
    <h2 class="demo-cont__credits-heading">Based on</h2>
    <a href="https://dribbble.com/shots/2375246-Fashion-Butique-slider-animation" target="_blank" class="demo-cont__credits-link">Concept by Kreativa Studio</a>
    <h4 class="demo-cont__credits-blend">Global Blend Mode</h4>
    <div class="colorful-switch">
      <input type="checkbox" class="colorful-switch__checkbox js-activate-global-blending" id="colorful-switch-cb" />
      <label class="colorful-switch__label" for="colorful-switch-cb">
        <span class="colorful-switch__bg"></span>
        <span class="colorful-switch__dot"></span>
        <span class="colorful-switch__on">
          <span class="colorful-switch__on__inner"></span>
        </span>
        <span class="colorful-switch__off"></span>
      </label>
    </div>
  </div>
</div>
<main class="main">
  <?php require('loading.php'); ?>
  <section class="about">
    <h2 class="title"><?php if (empty($About_title)) {
                        echo 'ABOUT';
                      } else {
                        echo $About_title;
                      } ?></h2>
    <div class="about-text">
      <p>
        <?php echo $About_text; ?>
      </p>
    </div>
    <div class="about-threeClunum">
      <img src="<?php echo $Main_img[5]; ?>" alt="ABOUT画像" style="<?php if (!$Main_img[5]) echo "display:none;"; ?>">
      <img src="<?php echo $Main_img[6]; ?>" alt="ABOUT画像" style="<?php if (!$Main_img[6]) echo "display:none;"; ?>">
      <img src="<?php echo $Main_img[7]; ?>" alt="ABOUT画像" style="<?php if (!$Main_img[7]) echo "display:none;"; ?>">
    </div>
    <div class="about-text">
      <p>
        <?php echo $About_text2; ?>
      </p>
    </div>
    <div class="link">
      <a href="<?php echo get_page_link(55); ?>"><?php if (empty($About_title)) {
                                                    echo 'ABOUT';
                                                  } else {
                                                    echo $About_title;
                                                  } ?></a>
    </div>
  </section>
  <section class="work">
    <h2 class="title"><?php if (empty($About_title)) {
                        echo 'WORK';
                      } else {
                        echo $Work_title;
                      } ?></h2>
    <div class="work-text">
      <p>
        <?php echo $Work_text; ?>
      </p>
    </div>
    <div class="work-area">
      <?php
      $args = array(
        'post_type' => 'worklist', /* 投稿タイプを指定 */
        'paged' => $paged,
        'posts_per_page' => 8
      ); ?>
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="work-area--link js-work-link">
            <div class="work-area--panel">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="制作物" class="work-area--img" style="<?php if (!has_post_thumbnail()) echo "display:none;";  ?>">
              <div class="work-area--panel-text js-work-text">
                <p>
                  <?php echo wp_trim_words(get_post_meta($post->ID, 'work-comment', true), 40, '...'); ?>
                </p>
              </div>
              <h2 class="work-area--panel-title js-work-title"><?php echo get_post_meta($post->ID, 'worklist', true); ?></h2>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>


    </div>
    <div class="link">
      <a href="<?php echo get_page_link(39); ?>"><?php if (empty($About_title)) {
                                                    echo 'WORK';
                                                  } else {
                                                    echo $Work_title;
                                                  } ?>一覧へ</a>
    </div>
  </section>

  <section class="info">
    <div class="info-filter">

    </div>
    <h2 class="title"><?php if (empty($Info_title)) {
                        echo 'INFORMATION';
                      } else {
                        echo $Info_title;
                      } ?></h2>
    <div class="info-inner">
      <?php
      $args = array(
        'post_type' => 'information', /* 投稿タイプを指定 */
        'paged' => $paged,
        'posts_per_page' => 8
      ); ?>
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="info-inner--panel">
            <div class="info-inner--panel-img">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="インフォサムネイル" class="js-info-img" style="<?php if (!has_post_thumbnail()) echo "display:none;";  ?>">
            </div>
            <div class="info-inner--panel-text">
              <p>
                <?php echo get_post_meta($post->ID, 'info-comment', true)  ?>
              </p>
              <?php $terms = wp_get_object_terms($post->ID, 'info-cat');
              $term = $terms[0]->name; ?>
              <div class="term-list">
                <span><?php the_title(); ?></span>
                <span class="term"><?php echo $term; ?></span>
                <span class="date"><?php echo get_post_time('Y.m.d'); ?></span>
              </div>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>
    </div>
    <div class="link">
      <a href="<?php echo get_page_link(70); ?>"><?php if (empty($Info_title)) {
                                                    echo 'INFORMATION';
                                                  } else {
                                                    echo $Info_title;
                                                  } ?>一覧へ</a>
    </div>
  </section>

  <span class="sp-flg">a</span>
  <section class="voice">
  <div class="p-kv__img">
		<img src="<?php echo $Main_img[8]; ?>" alt="" class="js-target-parallax">
	</div>
   

      <h2 class="title"><?php if (empty($Voice_title)) {
                          echo 'VOICE';
                        } else {
                          echo $Voice_title;
                        } ?></h2>
      <div class="voice-slider">
        <?php
        $args = array(
          'post_type' => 'voice', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 10
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <div class="voice-panel" style="<?php if (!has_post_thumbnail()) echo "display:none;";  ?>">
              <span class="voice-panel--name"><?php the_title(); ?></span>
              <div class="voice-panel--img">
                <img src="<?php the_post_thumbnail_url(); ?> " alt="協力者画像">
              </div>
              <div class="voice-panel--text">
                <p><?php the_content(); ?></p>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>

      </div>
    </div>
  </section>


  <section class="blog">
    <h2 class="title"><?php if (empty($Blog_title)) {
                        echo 'BLOG';
                      } else {
                        echo $Blog_title;
                      } ?></h2>
    <div class="blog-inner">
      <?php
      $args = array(
        'post_type' => 'post', /* 投稿タイプを指定 */
        'paged' => $paged,
        'posts_per_page' => 4
      ); ?>
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

          <a href="<?php the_permalink(); ?>" class="blog-panel">
            <span class="blog-panel--date"><?php echo get_post_time('Y.m.d'); ?></span>
            <div class="blog-panel--img">
              <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" class="js-blog-img" style="<?php if (!has_post_thumbnail()) echo "display:none;";  ?>">
              <h2 class="blog--slidetext js-blog-title">
                <?php the_title(); ?>
              </h2>
            </div>
            <div class="blog-panel--text">
              <p>

              </p>
            </div>
          </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>


    </div>
    <div class="link">
      <a href="<?php echo get_page_link(77); ?>"><?php if (empty($Blog_title)) {
                                                    echo 'BLOG';
                                                  } else {
                                                    echo $Blog_title;
                                                  } ?>一覧へ</a>
    </div>
  </section>
  <section class="address">
    <h2 class="title">
      <?php echo $Address_title; ?>
    </h2>
    <div class="address-map">
      <span class="address-title"><?php if (empty($Address_title)) {
                                    echo 'アクセス';
                                  } else {
                                    echo $Address_title;
                                  } ?></span>
      <div class="map-wraper"></div>
      <div class="address-map--google">
        <?php echo $Address_map; ?>
      </div>
      <div class="address-text">
        <p class="address-text--inner">

          <span><?php echo $Address_name; ?></span>
          <span><?php echo $Address_time; ?></span>

        </p>
      </div>
      <span class="address-title">開催情報</span>
      <table class="address-table">
        <tbody>
       
            <tr style="<?php if (!$Fes_info[0]) echo "display:none"; ?>">
              <th>開催期間</th>
              <td><?php echo $Fes_info[0] ?></td>
            </tr>
            <tr style="<?php if (!$Fes_info[1]) echo "display:none"; ?>">
              <th>会場</th>
              <td><?php echo $Fes_info[1] ?></td>
            </tr>
            <tr style="<?php if (!$Fes_info[2]) echo "display:none"; ?>">
              <th>料金</th>
              <td><?php echo $Fes_info[2] ?></td>
            </tr>
            <tr style="<?php if (!$Fes_info[3]) echo "display:none"; ?>">
              <th>問合わせ</th>
              <td><?php echo $Fes_info[3] ?></td>
            </tr>
            <tr style="<?php if (!$Fes_info[4]) echo "display:none"; ?>">
              <th>URL</th>
              <td><?php echo $Fes_info[4] ?></td>
            </tr>


        </tbody>
      </table>

    </div>
  </section>


</main>

<?php get_footer(); ?>