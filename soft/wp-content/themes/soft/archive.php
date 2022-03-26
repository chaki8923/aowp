<?php get_header(); 
if ( is_post_type_archive() && !is_date() ) {
  $title = post_type_archive_title( '', false );
}    elseif ( is_date() ) {
  $date  = single_month_title('',false);
  $point = strpos($date,'月');
  $title = mb_substr($date,$point+1).'年'.mb_substr($date,0,$point+1);
}
?>
<?php get_template_part('top-menu', 'topmenu'); ?>
<?php require('getplugin.php'); ?>  
<main class="main blog-container">
<?php require('loading.php'); ?>
  <div class="blog-list">
  <h2 class="title"><?php echo $title;  ?>の記事一覧</h2>
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