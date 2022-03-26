<?php

$Main_img = [];
$Slide_text = [];
$Sns_link = [];
for ($i = 1; $i <= 20; $i++) {

  $Main_img[$i] =  get_option('main_view' . $i);
  $Slide_text[$i] = get_option('slide_text' . $i);
  $Sns_link[$i] = get_option('sns_link' . $i);
}
$Loading = get_option('loading');

$Tell_number = get_option('tell_number');

$Shop_name = get_option('shop_name');
$Company_name = get_option('company_name');
$Address_map = get_option('address_map');
$Address_name = get_option('address_name');

?>