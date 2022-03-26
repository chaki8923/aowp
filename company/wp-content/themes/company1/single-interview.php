<?php

require('head.php');
require('getplugin.php');
?>
<?php
get_header();
global $post;
?>
<?php if ($wp_query->have_posts()) : ?>
  <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <main class="single">
      <div class="single-image">
      <img src="<?php the_post_thumbnail_url(); ?>" alt="先輩画像">
        <div class="single-panel">
          <p class="single-panel__busho"><?php echo the_title(); ?></p>
          <p class="single-panel__year"><?php echo get_post_meta($post->ID, 'actor-year', true) ?></p>
          <h1 class="single-panel__name"><?php echo get_post_meta($post->ID, 'actor-name', true) ?></h1>
        </div>
      </div>

    <?php endwhile; ?>
  <?php else : ?>
    <h3>記事がありません</h3>
    <p>表示する記事はありませんでした。</p>
  <?php endif; ?>
  <section class="person">
    <div class="title-block">
      <h1 class="single-title">インタビュー</h1>
      <span class="single-subtitle">INTERVIEW</span>
    </div>

    <?php if ($wp_query->have_posts()) : ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <div class="interview-box">
          <div class="interview-inner">
            <h1 class="interview-inner__title"><?php echo get_post_meta($post->ID, 'comment-title1', true) ?></h1>
            <p class="interview-inner__text"><?php echo get_post_meta($post->ID, 'actor-comment1', true) ?></p>
          </div>
          <div class="interview-image">
            <img src="<?php echo get_post_meta($post->ID, 'actor-img1', true) ?>" alt="先輩がオズ">
          </div>
        </div>
        <div class="interview-box">
          <div class="interview-inner">
            <h1 class="interview-inner__title"><?php echo get_post_meta($post->ID, 'comment-title2', true) ?></h1>
            <p class="interview-inner__text"><?php echo get_post_meta($post->ID, 'actor-comment2', true) ?></p>
          </div>
          <div class="interview-image">
            <img src="<?php echo get_post_meta($post->ID, 'actor-img2', true) ?>" alt="先輩画像">
          </div>
        </div>
  </section>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else : ?>
  <li>ニュースはありません</li>
<?php endif; ?>
<section class=" schejule">
  <div class="title-block">
    <h1 class="single-title">1日のスケジュール</h1>
    <span class="single-subtitle">SCHEJULE</span>
  </div>
  <div class="schejule-table">
    <ul class="schejule-list">
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

          <?php for ($i = 1; $i <= 6; $i++) : ?>
            <li class="schejule-list__item " style="<?php if (empty(get_post_meta($post->ID, 'time' . $i, true))) echo "display: none"; ?>">
              <h2 class="schejule-list__title"><span><?php echo get_post_meta($post->ID, 'time' . $i, true); ?></span>
                <p><?php echo get_post_meta($post->ID, 'job' . $i, true); ?></p>
              </h2>
              <p class="schejule-list__text">
                <?php echo get_post_meta($post->ID, 'job_detail' . $i, true); ?>
              </p>
              <span class="next-border" style="<?php if (empty(get_post_meta($post->ID, 'time' . ($i + 1), true))) echo "display: none"; ?>"></span>
            </li>
          <?php endfor; ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>
    </ul>
  </div>
</section>
<section class="message">
  <div class="interview-box">
    <div class="interview-inner">
      <h1 class="interview-inner__title"><?php echo get_post_meta($post->ID, 'comment-title3', true) ?></h1>
      <p class="interview-inner__text"><?php echo get_post_meta($post->ID, 'actor-comment3', true) ?></p>
    </div>
    <div class="interview-image">
      <img src="<?php echo get_post_meta($post->ID, 'actor-img3', true) ?>" alt="先輩画像">
    </div>
  </div>
</section>

<!-- PCバージョンスライダー -->
<h1 class="interview-title"><?php echo $Interview_title; ?></h1>
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

    </main>

    <?php get_footer(); ?>