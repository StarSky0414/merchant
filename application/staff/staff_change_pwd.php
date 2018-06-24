<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/4/3
 * Time: 19:29
 */


$password = $_POST['password'];
$userId = UserInfo::getUserId();

$staff_class = new staff_class();
if ($staff_class->staff_change_pwd($password,$userId)) {
    echo 1;
    return ;

}
echo 0;
return;