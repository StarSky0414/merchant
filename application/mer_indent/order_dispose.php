<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-10
 * Time: 下午8:53
 */

$indent_id = $_POST['indent_id'];
$userId = UserInfo::getUserId();
$mer_indent_class = new mer_indent_class();
if ($mer_indent_class->order_dispose($userId,$indent_id)) {
    echo 1;
    return ;
}
echo 2;