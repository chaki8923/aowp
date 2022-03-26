<?php
require('head.php');

get_header();
?>

<body>

  <div class="container container-blog">
    <div class="container-blog__after after" style="background-image: url('<?php echo get_post_meta($post->ID, 'back-img', true); ?>');"></div>
    <div class="p-title">
      <h1><span class="link link1"> <?php single_cat_title('', true); ?>の記事一覧</span></h1>
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
                  Wordpressテーマ
                </h2>
              </a>
              <div class="p-category_panelText">
                <p>
                  <?php echo wp_trim_words(get_the_content(), 40, '...'); ?>
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
  <?php get_footer(); ?>