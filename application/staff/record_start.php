<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/21
 * Time: 20:51
 */
require_once dirname(__FILE__).'/../../Tool/Time.php';


//$staff_id = $_POST['staff_id'];
//$userId1 = UserInfo::getUserId();
$userId = UserInfo::getUserId();
if ($staff_class->record_create($userId)) {
    echo 1;
    return;
}
echo 0;
return;