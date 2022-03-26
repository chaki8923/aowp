<?php

$Main_img = [];
$Slide_text = [];
for ($i = 1; $i <= 20; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);
  $Slide_text[$i] =  get_option('slide_text' . $i);
}
$logo = $Main_img[20];
$About_title = get_option('about_title');
$Work_title = get_option('work_title');
$Info_title = get_option('info_title');
$About_text = get_option('about_text');
$Work_text = get_option('work_text');
$About_text2 = get_option('about_text2');
$Voice_title = get_option('voice_title');
$Blog_title = get_option('blog_title');
$Address_title = get_option('address_title');
$Address_map = get_option('address_map');
$Address_name = get_option('address_name');
$Address_time = get_option('address_time');
$Abater_name = get_option('abater_name');
$Abater_comment = get_option('abater_comment');
for ($i = 0; $i <= 6; $i++) {

  $Fes_info[$i] = get_option('fes_info' . $i);
}

?>