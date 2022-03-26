<?php get_header(); ?>
<?php get_template_part('top-menu', 'topmenu'); ?>
<?php require('getplugin.php'); ?>  
<main class="main blog-container">
<?php require('loading.php'); ?>
  <div class="blog-list">
  <h2 class="title">カテゴリー:<?php
  $categoryList = get_the_category();
  $cat_now  = $categoryList[0];
  $now_id   = $cat_now->cat_ID;
  $now_name = $cat_now->cat_name;
echo $now_name; ?></h2>
    <ul>
    <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
      <li class="blog-item">
        <a href="<?php the_permalink(); ?>" class="blog-block">
          <h3><?php the_title(); ?></h3>
         <p><?php echo wp_trim_words(get_the_content(), 60, '...'); ?></p>
         <span><?php the_time('Y.m.d'); ?></span>
        </a>
      </li>
      <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </ul>
        <?php
        //ページネーション
        if (function_exists('pagination')) {
          pagination();
        }
        ?>
        <a href="<?php echo get_page_link(9); ?>" class="news-list">ニュース一覧へ</a>
  </div>
  <?php require('sidebar.php'); ?>
  
</main>
<?php get_footer(); ?>