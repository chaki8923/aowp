<?php get_header();
?>
<main class="main blog-container">
  <?php get_template_part('top-menu', 'topmenu'); ?>

  <div class="thumbnail" style="<?php if(!the_post_thumbnail_url()) echo "display:none"; ?>" >
    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル" class="blog-image">
  </div>
  <div class="inner single">
    <div class="single-title">
      <?php the_title(); ?>
    </div>
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>

      <?php endwhile; ?>
    <?php else :  ?>
      <h3>記事がありません</h3>
      <p>表示する記事はありませんでした。</p>
    <?php endif; ?>
    
</main>
</div>

<?php get_footer(); ?>