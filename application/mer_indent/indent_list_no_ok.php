<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-6
 * Time: 下午11:45
 */


//$mer_id = $_POST['mer_id'];
//print_r("aaaa");
$merId = UserInfo::getMerId();

$mer_indent_class = new mer_indent_class();
$indent_list_no_ok['indent_list_no_ok'] = $mer_indent_class->indent_list_no_ok($merId);
if (empty($indent_list_no_ok['indent_list_no_ok'])){
    echo '{"indent_list_no_ok":[]}';
    return ;
}
//print_r($indent_list_no_ok);
//print_r($indent_list_no_ok['indent_list_no_ok']);
$json_encode = json_encode($indent_list_no_ok, JSON_UNESCAPED_UNICODE);
$str_replace = str_replace('[]', '{}', $json_encode);
echo $str_replace;
