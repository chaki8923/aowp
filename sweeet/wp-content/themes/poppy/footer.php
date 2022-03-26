<?php

$Add_tell = get_option('add_tell');
$Footer_text = get_option('footer_text');
$Copy_text = get_option('copy_text');
$Tell_number = get_option('tell_number');
$Main_img = [];
$Address_name = get_option('address_name');
$Sns_link = [];
for($i = 1;$i <= 19;$i ++){
  
  $Sns_link[$i] = get_option('sns_link' . $i);
      $Main_img[$i] =  get_option('main_view'.$i);

     
    }
?>

<div class="sns-area">
  <ul>
  <?php for($i = 11;$i <= 19;$i ++): ?>
    <li style="<?php if(!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i]; ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン"></a></li>
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
    <li class="sp-footer--item sp-footer--item__blog "><a href="<?php echo get_permalink(28); ?>">BLOG</a> </li>
    <li class="sp-footer--item sp-footer--item__top js-footer-top"><i class="fas fa-angle-double-up fa-2x"></i></li>
  </ul>
</div>
<?php
wp_deregister_script('jquery');
$uri = get_template_directory_uri();





//独自のスクリプトを読み込む
add_action('wp_enqueue_scripts', 'enqueue_scripts');
?>
 <footer class="footer">
   <ul>
     <?php for($i = 11;$i <= 19;$i ++): ?>
    <li style="<?php if(!$Sns_link[$i]) echo "display:none"; ?>"><a href="<?php echo $Sns_link[$i]; ?>"><img src="<?php echo $Main_img[$i]; ?>" alt="SNSアイコン"></a></li>
    <?php endfor; ?>
   </ul>
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footermenu',
      'container' => false,
      'menuclass' => 'footer-menu',
      'items_wrap' => '<ul >%3$s</ul>',
    ));
    ?>
  </footer>




<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/simpleParallax.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();  ?>/slick.css">
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>

</html>