<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/16
 * Time: 15:29
 */

require_once dirname(__FILE__).'/../../Tool/Photo_upload.php';

$photo_upload = new Photo_upload();
$type_name=$_POST['type_name'];
$photo_url=$_POST['photo_url'];
if ($photo_upload->update_photo($photo_url,$type_name,1)) {
    echo 'ok!!!';
}