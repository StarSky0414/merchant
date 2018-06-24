<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/29
 * Time: 11:50
 */

if(!isset($_POST['envir'])){
    echo 0;
    return;
}
$envir = $_POST['envir'];

$register_class = new register_class();
if ($register_class->environment_up($envir)) {
    echo 1;
    return;
}
echo 0;
return ;