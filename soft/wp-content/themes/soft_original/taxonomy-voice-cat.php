<?php get_header(); ?>
<?php get_template_part('top-menu', 'topmenu'); ?>
<?php require('getplugin.php'); ?>
<main class="main">
  <div class="voice-tab">
    <p>カテゴリーごとのお声</p>
    <ul>
      <li><a href="<?php echo get_page_link(24); ?>">全て</a></li>
      <?php
      $terms = get_terms('voice-cat');
      foreach ($terms as $term) {
        echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
      }
      ?>
    </ul>
  </div>
  <section class="voice" id="voice" style="opacity: 1;">

    <div class="voice-inner">
    <div class="section-title news-title">
      <h1 class="title"><?php if (!empty($voiceTitle)) {
                          echo $voiceTitle;
                        } else echo 'VOICE'; ?></h1>
      <p class="row-title"><?php if (!empty($voiceSubTitle)) {
                              echo $voiceSubTitle;
                            } else echo 'お声'; ?></p>
    </div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <a href="<?php the_permalink(); ?>" class="voice-content js-voice-panel">
            <div class="fase">
              <img src="<?php the_post_thumbnail_url();  ?>" alt="" class="person-img">
            </div>
            <div class="voice-text">
              <h2><?php the_title(); ?></h2>
              <p><?php the_content(); ?></p>
            </div>
          </a>
          <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
          <div class="pagenation">
            <?php
      if (function_exists('my_paginate')) {
        pagination();
      }
      ?>
    </div>
  </div>

  </section>
</main>
<?php get_footer(); ?>