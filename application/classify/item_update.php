<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$classify_class = new classify_class();
ob_start();
$name = $_POST['name'];
$class_id = $_POST['class_id'];
$photo = $_POST['photo'];
$description = $_POST['description'];
$univalence = $_POST['univalence'];
$item_id = $_POST['item_id'];
$discount_singe = $_POST['discount_singe'];
$discount = $_POST['discount'];
if ($classify_class->item_update($class_id, $item_id, $name, $photo, $description, $univalence, $discount_singe, $discount)) {
//    ob_end_clean();
    echo 1;
    return;
} else {
//    ob_end_clean();
    echo 0;
    return;
}
