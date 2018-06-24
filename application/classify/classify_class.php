<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/15
 * Time: 11:35
 */

//require_once dirname(__FILE__) . '/classify_sql.php';
require_once dirname(__FILE__) . '/../../Tool/Time.php';

class classify_class
{
    private static $TABLE_CLASS = 'class';
    private static $FIELD_CLASS_USER_ID = 'user_id';
    private static $FIELD_CLASS_CLASS_ID = 'class_id';
    private static $FIELD_CLASS_NAME = 'name';
    private static $FIELD_CLASS_DELECT_SIGN = 'delete_sign';

    private static $FIELD_ITEM_CLASS_ID = 'class_id';
    private static $FIELD_ITEM_ITEM_ID = 'item_id';
    private static $FIELD_ITEM_NAME = 'name';
    private static $FIELD_ITEM_PHOTO = 'photo';
    private static $FIELD_ITEM_DESCRIPTION = 'description';
    private static $FIELD_ITEM_UNIVALENCE = 'univalence';
    private static $FIELD_ITEM_DELECT_SIGN = 'delete_sign';
    private static $FIELD_ITEM_STICK_TIME = 'stick_time';
    private static $TABLE_ITEM = 'item';
    private $classify_sql;

    public function __construct()
    {
        $this->classify_sql = new classify_sql();
    }

    public function max_classify_id()
    {
        $select_sql = self::$FIELD_CLASS_CLASS_ID;
        $where_sql = array();
        if ($result = $this->classify_sql->select_max_num(self::$TABLE_CLASS, $select_sql, $where_sql)["max($select_sql)"]) {
            print_r($result);
            return $result;
        }
    }

    public function max_item_id()
    {
        $select_sql = self::$FIELD_ITEM_ITEM_ID;
        $where_sql = array();
        if ($result = $this->classify_sql->select_max_num(self::$TABLE_ITEM, $select_sql, $where_sql)["max($select_sql)"]) {
            print_r($result);
            return $result;
        }
    }

    //单价，名，描述，图片
    public function show_item($class_id)
    {
//        $select_sql = array(self::$FIELD_ITEM_CLASS_ID, self::$FIELD_ITEM_ITEM_ID, self::$FIELD_ITEM_NAME, self::$FIELD_ITEM_PHOTO, self::$FIELD_ITEM_UNIVALENCE, self::$FIELD_ITEM_DESCRIPTION,'discount_singe','discount');
//        $where_sql = array(self::$FIELD_ITEM_CLASS_ID => $class_id, self::$FIELD_ITEM_DELECT_SIGN => 0);
//        if ($result = $this->classify_sql->select(self::$TABLE_ITEM, $select_sql, $where_sql)) {
//            print_r($result);
//            return $result;
//        }
        $sql='select item_id,class_id,name,photo,univalence,description,discount_singe,discount from item WHERE class_id=? AND delete_sign=0 ORDER BY stick_time DESC ;';
        $PDOStatement = $this->classify_sql->dbHandle->prepare($sql);
        $PDOStatement->execute(array($class_id));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function classify_delete($class_id)
    {
        return $this->classify_sql->classify_delete($class_id);
    }

    public function classify_update($class_id, $name)
    {
        return $this->classify_sql->classify_update($class_id, $name);
    }

    public function classify_select($user_id)
    {
        $classify_select = $this->classify_sql->classify_select($user_id);
        return $classify_select;
    }

    public function classify_insert($user_id, $name, $class_id)
    {
        return $this->classify_sql->classify_insert($user_id, $name, $class_id);
    }

    public function item_insert($name, $class_id, $photo, $description, $univalence, $discount_singe, $discount)
    {
        $item = $this->max_item_id();
        $item++;
        $insert = array(self::$FIELD_ITEM_NAME => $name, self::$FIELD_ITEM_CLASS_ID => $class_id,
            self::$FIELD_ITEM_ITEM_ID => $item, self::$FIELD_ITEM_PHOTO => $photo,
            self::$FIELD_ITEM_DESCRIPTION => $description, self::$FIELD_ITEM_UNIVALENCE => $univalence, self::$FIELD_ITEM_DELECT_SIGN => 0,'discount_singe'=> $discount_singe, 'discount'=>$discount);
        if ($this->classify_sql->insert(self::$TABLE_ITEM, $insert)) {
            return true;
        } else {
            return false;
        }
    }

    public function item_update($class_id, $item_id, $name, $photo, $description, $univalence, $discount_singe, $discount)
    {
        $update_sql = array(self::$FIELD_ITEM_NAME => $name,
            self::$FIELD_ITEM_PHOTO => $photo,
            self::$FIELD_ITEM_DESCRIPTION => $description, self::$FIELD_ITEM_UNIVALENCE => $univalence, 'discount_singe'=>$discount_singe, 'discount'=>$discount);
        $where_sql = array(self::$FIELD_ITEM_CLASS_ID => (int)$class_id, self::$FIELD_ITEM_ITEM_ID => (int)$item_id, self::$FIELD_ITEM_DELECT_SIGN => 0);
        if ($this->classify_sql->update(self::$TABLE_ITEM, $update_sql, $where_sql)) {
            return true;
        }
        return false;
    }

    public function item_stick($class_id, $item_id)
    {
        $stick_time = Time::now_time();
        $sql = "update item set stick_time = $stick_time where delete_sign=0 AND  class_id=$class_id and (item_id= ";
        $temp = array();//拼接
        $temp[] = $item_id[0];
        for ($i = 1; $i < sizeof($item_id); $i++) {
            $sql .= "? or item_id=";
            $temp[] = $item_id[$i];
        }
        $sql .= "?);";
        echo $sql;
        print_r($temp) ;
        $mysql = $this->classify_sql->dbHandle->prepare($sql);
        return $mysql->execute($temp);
    }

    public function item_dele($class_id, $item_id)
    {
        $sql = "update item set delete_sign =1 where class_id=$class_id and (item_id= ";
        $temp = array();//拼接
        $temp[] = $item_id[0];
        for ($i = 1; $i < sizeof($item_id); $i++) {
            $sql .= "? or item_id=";
            $temp[] = $item_id[$i];
        }
        $sql .= "?);";
        echo $sql;
        //print_r($temp) ;
        $mysql = $this->classify_sql->dbHandle->prepare($sql);
        return $mysql->execute($temp);
    }

    public function classify_update_discount($class_id,$discount_sign, $defin_discount)
    {

        $classify_update_discount_up = $this->classify_sql->classify_update_discount_up($class_id, $discount_sign, $defin_discount);
        return $classify_update_discount_up;
    }

}