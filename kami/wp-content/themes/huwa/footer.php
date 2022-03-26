<?php

$Add_tell = get_option('add_tell');

for($i = 1;$i <= 19;$i ++){

  $Main_img[$i] =  get_option('main_view'.$i);
  $Sns_link[$i] = get_option('sns_link' . $i);
 
}
$Footer_text = get_option('footer_text');
$Job_site = get_option('job_site');

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
    <li class="sp-footer--item sp-footer--item__blog "><a href="<?php echo get_permalink(140); ?>">BLOG</a> </li>
    <li class="sp-footer--item sp-footer--item__top js-footer-top"><i class="fas fa-angle-double-up fa-2x"></i></li>
  </ul>
</div>
<footer class="footer">
    <p class="footer-copy__text"><?php echo $Footer_text; ?>.</p>
</footer>

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