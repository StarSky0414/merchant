<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/11
 * Time: 11:49
 */

require_once dirname(__FILE__) . '/MySqlBase.php';

class login_sql extends MySqlBase
{
    public function write_user_insert($user, $password)
    {
        $sql = "INSERT INTO meruser (mer_user,password) VALUES (?,?);";
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($user, $password));
    }

    public function write_user_update($user, $password)
    {
        $sql = "update meruser set password=? where mer_user=? ";
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array( $password,$user));
    }

}