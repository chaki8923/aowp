<?php
require('head.php');



get_header();
?>

<body>

  <div class="container container-cat">
    <div class="container-cat__after after" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
    <div class="p-title">
      <div class="items">
        <h1><span class="link link1"><?php echo the_title(); ?></span></h1>
      </div>
    </div>
    <div class="p-category c-bc-color">

      <div class="clearfix"></div>
      <div class="p-catList">
        <ul>
        
          <?php
          $terms = get_terms('schedule-cat');
          foreach ($terms as $term) {
            echo '<li><a href="' . get_term_link($term) . '">' . $term->name . '</a></li>';
          }
          ?>

        </ul>
      </div>

      <div>
        <?php
        $args = array(
          'post_type' => 'schedule', /* 投稿タイプを指定 */
          'paged' => $paged,
          'posts_per_page' => 8 // 8件の記事を取得
        ); ?>
        <?php $wp_query = new WP_Query($args); ?>
        <?php if ($wp_query->have_posts()) : ?>
          <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <div class="p-category_container js-catList">
              <a href="<?php the_permalink();  ?>" class="p-category_inner">
                <!-- 日付 -->
                <div class="p-article_date p-article_date">
                  <div class="p-article_date-inner p-category_left">
                    <span class="c-date"><?php echo get_post_time('m月'); ?></span>
                    <?php $jp_week = array('日', '月', '火', '水', '木', '金', '土');
                    $terms = wp_get_object_terms( $post->ID, 'schedule-cat');
                    $term = $terms[0]->name;

            
                    ?>
                    <span class="c-week"><?php echo $jp_week[get_post_time('w')] . '曜日';  ?></span>
                    <span class="c-year"><?php echo get_post_time('Y'); ?></span>
                  </div>
                </div>
                <!-- サムネイル -->
                <div class="p-thumbnail  p-category_thumbnail js-thumbnail">
                  <div class="p-article_mounth">
                    <span class="c-cat"><?php echo $term ?></span>
                  </div>
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" class="c-img">
                </div>
                <div class="p-category_comment p-category_text">
                  <h2 class="p-category_comment-title"><?php echo $term; ?></h2>
                  <p class="p-category_comment-text"><?php echo wp_trim_words(get_the_content(), 80, '...'); ?></p>
                </div>
                <!-- 詳細 -->
              </a>
              <div class="p-more">
                <a href="<?php the_permalink(); ?>">MORE</a>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <li>ニュースはありません</li>
        <?php endif; ?>


      </div>
      <?php
      //ページネーション
      if (function_exists('pagination')) {
        pagination();
      }
      ?>
    </div>

  </div>
  <?php get_footer(); ?>