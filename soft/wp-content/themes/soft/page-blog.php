<?php get_header(); ?>
<?php require('getplugin.php'); 
$_SESSION['page'] = get_query_var( 'paged' ); 
update_option('current_page' ,$_SESSION['page']);
?>
<main class="main blog-container">
  <?php require('loading.php'); ?>
  <?php get_template_part('top-menu', 'topmenu'); ?>
  <div class="blog-list">
    <h2 class="title"><?php the_title(); ?></h2>
    <ul>
      <?php

      $args = array(
        'post_type' => 'post',
        'paged' => $paged,
        'post_per_page' => 10
      ) ?>
      <?php $wp_query = new WP_Query($args); ?>
      <?php if ($wp_query->have_posts()) : ?>
        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
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
   
  </div>
  <?php require('sidebar.php'); ?>

</main>
<?php get_footer(); ?>