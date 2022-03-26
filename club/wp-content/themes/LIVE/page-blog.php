<?php
require('head.php');
get_header();

?>

<body>
<?php require('loading.php'); ?>
  <div class="container container-blog">
    <div class="container-blog__after after" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
    <div class="p-title">
      <div class="items">
        <h1><span class="link link1"><?php echo the_title(); ?></span></h1>
      </div>
    </div>
    <?php
    $args = array(
      'post_type' => 'post', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 8 // 8件の記事を取得
    ); ?>
    <div class="p-category">
      <div class="p-category_list">
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
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
  <?php get_footer(); ?>