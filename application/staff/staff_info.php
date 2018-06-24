<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/22
 * Time: 21:22
 */

require_once dirname(__FILE__).'/../../Tool/Time.php';
if (isset($_POST['staff_id'])){
    $staff_id=$_POST['staff_id'];
}else{
    $staff_id=UserInfo::getUserId();
}
//print_r($staff_id);
$staff_class = new staff_class();
$record_show= $staff_class-> staff_info($staff_id);
//print_r($record_show);
$json_encode = json_encode($record_show, JSON_UNESCAPED_UNICODE);
$json_encode = str_replace("null", "\"\"", $json_encode);
echo $json_encode;
//print_r("end");