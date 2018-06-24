<?php

require dirname(__FILE__).'/../../mysql/mysql_type.php';
require dirname(__FILE__).'/../tool/tool.php';

if(!isset($_POST['type_num'])||!isset($_POST['name'])){
    return '1';
}
$type_num=$_POST['type_num'];
$name=$_POST['name'];

$mer_id=1;
$mysql_type=new MySql_type();
$mysql_type->type_inseret($type_num, $name, $mer_id);
echo '0';
