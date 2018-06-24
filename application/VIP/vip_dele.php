<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/26
 * Time: 21:35
 */

$vip_id = $_POST['vip_id'];
$VIP_class = new VIP_class();
if ($VIP_class->dele_sign($vip_id)) {
    echo 1;
    return;
}
echo 0;
return;