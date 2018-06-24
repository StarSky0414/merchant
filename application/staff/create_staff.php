<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/17
 * Time: 14:49
 */


$name = $_POST['name'];
$staff_class = new staff_class();
if ($result=$staff_class->create_staff($name)) {
    echo json_encode($result,JSON_UNESCAPED_UNICODE);
    return ;
}
echo 0;
return;