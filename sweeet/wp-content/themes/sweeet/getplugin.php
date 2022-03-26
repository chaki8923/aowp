<?php

$Main_img = [];
$Slide_text = [];
$Sns_link = [];
$Title = [];
$Movie = [];
$Top_flg = [];
$Month = [];
$Day = [];
$Plase = [];
$Store_name = get_option('store_name');
for ($i = 0; $i <= 6; $i++) {

  $Month[$i] = get_option('month' . $i);
  $Day[$i] = get_option('day' . $i);
  $Plase[$i] = get_option('plase' . $i);
}
for ($i = 1; $i <= 19; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);
  $Slide_text[$i] = get_option('slide_text' . $i);
  $Title[$i] = get_option('title' . $i);
  $Movie[$i] = get_option('movie' . $i);
  $Sns_link[$i] = get_option('sns_link' . $i);
  $Top_flg[$i] = get_option('top_flg' . $i); //動画写真切り替え
}

for ($i = 0; $i <= 6; $i++) {

  $Fes_info[$i] = get_option('fes_info' . $i);
}
$week = [
  '日', //0
  '月', //1
  '火', //2
  '水', //3
  '木', //4
  '金', //5
  '土', //6
];


?>