<?php get_header();
$page_num = get_option('current_page');
if (!is_user_logged_in() && !is_bot()) {
  setPostViews(get_the_ID());
}
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
   <?php the_content(); ?>
</main>
</div>

<?php get_footer(); ?>