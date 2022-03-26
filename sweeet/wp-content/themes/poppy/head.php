<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <!-- IE8+に対して「IE=edge」と指定することで、利用できる最も互換性の高い最新のエンジンを使用するよう指示できる -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- content属性にページの紹介文を記述-->
  <meta name="description" content="">
  <!-- iOSなどスマホで電話番号を自動で電話リンクへ書き換えるのを防ぐ -->
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&family=Style+Script&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">


  <title><?php wp_title('|', true, 'right');
          bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>