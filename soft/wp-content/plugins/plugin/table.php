<?php

$map = $_POST['map'];



$okno1 = $_POST['okno1'];



update_option('time1', $time1);
update_option('time2', $time2);
update_option('okno1', $okno1);
update_option('map', $map);

//==============================================
//MAP入力保持
$Schedule = get_option('schedule');
$Okno1 = get_option('okno1');




$Map = get_option('map');
