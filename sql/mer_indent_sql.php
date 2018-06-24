<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-6
 * Time: 下午11:32
 */

class mer_indent_sql extends MySqlBase
{

    public function indent_list_no_ok_select($mer_id)
    {

        $sql = 'select indent_id,create_time,trolley_list,indent_info from win.indent where type_sign=5 and mer_id=? and dele_sign=0';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($mer_id));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function order_dispose_update($userId, $indent_id)
    {
        $sql = 'update indent set order_user=? , type_sign = 3 where indent_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $result = $PDOStatement->execute(array($userId, $indent_id));
        return $result;
    }
}