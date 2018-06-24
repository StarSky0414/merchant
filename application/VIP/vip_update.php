<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/26
 * Time: 22:06
 */


$vip_id=$_POST['vip_id'];
$VIP_name=$_POST['VIP_name'];
$min_num=$_POST['min_num'];
$discount=$_POST['discount'];
//$item_list=$_POST['item_list'];
$VIP_class = new VIP_class();
if ($VIP_class->vip_update($vip_id,$VIP_name,$min_num,$discount)) {
    echo 1;
    return ;
}
echo 0;
return;