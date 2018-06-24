<?php

require_once dirname(__FILE__) . '/../../Tool/Photo_upload.php';
require_once dirname(__FILE__) . '/../../Tool/CurrentMerId.php';

class register_class
{

    private $table = 'merinfo';
    private $f_mer_id = 'mer_id';
    private $f_user_id = 'user_id';
    private $f_name = 'name';
    private $f_classify = 'classify';
    private $f_phone = 'phone';
    private $f_address = 'address';
    private $f_longitude = 'longitude';
    private $f_latitude = 'latitude';
    private $f_circle = 'circle';
    private $f_city = 'city';
    private $f_business_hours = 'business_hours';
    private $f_status = 'status';
    private $f_reserve = 'reserve';
    private $f_pass = 'pass';
    private $f_avecon = 'avecon';
    private $f_project_id = 'project_id';
    private $f_time = 'time';
    private $f_grade = 'grade';
    private $f_introduce = 'introduce';

    private $register_sql;

    public function __construct()
    {
        $this->register_sql = new register_sql();
    }

    private function max_mer_id()
    {
        $select_sql = $this->f_mer_id;
        $where_sql = array();
        if ($result = $this->register_sql->select_max_num($this->table, $select_sql, $where_sql)["max($select_sql)"]) {
            return $result;
        }
    }

    public function first_register($user_id, $name, $classify, $phone, $address, $longitude, $latitude, $photo, $circle, $city)
    {
        $max_mer_id = $this->max_mer_id();
        $mer_id = $max_mer_id + 1;
        $insert_sql = array($this->f_mer_id => $mer_id, $this->f_user_id => $user_id, $this->f_name => $name, $this->f_classify => $classify,
            $this->f_phone => $phone, $this->f_address => $address, $this->f_longitude => $longitude, $this->f_latitude => $latitude,
            $this->f_circle => $circle, $this->f_city => $city);
        $where_sql = array();
        if (!$this->register_sql->insert($this->table, $insert_sql, $where_sql)) {
            return false;
        }
        CurrentMerId::setMerId($mer_id);
        if (Photo_upload::insert_photo('certificate', $mer_id, $photo)) {
            return true;
        }
        return false;
    }

    public function supply_register($introduce, $business_hours, $status, $reserve, $avecon, $photo_surface)
    {
        $mer_id = CurrentMerId::getMerId();
        $insert_sql = array($this->f_business_hours => $business_hours, $this->f_introduce => $introduce,
            $this->f_status => $status, $this->f_reserve => $reserve, $this->f_avecon => $avecon);
        $where_sql = array($this->f_mer_id => $mer_id);
        $this->register_sql->update($this->table, $insert_sql, $where_sql);
        Photo_upload::insert_photo('surface', $mer_id, $photo_surface);
        return true;
    }

    public function environment_up($photo_url)
    {
        $mer_id = CurrentMerId::getMerId();
        if (Photo_upload::insert_photo('environment', $mer_id, $photo_url)) {
            return true;
        } else {
            return false;
        }
    }

    public function set_user_mer_id($current_mer_id,$user_id){
        $table='meruser';
        $update_sql=array('current_mer_id'=>$current_mer_id);
        $where_sql=array('id'=>$user_id);
        if ($this->register_sql->update($table,$update_sql,$where_sql)) {
            return true;
        }else{
            return false;
        }

    }
}
