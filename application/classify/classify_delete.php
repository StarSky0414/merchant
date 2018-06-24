<?php
/**
 * https://thethreestooges.cn/merchant/bean/classify/classify_delete.php
 */
//require dirname(__FILE__).'/../../mysql/mysql_classify.php';
//require dirname(__FILE__).'/../tool/tool.php';
//include dirname(__FILE__).'/../../config/config.php';

if(!isset($_POST['class_id'])){
    echo '1';
    return ;
}
$mysql_class=new classify_class();
//$name=array('a','b','c');
$string=$_POST['class_id'];
//$string = '1#11#2#13';
$class_id= explode('#', $string);
//print_r($class_id);
if($mysql_class->classify_delete($class_id)){
    echo '0';
    return ;
}
echo '2';
return;