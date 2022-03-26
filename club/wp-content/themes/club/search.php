<?php
require('head.php');
?>
<?php

get_header();
$Search_bc = get_option('search_bc');
?>

<body>

  <?php if (have_posts()) : ?>
    <?php
    if (isset($_GET['s']) && empty($_GET['s'])) {
      echo '検索キーワード未入力'; // 検索キーワードが未入力の場合のテキストを指定
    } else {


    ?>


      <div class="container container-blog">
        <div class="container-blog__after after" style="background-image: url('<?php echo $Search_bc; ?>');"></div>
        <div class="p-title">
          <h1><span class="link link1"><?php echo $_GET['s']; ?>の検索結果</span> </h1>
        </div>

        <div class="p-category">
          <div class="p-category_list">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <div class="p-category_panel">
                  <a href="<?php the_permalink(); ?>" class="p-category_panelImg" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                    <label for="" class="p-category_label c-label">
                      <ul class="p-category_labelText c-label_item">
                        <li><img src="<?php echo getImg('crock.png'); ?>" alt="日付" class="sidebar__icon sidebar__icon--card"><?php echo get_post_time('Y.m.d'); ?></li>
                        <?php $cat = get_the_category();
                        $cats = $cat[0];

                        ?>
                        <li><img src="<?php echo getImg('folder.png'); ?>" alt="カテゴリー" class="sidebar__icon sidebar__icon--card"><?php echo $cats->cat_name; ?></li>
                      </ul>
                    </label>
                    <h2 class="p-category_panelTitle c-title">
                      <?php the_title(); ?>
                    </h2>
                  </a>
                  <div class="p-category_panelText">
                    <p>
                      <?php echo wp_trim_words(get_the_content(), 60, '...'); ?>
                    </p>
                  </div>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <li>ニュースはありません</li>
            <?php endif; ?>

            <?php
            //ページネーション
            if (function_exists('pagination')) {
              pagination();
            }
            ?>

          </div>
          <?php require('sidebar.php'); ?>
        </div>
      </div>
    <?php } ?>
  <?php else : ?>
    <div class="no-hit">

      <p aria-label="CodePen">
        <span data-text="N">N</span>
        <span data-text="O">O</span>
        <span data-text=""></span>
        <span data-text="H">H</span>
        <span data-text="I">I</span>
        <span data-text="T">T</span>

      </p>
      <h3>検索結果が見つかりません。</h3>
    </div>
    <p class="sp-nohit">検索結果が見つかりません。</p>
  <?php endif; ?>

  <?php get_footer(); ?>