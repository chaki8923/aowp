<?php
require('head.php');

require('getplugin.php');
get_header();
?>



  <div class="container container-blog">
  <?php require('loading.php'); ?>
    <div class="container-blog__after after" style="background-color: #f4f4f4';"></div>
    <div class="p-title">
      <h1><?php single_cat_title('', true); ?>の記事一覧</h1>
    </div>

    <div class="p-category">
      <div class="p-category_list">
        <?php

        //記事は取得できてる
        $cat = get_the_category();
         $cats = $cat[0];
        $args = array(
          'posts_per_page' => 4, // 表示件数の指定
          'category_name' => $cats->slug,
          'paged' => get_query_var( 'paged', 1 )
        );
        $posts = get_posts( $args );
        foreach ( $posts as $post ): // ループの開始
        setup_postdata( $post ); // 記事データの取得
       
          ?>
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
            <?php
        endforeach; // ループの終了
        wp_reset_postdata(); // 直前のクエリを復元する
      ?>
        <div class="pagination">

        <?php
        //ページネーション
        if (function_exists('pagination')) {
          pagination();
        }
        ?>
        </div>
        

      </div>
      <?php require('blog_sidebar.php'); ?>
    </div>
  </div>
  <?php get_footer(); ?>