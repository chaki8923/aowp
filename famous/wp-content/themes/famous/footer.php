<?php

$Add_tell = get_option('add_tell');
$Footer_text = get_option('footer_text');
$Copy_text = get_option('copy_text');
$Tell_number = get_option('tell_number');


$Main_img = [];
$Sns_link = [];
$Address_name = get_option('address_name');

for ($i = 1; $i <= 20; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);
  $Sns_link[$i] =  get_option('sns_link' . $i);
}
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
    <li class="sp-footer--item sp-footer--item__tell"><a href="tel:<?php echo $Tell_number; ?>" class="sp-footer--item__tell-link"><i class="fas fa-phone-square fa-2x"></i></a></li>
    <li class="sp-footer--item sp-footer--item__sns js-sns-btn">
      <p class="sp-footer--item__snsOpen  js-sns-open">SNS</p>
      <p class="sp-footer--item__snsClose  js-sns-close">close</p>
    </li>
    <li class="sp-footer--item sp-footer--item__blog "><a href="<?php echo get_permalink(77); ?>">BLOG</a> </li>
    <li class="sp-footer--item sp-footer--item__top js-footer-top"><i class="fas fa-angle-double-up fa-2x"></i></li>
  </ul>
</div>
<?php
wp_deregister_script('jquery');
$uri = get_template_directory_uri();





//独自のスクリプトを読み込む
add_action('wp_enqueue_scripts', 'enqueue_scripts');
?>
<section class="footer">
  <div class="footer-top" >
  <img src="<?php echo $Main_img[10]; ?>" alt="" class="footer-parallax js-footer-parallax">
    <div class="footer-top--inner">
      <h2 class="footer-top--title"><?php echo $Footer_text; ?></h2>
      <ul class="footer-top--list">
        <?php for ($i = 11; $i <= 19; $i++) : ?>
          <li style="<?php if (!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i] ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン" style="<?php if (!$Main_img[$i]) echo 'display:none;'; ?>"></a></li>
        <?php endfor; ?>

      </ul>
      <p class="footer-top--text"><?php echo $Address_name ?></p>
    </div>
  </div>
  <div class="footer-middle">

    <?php
    wp_nav_menu(array(
      'theme_location' => 'footermenu',
      'container' => '',
      'menuclass' => 'footer-menu',
      'items_wrap' => '<ul >%3$s</ul>',
    ));
    ?>

  </div>
  <div class="footer-bottom">
    <p class="footer-bottom--text"><?php echo $Copy_text; ?></p>
    <div class="top-return">
      <img src="<?php echo getURL('img/arrow-top.png') ?>" alt="TOPへ">
    </div>
  </div>
</section>




<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/simpleParallax.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

  <?php

  global $template; // テンプレートファイルのパスを取得
  $temp_name = basename($template); // パスの最後の名前（ファイル名）を取得
  if($temp_name == 'home.php'){

    ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/slide.js"></script>
<?php
}

?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/slick.css">
</body>

</html>