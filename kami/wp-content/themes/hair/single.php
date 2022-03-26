<?php

require('head.php');
?>
<?php if (!is_user_logged_in() && !is_bot()) {
  setPostViews(get_the_ID());
}

require('getplugin.php');
get_header();
$page_num = get_option('current_page');
?>



<main class="main single-container">
<?php require('loading.php'); ?>
  <div class="">
    <div class="single--inner">
      <span class="single--date"><?php echo get_post_time('Y.m.d'); ?></span>
      <h2 class="single--title"><?php the_title(); ?></h2>
      <div class="single--thumbnail">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
      </div>
      <div class="single--text">
        <p><?php the_content(); ?></p>
        <a href="<?php if($page == 0){echo get_page_link(140);}else{echo get_page_link(140).'page/'.$page_num.'/';} ?>" class="news-list back-list">一覧に戻る</a>
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
  </div>

  <!-- 関連記事 -->
<?php if(has_category() ) {
    $catlist =get_the_category();
    $category = array();
    foreach($catlist as $cat){
        $category[] = $cat->term_id;
    }}
?>
<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => '5', //表示させたい記事数
    'post__not_in' =>array( $post->ID ), //現在の記事は含めない
    'category__in' => $category, //先ほど取得したカテゴリー内の記事
    'orderby' => 'rand' //ランダムで取得
);
$related_query = new WP_Query( $args );?>

  <div class="category-inner">
    <h2 class="category-title">関連記事</h2>
    <?php if( $related_query->have_posts()): ?>
    <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
    <a href="<?php the_permalink(); ?>" class="category-panel">
      <div class="category-panel--left">
        <span class="category-panel--date"><?php echo get_post_time('Y.m.d'); ?></span>
        <h2 class="category-panel--title"><?php the_title(); ?></h2>
        <div class="category-panel--text">
          <p><?php echo wp_trim_words(get_the_content(), 80, '...'); ?></p>
        </div>
      </div>
      <div class="category-panel--right">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="サムネイル">
      </div>
    </a>
    <?php endwhile; ?>
    <?php else: ?>
      <p>関連記事はありません。</p>
      <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    


  </div>

</main>
<?php require('sidebar.php'); ?>
<div class="map-wraper"></div>
  <section class="map">
    <?php echo $Add_map; ?>
    <table>
      <tbody>
        <tr>
          <th>Address</th>
          <td>
            <div class="map-detail">
              <p>
                <?php echo $Add_text; ?>

              </p>
            </div>
          </td>
        </tr>
        <tr>
          <th>TELL</th>
          <td>
            <div class="map-detail">
              <p><?php echo $Add_tell; ?></p>
            </div>
          </td>
        </tr>
        <tr>
          <th>Hour</th>
          <td>
            <div class="map-detail">
              <dl>
                <dt><?php echo $cut_name ?></dt>
                <dd><?php echo $Add_place ?></dd>
                <dt><?php echo $perma ?></dt>
                <dd><?php echo $Add_time ?></dd>
              </dl>
            </div>
          </td>
        </tr>
        <tr>
          <th>RECRUIT</th>
          <td>
            <div class="map-detail">
              <a href="<?php echo get_permalink(48); ?>">採用情報はコチラ</a>
            </div>
          </td>
        </tr>

      </tbody>
    </table>

  </section>
<?php get_footer(); ?>