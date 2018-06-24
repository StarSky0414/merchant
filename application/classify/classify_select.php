<?php
/**
 * https://thethreestooges.cn/merchant/bean/classify/classify_select.php
 */
//require dirname(__FILE__).'/../../mysql/mysql_classify.php';
//require dirname(__FILE__).'/../tool/tool.php';
//include dirname(__FILE__).'/../../config/config.php';

$mysql_class=new classify_class();
$temp['classify']=$mysql_class->classify_select(UserInfo::getUserId());
if(!isset($temp)){
    echo '2';
    return ;
}
//print_r($temp['classify']);
print_r(json_encode($temp, JSON_UNESCAPED_UNICODE));

//echo '0';