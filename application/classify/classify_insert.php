<?php
/**
 * https://thethreestooges.cn/merchant/bean/classify/classify_insert.php
 */
/*require dirname(__FILE__).'/../../mysql/mysql_classify.php';
require dirname(__FILE__).'/../tool/tool.php';
include dirname(__FILE__).'/../../config/config.php';
require_once  dirname(__FILE__).'/classify.php';*/
ob_start();
if(!isset($_POST['name'])){//||!isset($_POST['discount_sign'])||!isset($_POST['defin_discount'])){
    echo '2';
    return ;
}
//$mysql_class=new classify_class();
//$name=array('a','b','c');
$name=$_POST['name'];
//$string = 'd#dd#ddd#ff';
$min_vip_num =$_POST['discount_sign'];
    $discount=$_POST['defin_discount'];
$name_arr= explode('#', $name);
//$min_vip_arr= explode('#', $min_vip_num);
//$discount_arr= explode('#', $discount);
print_r($min_vip_arr);
$classify = new classify_class();
$max_classify_id = $classify->max_classify_id();
$class_id=$max_classify_id;
echo ($class_id) ;

if ($classify->classify_insert(UserInfo::getUserId(),$name_arr,$class_id ,$min_vip_arr,$discount_arr)) {
    ob_end_clean();
    echo '1';
    return ;
}
ob_end_clean();
echo '0';
return;