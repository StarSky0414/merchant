<?php

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
//require dirname(__FILE__).'/../../mysql/mysql_register.php';
if (!isset($_POST['introduce'])||!isset($_POST['business_hours'])||!isset($_POST['status'])||!isset($_POST['reserve'])||!isset($_POST['avecon'])||!isset($_POST['photo_surface'])){
    echo '4';
    return ;
}
/*if (!isset($_POST['longitude'])||!isset($_POST['latitude'])||!isset($_POST['circle'])||!isset($_POST['city'])||!isset($_POST['photo'])){
    echo '4';
    return ;
}*/
$introduce=$_POST['introduce'];
$business_hours=$_POST['business_hours'];
$status=$_POST['status'];
$reserve=$_POST['reserve'];
$avecon=$_POST['avecon'];
$photo_surface=$_POST['photo_surface'];
/*$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$circle = $_POST['circle'];
$city = $_POST['city'];
$photo = $_POST['photo'];*/
$user_id = UserInfo::getUserId();
$mysql =new register_class();
if ($mysql->supply_register( $introduce, $business_hours, $status, $reserve, $avecon, $photo_surface)) {
    echo '1';
    return;
}
echo '0';


