<?php
/**
 * https://thethreestooges.cn/merchant/bean/classify/classify_update.php
 */
//require dirname(__FILE__).'/../../mysql/mysql_classify.php';
//require dirname(__FILE__).'/../tool/tool.php';
//include dirname(__FILE__).'/../../config/config.php';
$mysql_class=new classify_class();
if(!isset($_POST['name'])||!isset($_POST['class_id'])){//||!isset($_POST['discount_sign'])||!isset($_POST['defin_discount'])){
    echo '2';
    return ;
}
$name=$_POST['name'];
$class_id=$_POST['class_id'];
if($mysql_class->classify_update($class_id,$name) ){
    echo '1';
    return ;
}
echo '0';
return ;