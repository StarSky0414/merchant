<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/17
 * Time: 11:13
 */

class staff_sql extends MySqlBase
{
    public function max_id($mer_id)
    {
        $sql = 'SELECT count(*) FROM mer_staff WHERE mer_id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($mer_id));
        return $PDOStatement->fetch()['count(*)'];

    }

    public function create_staff_id($staff_id, $mer_id, $name, $password)
    {
        $sql_insert = array('staff_id' => $staff_id, 'mer_id' => $mer_id, 'name' => $name, 'password' => $password);
        if ($this->insert('mer_staff', $sql_insert)) {
            return true;
        } else {
            return false;
        }
    }

    public function staff_user_pw($user, $password)
    {
//        $select_sql=array('password'=>$password);
        $select = $this->select('mer_staff', array('count(*)'), array('staff_id' => $user, 'password' => $password, 'dele_sign' => 0));
        if (isset($select[0]['count(*)'])) {
            return true;
        } else {
            return false;
        }
    }

    public function dele_staff($staff_id)
    {
        $update_sql = array('dele_sign' => 0);
        $where_sql = array('staff_id' => $staff_id);
        $this->update('mer_staff', $update_sql, $where_sql);
    }

    public function staff_update_sql($staff_id, $sex, $birth, $phone_number, $photo)
    {
        $update_sql = array('sex' => $sex, 'birth' => $birth, 'phone_number' => $phone_number, 'photo' => $photo);
        $where_sql = array('staff_id' => $staff_id, 'dele_sign' => 0);
        $update = $this->update('mer_staff', $update_sql, $where_sql);
        return $update;

    }

    public function max_record_id($staff_id)
    {
        $sele_sql = array('count(*)');
        $where_sql = array('staff_id' => $staff_id);
        $select = $this->select('record', $sele_sql, $where_sql);
        return $select[0]['count(*)'];
    }

    public function record_create_sql($staff_id)
    {
        $max_record_id = $this->max_record_id($staff_id);
        $record_id = $staff_id . '0' . ((int)$max_record_id + 1);
        $insert_sql = array('record_id' => $record_id, 'staff_id' => $staff_id);
        $insert = $this->insert('record', $insert_sql);
        return $insert;
    }

    public function record_over_sql($staff_id)
    {
//        print_r($staff_id);
        $max_record_id = $this->max_record_id($staff_id);
//        print_r($max_record_id);
        $record_id = $staff_id . '0' . $max_record_id;
        $update_sql = array('over_time' => Time::now_time());
        $where_sql = array('record_id' => $record_id);
        $update = $this->update('record', $update_sql, $where_sql);
//        print_r($update);
        return $update;
    }

    public function record_show_sql($day_num)
    {
//        $implode = implode('|',$range);
//        print_r($implode);
        $sql = "SELECT (record.over_time-record.start_time)/10000 FROM record WHERE date(over_time)=date(now())-?  ORDER BY record.over_time DESC;";
//        print_r($sql);
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($day_num));
        $result = (int)$PDOStatement->fetch()['(record.over_time-record.start_time)/10000'];
        return $result;
    }

    public function staff_info_sql($staff_id)

    {
        $sql = 'SELECT name,sex,birth,phone_number,photo FROM mer_staff WHERE staff_id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($staff_id));
        $all = $PDOStatement->fetch();
        return $all;
    }

    public function staff_list_sql($mer_id)
    {
        $sql = 'SELECT staff_id,name,photo FROM mer_staff WHERE mer_id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($mer_id));
        $all = $PDOStatement->fetchAll();
        return $all;
    }

    public function find_mer_id_sele($user_id)
    {
        $sql = 'SELECT current_mer_id FROM meruser WHERE id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($user_id));
        return $PDOStatement->fetch()['current_mer_id'];
    }

    public function staff_change_pwd_update($password,$userId)
    {
        $sql = 'UPDATE mer_staff SET password=? WHERE staff_id =?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($password,$userId));
    }

}