<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/16
 * Time: 15:14
 */

require_once dirname(__FILE__).'/../../Tool/Photo_upload.php';

$photo_upload = new Photo_upload();
$photo_url=$_POST['photo_url'];
if ($photo_upload->delete_photo($photo_url)) {
    echo 'ok!';
}