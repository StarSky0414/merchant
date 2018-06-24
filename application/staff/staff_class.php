<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/17
 * Time: 11:13
 */

class staff_class
{
    private $staff_sql;

    public function __construct()
    {
        $this->staff_sql = new staff_sql();
    }

    public function create_staff($name)
    {
        $mer_id = $this->find_mer_id(UserInfo::getUserId());
        $password = rand(1000, 9999);
        $max_id = $this->staff_sql->max_id($mer_id);
        $next_id = $max_id + 1;
        $staff_id = $mer_id . '0' . $next_id;
        if ($this->staff_sql->create_staff_id($staff_id, $mer_id, $name, $password)) {
            $ar = array('staff_id' => $staff_id, 'password' => $password);
            return $ar;
        }
        return false;
    }

    public function staff_login($user, $password)
    {
        $staff_user_pw = $this->staff_sql->staff_user_pw($user, $password);
        return $staff_user_pw;
    }

    public function staff_update($staff_id, $sex, $birth, $phone_number, $photo)
    {
        $staff_update_sql = $this->staff_sql->staff_update_sql($staff_id, $sex, $birth, $phone_number, $photo);
        return $staff_update_sql;
    }

    public function record_create($staff_id)
    {
        $record_create_sql = $this->staff_sql->record_create_sql($staff_id);
        return $record_create_sql;
    }

    public function record_over($staff_id)
    {
        $record_create_sql = $this->staff_sql->record_over_sql($staff_id);
        return $record_create_sql;
    }

    public function record_show()
    {
        $date =date('w');
//        $date=5;
        $all_time=$date;
        $date++;
        $range = array_fill(0,7,'-1');
//        print_r($range);
        for(;$date--;){
            $record_show_sql = $this->staff_sql->record_show_sql($date);
            $range[$all_time-$date]=$record_show_sql?(string)$record_show_sql:'0';
//            print_r($date);
        }

//        print_r($range);
//        $array_column = '';
//        $i = 0;
//        foreach ($record_show_sql as $item) {
////            $array_column[$i]['overtime'] = floor($item['over_time'] / 1000000);
//            $array_column[$i]['time_sum'] = $item['(record.over_time-record.start_time)/10000'];
//            $i++;
//        }
        return $range;
    }

    public function staff_info($staff_id)
    {
        $re = $this->staff_sql->staff_info_sql($staff_id);
        $re['time_list'] = $this->record_show();
        return $re;
    }

    public function staff_list($mer_id)
    {
        $re = $this->staff_sql->staff_list_sql($mer_id);
        return $re;
    }

    public function find_mer_id($user_id)
    {
        $mer_id_sele = $this->staff_sql->find_mer_id_sele($user_id);
        return $mer_id_sele;
    }

    public function staff_change_pwd($password,$userId)
    {
        $staff_change_pwd_update = $this->staff_sql->staff_change_pwd_update($password,$userId);
        return $staff_change_pwd_update;
    }

}