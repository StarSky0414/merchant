<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-9
 * Time: 下午10:12
 */

$discount_sign =$_POST['discount_sign'];
$defin_discount=$_POST['defin_discount'];
$class_id = $_POST['class_id'];
$classify_class = new classify_class();
if ($classify_class->classify_update_discount($class_id,$discount_sign,$defin_discount)) {
    echo 1;
    return ;
}
echo  0;
