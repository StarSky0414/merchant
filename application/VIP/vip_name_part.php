<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-8
 * Time: 下午10:47
 */

$name_part = $_POST['name_part'];
$last_id = $_POST['last_id'];
$VIP_class = new VIP_class();
$merId =UserInfo::getMerId();
//print_r($merId);
$vip_name_part['vip_user_list'] = $VIP_class->vip_name_part($merId,$name_part,$last_id);
if (empty($vip_name_part['vip_user_list'])){
    echo '{"vip_user_list":[]}';
    return;
}
$json_encode = json_encode($vip_name_part, JSON_UNESCAPED_UNICODE);
echo $json_encode;