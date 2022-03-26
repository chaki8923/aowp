<?php get_header(); ?>
<?php require('getplugin.php'); ?>  
<main class="main">
  <?php get_template_part('top-menu', 'topmenu'); ?>
  <div class="voice-tab">
     <p>カテゴリーごとのお声</p>
     <ul>
     <?php
    $terms = get_terms('voice-cat');
    foreach ( $terms as $term ) {
      echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
    }
  ?>
     </ul>
   </div>
   <section class="voice" id="voice" style="opacity: 1;">
    <?php
    $args = array(
      'post_type' => 'voice', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 8 // 8件の記事を取得
    ); ?>

    <div class="section-title news-title ">
      <h1 class="title"><?php if (!empty($voiceTitle)) {
                          echo $voiceTitle;
                        } else echo 'VOICE'; ?></h1>
      <p class="row-title"><?php if (!empty($voiceSubTitle)) {
                              echo $voiceSubTitle;
                            } else echo 'お声'; ?></p>
    </div>
    <?php query_posts($args) ?>
    <?php if ($wp_query->have_posts()) : ?>
      <?php while ($wp_query->have_posts()) : $wp_query->the_post();
        /* ループ開始 */ ?>
        <a href="<?php the_permalink(); ?>" class="voice-content js-voice-panel">
          <div class="fase">
            <img src="<?php the_post_thumbnail_url();  ?>" alt="" class="person-img">
          </div>
          <div class="voice-text">
            <h2><?php the_title(); ?></h2>
            <p><?php echo wp_trim_words(get_the_content(), 60, '...'); ?></p>
          </div>
        </a>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <?php
        //ページネーション
        if (function_exists('pagination')) {
          pagination();
        }
        ?>
  </section>

 
</main>
<?php get_footer(); ?>