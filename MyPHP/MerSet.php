<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-8
 * Time: 下午4:11
 */


require_once dirname(__FILE__).'/../sql/MySqlBase.php';
class MerSet
{
    public static function mer_id_sql($user_id){
        $mySqlBase = new MySqlBase();
        $sql_user= 'select meruser.current_mer_id  from meruser  where  id=?';
        $sql_staff='select mer_staff.mer_id from mer_staff where staff_id=?';
        $PDOStatement = $mySqlBase->dbHandle->prepare($sql_user);
        $PDOStatement->execute(array($user_id));
        $result = $PDOStatement->fetch()['current_mer_id'];
        if (empty($result)){
            $PDOStatement = $mySqlBase->dbHandle->prepare($sql_staff);
            $PDOStatement->execute(array($user_id));
            $result=$PDOStatement->fetch()['mer_id'];
        }
        return $result;
    }
}