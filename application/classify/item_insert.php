<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$classify = new classify_class();
ob_start();
$name = $_POST['name'];
$class_id = $_POST['class_id'];
$photo = $_POST['photo'];
$description = $_POST['description'];
$univalence = $_POST['univalence'];
$discount_singe = $_POST['discount_singe'];
$discount = $_POST['discount'];
if ($classify->item_insert($name, $class_id, $photo, $description, $univalence, $discount_singe, $discount)) {
    ob_end_clean();
    echo 1;
    return;
}
ob_end_clean();
echo 0;
return;
//print_r($max_classify_id);