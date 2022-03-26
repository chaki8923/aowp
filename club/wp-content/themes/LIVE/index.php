<?php
require('head.php');
?>
<?php

$Movie = get_option('main-movie');
$Top_flg = get_option('top_flg');
$Top_img = [];
for ($i = 1; $i <= 5; $i++) {
  $Top_img[$i] = get_option('top_img' . $i);
  $Icon_img[$i] = get_option('icon-img' . $i);
  $Work_text[$i] = get_option('work-text' . $i);
}
$Movie_text = get_option('movie_text'); //動画用テキスト
$Slide_title = get_option('slide_title'); //スライドショー用テキスト
$Work_title = get_option('work_title'); //業務内容タイトル
$Work_link = get_option('work_link'); //業務内容リンク
$Work_bc = get_option('work_bc'); //業務内容背景
$Another_title = get_option('another_title'); //人材開発タイトル
$Another_link = get_option('another_link'); //人材開発リンク

$Logo = get_option('logo'); //人材開発リンク

$Another_bc = [];
for ($i = 4; $i <= 5; $i++) {
  
  $Another_bc[$i] = get_option('another-bc'.$i); //人材開発背景
  $Another_text[$i] = get_option('another-text' . $i);
}
get_header();
?>
<body>
 
    <div class="main-slider"> <?php

$args = array(
  'post_type' => 'topimage', /* 投稿タイプを指定 */
  'paged' => $paged,
  'posts_per_page' => 4 // 4件の記事を取得
); ?>
<?php $wp_query = new WP_Query($args); ?>
<?php if ($wp_query->have_posts()) : ?>
  <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <div class="slide" style="background-image: url('<?php echo get_post_meta($post->ID, 'actor-img', true); ?>');">
        <div class="slide-inner">
          <p><?php echo get_post_meta($post->ID, 'comment-title', true); ?></p>
          <h2><?php echo the_title(); ?></h2>
          <a href="<?php echo the_permalink(); ?>">DETAIL</a>
        </div>
      </div>
      <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <li>ニュースはありません</li>
      <?php endif; ?>
    </div>
  </div>
  
  <?php
  wp_deregister_script('jquery');
  $uri = get_template_directory_uri();


  //独自のスクリプトを読み込む
  add_action('wp_enqueue_scripts', 'enqueue_scripts');
  ?>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/slick.css">
  <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>

</html>