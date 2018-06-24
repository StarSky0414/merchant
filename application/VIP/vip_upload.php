<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/26
 * Time: 15:38
 */


$VIP_name=$_POST['VIP_name'];
$min_num=$_POST['min_num'];
$discount=$_POST['discount'];
//$item_list=$_POST['item_list'];

$mer_id = UserInfo::getUserId();
$VIP_class = new VIP_class();
if ($VIP_class->vip_upload($mer_id, $VIP_name, $min_num, $discount)) {
    echo 1;
    return;
}
echo 0;
return;