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
      <span><?php echo get_post_time('Y.m.d'); ?></span>
    </div>
  </div>
 <section class="single-blog">
  <div class="thumbnail">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
  </div>
  <div class="single-content">
    <?php the_content(); ?>
  </div>
  <div class="share-area">
      <p>この記事をシェア</p>
      <ul>
        <li><a class="fasebook" href="//www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&t=<?php echo urlencode(the_title("", "", 0)); ?>"><i class="fab fa-facebook-square"></i><span>Facebook</span></a></li>
        <li><a class="tweet" href="//twitter.com/intent/tweet?text=<?php echo urlencode(the_title("", "", 0)); ?>&<?php echo urlencode(get_permalink()); ?>&url=<?php echo urlencode(get_permalink()); ?>"><i class="fab fa-twitter"></i><span>Twitter</span> </a></li>

        <li><a class="line" href="//timeline.line.me/social-plugin/share?url=<?php echo urlencode(get_permalink()); ?>"><i class="fab fa-line"></i><span>LINE</span> </a></li>

        <li><a class="pocket" href="//getpocket.com/edit?url=<?php echo urlencode(get_permalink()); ?>"><i class="fab fa-get-pocket"></i><span>Pocket</span></a></li>

        <li><a class="hatena" href="//b.hatena.ne.jp/add?mode=confirm&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(the_title("", "", 0)); ?>"><span>はてブ</span></a></li>

      </ul>
    </div>
  <a href="<?php if($page == 0){echo get_page_link(28);}else{echo get_page_link(28).'page/'.$page_num.'/';} ?>" class="news-list single-news-list">NEWS LIST ></a>
</section>
 <?php get_footer(); ?>
</main>

