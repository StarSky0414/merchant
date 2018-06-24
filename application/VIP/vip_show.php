<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/26
 * Time: 21:43
 */

$userId = UserInfo::getUserId();
$VIP_class = new VIP_class();
$vip_show['vip_list'] = $VIP_class->vip_show($userId);
if ($vip_show) {
    print_r(json_encode($vip_show,JSON_UNESCAPED_UNICODE));
    return;
}
echo 0;
return;