<?php

$main_bc = get_option('main_bc');
$bc_color = get_option('bc_color');
$about_title = get_option('about_title');
$main_text = get_option('main_text');
$Font_color = get_option('font_color');

$about_subtitle = get_option('about_subtitle');
$about_img1 = get_option('about_img1');
$about_img2 = get_option('about_img2');

$abouText_t = get_option('about_textTop');
$abouText_m = get_option('about_textMiddle');
$abouText_b = get_option('about_textBottom');

$feature_title = get_option('feature_title');
$feature_subtitle = get_option('feature_subtitle');

$option_title = get_option('option_title');
$option_subtitle = get_option('option_subtitle');

$product_title = get_option('product_title');
$product_subtitle = get_option('product_subtitle');

$news_title = get_option('news_title');
$news_subtitle = get_option('news_subtitle');

$voiceTitle = get_option('voice_title');
$voiceSubTitle = get_option('voice_subtitle');

for ($i = 1; $i <= 14; $i++) {

  $Okno[$i] = get_option('okno' . $i);
}
$Schedule = get_option('schedule');
$Time1 = get_option('time1');
$Time2 = get_option('time2');
$Post = get_option('post');
$Add = get_option('add');
$Tell = get_option('tell');
$Map = get_option('my-map');
