<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/22
 * Time: 12:24
 */

require_once dirname(__FILE__).'/../../Tool/Time.php';


//$staff_id = $_POST['staff_id'];
$userId = UserInfo::getUserId();
//print_r($userId);
$staff_class = new staff_class();
if ($staff_class->record_over($userId)) {
    echo 1;
    return;
}
echo 0;
return;