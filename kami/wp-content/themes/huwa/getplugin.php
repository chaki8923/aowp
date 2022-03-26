<?php

$Slide_img = [];
for ($i = 1; $i <= 12; $i++) {

  $Slide_img[$i] = get_option('about-img' . $i);
}

$Menu_name = [];
for ($i = 1; $i <= 9; $i++) {

  $Menu_name[$i] = get_option('menu' . $i);
}


$About_title = get_option('about_title');
$About_text = get_option('about_text');
$Add_text = get_option('add_text');
$Add_map = get_option('add_map');
$cut_name = get_option('add_name');
$Add_place = get_option('add_place');
$perma = get_option('add_station');
$Add_time = get_option('add_time');
$Add_tell = get_option('add_tell');
$image = get_option('main_bc');
$Url_link = get_option('url_link');
$Job_site = get_option('job_site');


?>