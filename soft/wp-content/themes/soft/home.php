<?php get_header(); ?>
<main class="main">

  <?php get_template_part('top-menu', 'topmenu'); ?>

  <?php require('loading.php'); ?>
  <!-- ========================================================== -->
  <!-- メインキャッチ画像 -->
  <!-- ========================================================== -->
  <?php require('getplugin.php'); ?>
  <div class="main-kyatch">
    <img src="<?php 
                echo $main_bc; ?>" alt="メイン画像">
    <h1><?php echo $main_text; ?><h1>
  </div>
  <!-------------------- セクション ～about～ ----------------------------->
  <section class="about" id="about">
    <div class="section-title about-title">
      <h1 class="title"><?php echo $about_title; ?></h1>
      <p class="row-title"><?php echo $about_subtitle; ?></p>
    </div>
    <div class="about-inner">
      <div class="about-inner__imgarea">
        <div class="about-inner__img about-inner__img1">
          <img src="<?php echo $about_img1 ?>" alt="about1">
        </div>
        <div class="about-inner__img about-inner__img2">
          <img src="<?php echo $about_img2 ?>" alt="about2">
        </div>
      </div>
      <div class="about-inner__textarea">
        <p class="txt-t"><?php echo $abouText_t; ?></p>
        <p class="txt-m">
          <?php echo $abouText_m; ?>
        </p>
        <p class="txt-b"><?php echo $abouText_b; ?></p>
      </div>
    </div>
  </section>

  <!------------------------- セクション ～FEATURE～ ----------------------->
  <section class="feature" id="feature">
    <div class="section-title feature-title">
      <h1 class="title"><?php echo $feature_title; ?></h1>
      <p class="row-title"><?php  echo $feature_subtitle; ?></p>
    </div>
    <div class="feature-merit">
      <!-- タイトルとその下の説明文 -->
      <?php dynamic_sidebar('アピールエリア'); ?>

    </div>
  </section>
  <!------------------------- セクション ～OPTION～ ----------------------->
  <section class="option" id="option">
    <div class="section-title option-title">
      <h1 class="title"><?php echo $option_title; ?></h1>
      <p class="row-title"><?php echo $option_subtitle; ?></p>
    </div>
    <?php dynamic_sidebar('施術の流れエリア'); ?>

  </section>
  <!------------------------- セクション ～THEME～ ----------------------->
  <section class="theme" id="theme">
    <div class="section-title theme-title">
      <h1 class="title"><?php echo $product_title; ?></h1>
      <p class="row-title"><?php echo $product_subtitle ?></p>
    </div>
    <?php

    $args = array(
      'post_type' => 'product', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 6 // 6件の記事を取得
    ); ?>
    <div class="theme-box">
      <?php query_posts($args) ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post();
          /* ループ開始 */ ?>
          <!-- それぞれのパネル -->
          <div class="theme-panel">
            <div class="theme-panel__inner">

              <a href="<?php echo the_permalink(); ?>" class="theme-panel__img">
                <?php the_post_thumbnail();  ?>
              </a>
              <!-- カテゴリー名取得表示 -->
              <?php
              $categories = get_the_category(); ?>
              <p class="theme-panel__txt">
                <?php
                foreach ($categories as $cat) : ?>
                  <?php echo $cat->name; ?>
                <?php endforeach; ?>
              </p>
  
              <h2 class="theme-panel__plice"><span><?php the_title(); ?></span><?php echo get_post_meta($post->ID, 'plice', true); ?></h2>
             
            </div>
          </div>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      <?php else : ?>
        <p>商品登録はまだありません</p>
      <?php endif; ?>
      <!--↓↓ BOXエリアの閉じタグ -->
    </div>
  </section>

  <!-- voice -->
  <section class="voice" id="voice"  >
    <?php
    $args = array(
      'post_type' => 'voice', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 6 // 6件の記事を取得
    ); ?>

    <div class="section-title news-title">
      <h1 class="title"><?php echo $voiceTitle; ?></h1>
      <p class="row-title"><?php echo $voiceSubTitle; ?></p>
    </div>
    <?php query_posts($args) ?>
    <?php if ($wp_query->have_posts()) : ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post();
        /* ループ開始 */ ?>
        <a href="<?php the_permalink(); ?>" class="voice-content js-voice-panel">
          <div class="fase">
            <img src="<?php the_post_thumbnail_url();  ?>" alt="お客様画像" class="person-img">
          </div>
          <div class="voice-text">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
          </div>
        </a>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    <?php else : ?>
      <p>登録がありません
      </p>
    <?php endif; ?>
    <a href="<?php echo get_page_link(24); ?>" class="voice-list">お声一覧へ</a>
  </section>
  <!------------------------- セクション ～NEWS～ ----------------------->
  <section class="news" id="news">
    <div class="section-title news-title">
      <h1 class="title"><?php 
                          echo $news_title; ?>
                        </h1>
      <p class="row-title"><?php 
                              echo $news_subtitle;
                             ?></p>
    </div>
    <div class="news-inner">
      <ul>

        <?php

        $args = array(
          'post_type' => 'post',
          'paged' => $paged,
          'post_per_page' => 6
        ) ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

            <a href="<?php the_permalink(); ?>">
              <li><?php the_title(); ?></li>
            </a>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>
      </ul>
    </div>
    <a href="<?php echo get_page_link(9); ?>" class="news-list">ニュース一覧へ</a>
  </section>
  <section class="map">
    <?php echo $Map; ?>
    <div class="time-area">
      <table>
        <tbody>
          <tr>
            <th class="table-title" colspan="3"><?php echo $Schedule; ?></th>
          </tr>
          <tr>
            <th></th>
            <td><?php echo $Time1; ?></td>
            <td><?php echo $Time2; ?></td>
          </tr>
          <tr>
            <th>月</th>
            <?php for ($i = 1; $i <= 2; $i++) : ?>
              <td><?php echo $Okno[$i]; ?></td>
            <?php endfor; ?>
          </tr>
          <tr>
            <th>火</th>
            <?php for ($i = 3; $i <= 4; $i++) : ?>
              <td><?php echo $Okno[$i]; ?></td>
            <?php endfor; ?>
          </tr>
          <tr>
            <th>水</th>
            <?php for ($i = 5; $i <= 6; $i++) : ?>
              <td><?php echo $Okno[$i]; ?></td>
            <?php endfor; ?>
          </tr>
          <tr>
            <th>木</th>
            <?php for ($i = 7; $i <= 8; $i++) : ?>
              <td><?php echo $Okno[$i]; ?></td>
            <?php endfor; ?>
          </tr>
          <tr>
            <th>金</th>
            <?php for ($i = 9; $i <= 10; $i++) : ?>
              <td><?php echo $Okno[$i]; ?></td>
            <?php endfor; ?>
          </tr>
          <tr>
            <th>土</th>
            <?php for ($i = 11; $i <= 12; $i++) : ?>
              <td><?php echo $Okno[$i]; ?></td>
            <?php endfor; ?>
          </tr>
          <tr>
            <th>日</th>
            <?php for ($i = 13; $i <= 14; $i++) : ?>
              <td><?php echo $Okno[$i]; ?></td>
            <?php endfor; ?>
          </tr>
        </tbody>
      </table>
      <div class="address">
        <h2>〒<?php echo $Post; ?></h2>
        <h2><?php echo $Add; ?></h2>
        <h1>TEL: <?php echo $Tell; ?></h1>
        <a href="tel:<?php echo $Tell ?>" class="tel-btn">電話をかける</a>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>