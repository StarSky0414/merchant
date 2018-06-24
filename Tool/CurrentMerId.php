<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/29
 * Time: 3:25
 */
require_once dirname(__FILE__) . '/../sql/current_sql.php';

class CurrentMerId
{
    /*private static $current_sql;

    public function __construct()
    {
        $this->current_sql = new current_sql();
    }*/

    public static function getMerId()
    {
        $current_sql = new current_sql();
        if ($select = $current_sql->select('meruser', array('current_mer_id'), array('id' => UserInfo::getUserId()))) {
            return $select[0]['current_mer_id'];
        }else{
            return false;
        }
    }

    public static function setMerId($current_mer_id)
    {
        $current_sql = new current_sql();
        if ($update_sql = $current_sql->update('meruser', array('current_mer_id' => $current_mer_id), array('id' => UserInfo::getUserId()))) {
            return true;
        }else{
            return false;
        }

    }
}