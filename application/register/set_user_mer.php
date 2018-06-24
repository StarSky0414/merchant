<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/29
 * Time: 22:27
 */

$mer_id = $_POST['mer_id'];
$register_class = new register_class();
if ($register_class->set_user_mer_id($mer_id,UserInfo::getUserId())) {
    echo 1;
    return ;
}
echo 0;
return;