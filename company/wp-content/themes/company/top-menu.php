<?php $Logo = get_option('logo'); //人材開発リンク ?>
<header class="header">
<a href="<?php echo home_url(); ?>" class="main_logo" style="<?php if(!$Logo) echo "display:none;" ?>">
      <img src="<?php echo $Logo; ?>" alt="会社ロゴ">
    </a>
<?php
    wp_nav_menu(array(
    'theme_location'=>'topmenu',
    'conteainer' =>false,
    'menu_class' =>'header-menu',
    'items_wrap' => '<ul class="pc-header" >%3$s</ul>',

)); ?>
  </header>
  <!--------------- TOPに戻る ----------------->
<div class="js-top return-top">TOP</div>
<!--------------- SPヘッダー ----------------->
<header class="header-sp">
<?php
    wp_nav_menu(array(
    'theme_location'=>'topmenu',
    'conteainer' =>false,
    'menu_class' =>'header-menu',
    'items_wrap' => '<ul class="sp-header" >%3$s</ul>',

)); ?>
</header>