<?php
require('head.php');
?>
<?php

get_header();
$About_img = [];
    for($i=1;$i <= 7 ; $i ++){

      $About_img[$i] = get_option('about-img'.$i);
     
    }

    $About_title = get_option('about_title');
    $About_text = get_option('about_text');
    $Add_text = get_option('add_text');
    $Add_map = get_option('add_map');
    $Add_name = get_option('add_name');
    $Add_station = get_option('add_station');
    $Add_place = get_option('add_place');
    $Add_time = get_option('add_time');
    $Add_tell = get_option('add_tell');

?>
<body>
  
  <div class="container container-about">
    <div class="container-about__after after" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
    <div class="p-title">
    <div class="items">
        <h1><a href="" class="link link1"><?php echo the_title(); ?></a></h1>
      </div>
    </div>
    <div class="about">
      <div class="about-inner">
        <div class="about-img">
          <img src="<?php echo $About_img[1] ?>" alt="ABOUT画像" class="about-img__inner">
          <?php for($i =2;$i <= 7;$i ++): ?>
          <img src="<?php echo $About_img[$i]; ?>" alt=" ABOUT画像" class="about-img__inner--wrap" style="<?php  if(!$About_img[$i]) echo 'display:none' ?>">
          <?php endfor; ?>
        </div>
        <div class="about-text">
          <h2 class="about-text__inner">
            <?php echo $About_title; ?>
          </h2>
          <p class="about__text__inner--small"><?php echo $About_text; ?></p>
        </div>
      </div>
      <div class="access">
        <h2 class="access-title">
          Accsee
        </h2>
        <div class="access-detail">
          <p class="access-detail__text">
          <?php echo $Add_text; ?>
          </p>
        </div>
        <div class="map-wraper"></div>
        <div class="access__map">
        <?php echo $Add_map; ?>
        </div>
        <dl class="access__table">
          <dt>
            <span>名称</span>
          </dt>
          <dd><?php echo $Add_name; ?></dd>
          <dt>
            <span>所在地</span>
          </dt>
          <dd><?php echo $Add_place; ?></dd>
          <dt>
            <span>最寄り駅</span>
          </dt>
          <dd><?php echo $Add_station; ?></dd>
          <dt>
            <span>営業時間</span>
          </dt>
          <dd><?php echo $Add_time; ?></dd>
          <dt>
            <span>TEL</span>
          </dt>
          <dd><?php echo $Add_tell; ?></dd>
        </dl>
      </div>
    </div>
   
  </div>
  <?php get_footer(); ?>