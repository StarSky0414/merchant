<?php

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once dirname(__FILE__).'/classify.php';
ob_start();
if (!isset($_POST['class_id'])){
    echo 0;
    return ;
}
$class_id = $_POST['class_id'];
$classify = new classify_class();
$show_item = $classify->show_item($class_id);
$jaon_show_item['item_list']=$show_item;
$json_encode = json_encode($jaon_show_item, JSON_UNESCAPED_UNICODE);
ob_end_clean();
//echo "{'a':'让你不和我视频，哈哈哈'}";
echo $json_encode;


