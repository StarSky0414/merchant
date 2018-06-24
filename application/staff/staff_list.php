<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/22
 * Time: 12:48
 */

$staff_class = new staff_class();
$mer_id = $staff_class->find_mer_id(UserInfo::getUserId());
if ($staff_list['mer_list'] = $staff_class->staff_list($mer_id)) {
    $json_encode = json_encode($staff_list, JSON_UNESCAPED_UNICODE);
    $str_replace = str_replace('null', '""', $json_encode);
    print_r($str_replace);
    return;
}
echo 0;
return;