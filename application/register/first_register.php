<?php

//ini_set("display_errors", "On");
//error_reporting(E_ALL | E_STRICT);
//require_once dirname(__FILE__) . '/mysql_register.php';
if (!isset($_POST['name']) || !isset($_POST['classify']) || !isset($_POST['address']) || !isset($_POST['phone']) || !isset($_POST['address'])) {
    echo '4';
    return;
}
if (!isset($_POST['longitude']) || !isset($_POST['latitude']) || !isset($_POST['photo'])||!isset($_POST['city'])) {
    echo '4';
    return;
}
if (!isset($_POST['circle'])){
    $circle = '';
}else{
    $circle =$_POST['circle'];
}
ob_start();
$user_id = UserInfo::getUserId();
//$user_id=1;
$name = $_POST['name'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];
$classify = $_POST['classify'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];
$city = $_POST['city'];
$mysql = new register_class();
if ($mysql->first_register($user_id, $name, $classify, $phone, $address, $longitude, $latitude, $photo,$circle,$city)) {
    ob_end_clean();
    echo '1';
    return;
}
ob_end_clean();
echo '0';
return;