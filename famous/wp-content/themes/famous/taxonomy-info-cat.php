<?php

require('head.php');
require('getplugin.php');

get_header();
?>

<body>

  <div class="container container-blog">
    <div class="container-blog__after after" style="background-color: #f4f4f4');"></div>
    <div class="p-title">
      <h1><?php single_cat_title('', true); ?></h1>
    </div>
    
    <div class="p-category">
      <div class="p-category_list">
 
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); /* ループ開始 */ ?>
            <div class="p-category_panel">
              <a href="<?php the_permalink(); ?>" class="p-category_panelImg" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                <label for="" class="p-category_label c-label">
                  <ul class="p-category_labelText c-label_item">
                    <li><img src="img/crock.png" alt="" class="sidebar__icon sidebar__icon--card"><?php echo get_post_time('Y.m.d'); ?></li>
                    <?php $terms =wp_get_object_terms( $post->ID, 'info-cat');
                    $term = $terms[0]->name;

                    ?>
                    <li><img src="img/folder.png" alt="" class="sidebar__icon sidebar__icon--card"><?php echo $term; ?></li>
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

          <div class="pagenation">

          <?php
         if (function_exists('my_paginate')) {
          pagination();
        }
          ?>
          </div>

      </div>
      <?php require('info_sidebar.php'); ?>
    </div>
  </div>
  <?php get_footer(); ?>