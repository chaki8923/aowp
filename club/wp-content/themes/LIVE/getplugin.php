<?php

$Movie = get_option('main-movie');
$Top_flg = get_option('top_flg');
$Top_img = [];
for ($i = 1; $i <= 5; $i++) {
  $Top_img[$i] = get_option('top_img' . $i);
  $Icon_img[$i] = get_option('icon-img' . $i);
  $Work_text[$i] = get_option('work-text' . $i);
}

$Main_img = [];
$Sns_link = [];

for ($i = 1; $i <= 21; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);
  $Sns_link[$i] =  get_option('sns_link' . $i);
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

  $Another_bc[$i] = get_option('another-bc' . $i); //人材開発背景
  $Another_text[$i] = get_option('another-text' . $i);
}

?>