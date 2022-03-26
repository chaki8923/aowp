<?php
require('head.php');
require('getplugin.php');
if (!is_user_logged_in() && !is_bot()) {
  setPostViews(get_the_ID());
}
$page_num = get_option('current_page');
get_header();
?>

<main>
  <h1 class="store_name"><?php echo $Store_name; ?></h1>
  <div class="title-area">
    <div>
      <h1 class="single-title"><?php the_title(); ?></h1>
    </div>
  </div>
 <section class="single-blog">
  <div class="thumbnail">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
  </div>
  <div class="single-content">
    <?php the_content(); ?>
  </div>
  
</section>
 <?php get_footer(); ?>
</main>

