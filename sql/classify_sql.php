<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/15
 * Time: 11:37
 */

//require_once dirname(__FILE__) . '/MySqlBase.php';
class classify_sql extends MySqlBase
{

    public function select_max_num($table_name, $select_key, $where_array)
    {
        $select = "select max($select_key) ";
        $table = " from ";
        if (is_array($table_name)) {
            $table .= implode(',', $table_name);
        } else {
            $table .= $table_name;
        }
        $where = " where 1=1 ";
        if (isset($where_array)) {
            $where_key = array_keys($where_array);
            $where_value = $this->type_change(array_values($where_array));
            $where_array = array_combine($where_key, $where_value);
            foreach ($where_array as $k => $v) {
                $where .= ' and ' . $k . '=' . $v;
            }
        }
        $sql = $select . $table . $where;
        echo $sql;
        return $this->dbHandle->query($sql)->fetchAll()[0];//返回查询结果的数组
    }

    public function classify_insert($user_id, $name, $class_id)
    {
        $sql = "INSERT INTO class (user_id ,name,class_id) VALUE";
        $class_id++;
        $temp = array();//拼接
        $temp[] = $user_id;
        $temp[] = $name[0];
        $temp[] = $class_id;
        for ($i = 1; $i < sizeof($name); $i++) {
            $sql .= "(?,?,?),";
            $temp[] = $user_id;
            $temp[] = $name[$i];
            $temp[] = ++$class_id;
        }
        $sql .= "(?,?,?);";
        echo $sql;
        print_r($temp);
        print_r($sql);
        print_r($name);
        $mysql = $this->dbHandle->prepare($sql);
        return $mysql->execute($temp);
    }

    public function classify_delete($class_id)
    {
        $sql = "UPDATE class SET delete_sign ='True' WHERE class_id= ";
        $temp = array();//拼接
        $temp[] = $class_id[0];
        for ($i = 1; $i < sizeof($class_id); $i++) {
            $sql .= "? or class_id=";
            $temp[] = $class_id[$i];
        }
        $sql .= "?;";
        //echo $sql;
        //print_r($temp) ;
        $mysql = $this->dbHandle->prepare($sql);
        return $mysql->execute($temp);
    }

    public function classify_update($class_id, $name)
    {
        $sql = "UPDATE class SET name = ?WHERE class_id= ?;";
//        echo $sql;
        $class_id_array = explode('#', $class_id);
        $name_array = explode('#', $name);
//        $discount_sign_array = explode('#', $discount_sign);
//        $defin_discount_array = explode('#', $defin_discount);
//        print_r($defin_discount_array);
        foreach ($class_id_array as $k => $v) {
            $mysql = $this->dbHandle->prepare($sql);
            $mysql->execute(array($name_array[$k], $class_id_array[$k]));
        }
        return true;
    }

    public function classify_select($user_id)
    {
        $sql = "SELECT class_id,name,discount_sign,defin_discount FROM class WHERE user_id=? AND delete_sign IS NULL;";
        $mysql = $this->dbHandle->prepare($sql);
        $mysql->execute(array($user_id));
        //print_r($this->dbHandle->query($sql)->fetch());
        return $mysql->fetchAll();
    }

    public function vip_name_sele($mer_id, $min_num)
    {
        $sql = 'SELECT VIP_name FROM mer_VIP_manage WHERE mer_id=? AND dele_sign=0 AND min_num=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($mer_id, $min_num));
        $VIP_name = $PDOStatement->fetch()['VIP_name'];
        return $VIP_name;
    }

    public function classify_update_discount_up($class_id,$discount_sign, $defin_discount)
    {
        $sql = 'update class set discount_sign=? ,defin_discount=? where  class_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($discount_sign,$defin_discount,$class_id));


    }

}