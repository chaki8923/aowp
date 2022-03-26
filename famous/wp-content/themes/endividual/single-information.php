<?php

require('head.php');
if (!is_user_logged_in() && !is_bot()) {
  setPostViews(get_the_ID());
}

require('getplugin.php');
get_header();
?>


  <main>
    <?php require('loading.php'); ?>
    <div class="back-view" style="background-image: url('<?php echo get_post_meta($post->ID, 'back-img', true); ?>');"></div>
    <div class="p-title">
      <h1><?php the_title(); ?></h1>
    </div>
    <div class="single-container">
      <div class="single-panel">
        <div class="single-panel_img">
          <?php $terms = wp_get_object_terms($post->ID, 'info-cat');
          $term = $terms[0]->name;
          $jp_week = array('日', '月', '火', '水', '木', '金', '土');
          ?>
          <span class="single-cat"><?php echo $term; ?></span>
          <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
        </div>
        <div class="single-title">
          <div class="single-date">
            <strong><?php echo get_post_time('d'); ?></strong>
            <p><?php echo substr(get_post_time('F'), 0, 3); ?></p>
            <p><?php echo get_post_time('Y'); ?></p>
          </div>
          <h2><?php the_title(); ?></h2>
        </div>
        <div class="single-content">
          <p><?php the_content(); ?></p>
        </div>

        <div class="abater-area">
          <div class="abater-img">
            <img src="<?php echo $Main_img[9]; ?>" alt="投稿者">
          </div>
          <div class="abater-text_area">
            <div class="abater-text_top">
              <h4 class="abater-name"><?php echo $Abater_name ?></h4>
              <a href="<?php echo get_page_link(39); ?>" class="next-single">作品一覧へ</a>
            </div>
            <p class="abater-text"><?php echo $Abater_comment; ?></p>
            <ul class="abater-sns">
              <?php for ($i = 11; $i <= 19; $i++) : ?>
                <li style="<?php if (!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i] ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン" style="<?php if (!$Main_img[$i]) echo 'display:none;'; ?>"></a></li>
              <?php endfor; ?>
            </ul>
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

        <div class="relation-post">
          <h4 class="relation-title">関連記事一覧</h4>
          <div class="relation-list">
            <?php

            $args = array(
              'numberposts' => 8, //８件表示(デフォルトは５件)
              'post_type' => 'information', //カスタム投稿タイプ名
              'orderby' => 'rand', //ランダム表示
              'post__not_in' => array($post->ID) //表示中の記事を除外
            );
            ?>
            <?php $myPosts = get_posts($args);
            if ($myPosts) : ?>
              <?php foreach ($myPosts as $post) : setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>" class="relation-panel">
                  <div class="relation-panel_img">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="関連画像" class="js-relation_img">
                  </div>
                  <div class="relation-panel_text">
                    <?php the_title(); ?>
                  </div>
                </a>
              <?php endforeach; ?>
            <?php else : ?>
              <p>関連アイテムはまだありません。</p>
            <?php endif;
            wp_reset_postdata(); ?>

          </div>
        </div>
      </div>
      <?php
      //ページネーション
      if (function_exists('pagination')) {
        pagination();
      }
      ?>

    </div>
    <?php require('info_sidebar.php') ?>

    </div>
    </div>
  </main>
  <?php get_footer(); ?>