<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />

  <!-- IE8+に対して「IE=edge」と指定することで、利用できる最も互換性の高い最新のエンジンを使用するよう指示できる -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- content属性にページの紹介文を記述-->
  <meta name="description" content="">

  <!-- content属性にページの著者情報を記述 -->
  <meta name="author" content="">

  <!-- iOSなどスマホで電話番号を自動で電話リンクへ書き換えるのを防ぐ -->
  <meta name="format-detection" content="telephone=no">

  <!-- スマホ表示 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- スタイルシート読み込み -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- サイトタイトル -->
  <title><?php wp_title('|', true, 'right');
          bloginfo('name'); ?></title>


  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>