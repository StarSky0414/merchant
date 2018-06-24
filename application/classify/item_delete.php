<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$classify = new classify_class();
ob_start();
$class_id = $_POST['class_id'];
$item_id = $_POST['item_id'];
$item_id_arr=explode('#',$item_id);
if ($classify->item_dele($class_id,$item_id_arr)) {
    ob_end_clean();
    echo '1';
    return;
}
ob_end_clean();
echo 0;
return;