<?php
require('head.php');
get_header();
require('getplugin.php');
$page = get_option('current_page');

if (!is_user_logged_in() && !is_bot()) {
  setPostViews(get_the_ID());
}
?>
<main class="main blog">
  <div class="post-bread">
    <ul class="post-bread-item">
    <?php mytheme_breadcrumb(); ?>
    </ul>
  </div>
  <div class="post-container">
    <div class="thumbnail">
      <img src="<?php the_post_thumbnail_url();  ?>" alt="サムネイル">
    </div>
    <h1><?php the_title(); ?></h1>
    <div class="blog-inner">
      <p><?php the_content(); ?></p>
    </div>
    <a href="<?php if($page == 0){echo get_page_link(16);}else{echo get_page_link(16).'page/'.$page.'/';} ?>" class="back-link">一覧に戻る</a>
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
  </div>
  <div class="map-wraper"></div>
  <section class="address">
    <?php echo $Address_map; ?>
    <div class="address-inner">
      <div class="address-inner_text">
        <h2><?php echo $Shop_name; ?></h2>
        <p><?php echo $Company_name; ?></p>
        <p><?php echo $Address_name; ?></p>
        <p>TEL：<?php echo $Tell_number; ?></p>
        <ul>
          <?php for ($i = 11; $i <= 19; $i++) : ?>
            <li style="<?php if (!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i]; ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン"></a></li>
          <?php endfor; ?>
        </ul>
      </div>
    </div>
  </section>
</main>


<?php get_footer(); ?>