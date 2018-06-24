<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/17
 * Time: 12:13
 */

$classify = new classify_class();
ob_start();
$class_id = $_POST['class_id'];
$item_id = $_POST['item_id'];
$item_id_arr=explode('#',$item_id);
if ($classify->item_stick($class_id,$item_id_arr)) {
    ob_end_clean();
    echo '1';
    return;
}
ob_end_clean();
echo 0;
return;