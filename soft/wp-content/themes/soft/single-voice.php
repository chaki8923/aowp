<?php get_header();
$page_num = get_option('current_page');
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
        <a href="<?php if($page == 0){echo get_page_link(24);}else{echo get_page_link(24).'page/'.$page_num.'/';} ?>" class="news-list back">一覧に戻る</a>
</main>
</div>

<?php get_footer(); ?>