<?php
require('head.php');
require('getplugin.php');
get_header();
?>

<body>

  <div class="container container-single">
    <div class="container-single__after after" style="background-image: url('<?php echo get_post_meta($post->ID, 'actor-img', true) ?>');"></div>
    <div class="p-title">
      <div class="items">
        <h1><span class="link link1"><?php echo the_title(); ?></span></h1>
      </div>
    </div>
    <div class="p-article">
      <h2 class="c-article_title"><?php echo the_title(); ?></h2>
      <div class="p-thumbnail p-article_thumbnail">
        <img src="<?php the_post_thumbnail_url() ?>" alt="サムネイル" class="c-img">
      </div>
      <!-- ポジションで左寄せ -->
      <div class="p-article_mounth">
        <span class="c-mounth"><?php echo get_post_time('Y'); ?></span>
        <?php $cat = get_the_category();
        $cat = $cat[0];
        $jp_week = array('日', '月', '火', '水', '木', '金', '土');
        ?>
        <span class="c-cat"><?php echo $cat->cat_name; ?></span>
      </div>
      <div class="p-article_date p-article_left">
        <div class="p-article_date-inner ">
          <span class="c-date"><?php echo get_post_time('d日'); ?></span>
          <span class="c-week"><?php echo $jp_week[get_post_time('w')] . '曜日';  ?></span>
          <span class="c-year"><?php echo get_post_time('Y'); ?></span>
        </div>
      </div>
      <!-- 記事下部 -->
      <div class="p-article_bottom">
        <?php echo the_content(); ?>
        <div class="p-prev-next  c-article-prevNext">
          <?php previous_post_link('%link', '前の記事'); ?>
          <?php next_post_link('%link', '次の記事'); ?>
        </div>
      </div>

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
  </div>
  <?php get_footer(); ?>