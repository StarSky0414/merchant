<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/21
 * Time: 20:00
 */

/**
 * 登录成功后员工可完善：
1.性别       sex
2.出生日期   birth
3.联系方式   phone number
4.员工照片   photo
 */

$staff_id= UserInfo::getUserId();
$sex = $_POST['sex'];
$birth = $_POST['birth'];
$phone_number = $_POST['phone_number'];
$photo = $_POST['photo'];

$staff_class = new staff_class();
if ($staff_class->staff_update($staff_id,$sex,$birth,$phone_number,$photo)) {
    echo 1;
    return;
}
echo 0;
return;