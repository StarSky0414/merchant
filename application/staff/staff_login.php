<?php
require_once dirname(__FILE__).'/../../identity/session/MySession.php';

$user_id=$_POST['user_id'];
$password=$_POST['password'];

$staff_class = new staff_class();
$staff_login = $staff_class->staff_login($user_id, $password);
if ($staff_login) {
    $mySession = new MySession();
    $mySession->clear_session($user_id);
    $make_session = $mySession->make_session($user_id);
    echo $make_session;
    return;
}
echo 0;
return;