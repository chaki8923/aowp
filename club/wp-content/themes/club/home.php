<?php
require('head.php');
require('getplugin.php');

get_header();
?>

<body>

  
  <div class="main-slider">
    <?php
    $args = array(
      'post_type' => 'topimage', /* 投稿タイプを指定 */
      'paged' => $paged,
      'posts_per_page' => 5 // 5件の記事を取得
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

?>

<div class="sns-area">
  <ul>
  <?php for ($i = 11; $i <= 19; $i++) : ?>
    <li style="<?php if(!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i] ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン" style="<?php if (!$Main_img[$i]) echo 'display:none;'; ?>"></a></li>
   <?php endfor; ?>
  </ul>
</div>
<div class="sp-footer">
  <ul class="sp-footer--list">
    <li class="sp-footer--item sp-footer--item__tell"><a href="tel:<?php echo $Add_tell; ?>" class="sp-footer--item__tell-link"><i class="fas fa-phone-square fa-2x"></i></a></li>
    <li class="sp-footer--item sp-footer--item__sns js-sns-btn">
      <p class="sp-footer--item__snsOpen  js-sns-open">SNS</p>
      <p class="sp-footer--item__snsClose  js-sns-close">close</p>
    </li>
    <li class="sp-footer--item sp-footer--item__blog "><a href="<?php echo get_permalink(20); ?>">BLOG</a> </li>
    <li class="sp-footer--item sp-footer--item__top js-footer-top"><i class="fas fa-angle-double-up fa-2x"></i></li>
  </ul>
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