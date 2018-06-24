<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/1/28
 * Time: 17:54
 */
require_once dirname(__FILE__) . '/../Tool/Photo_upload.php';

class register_sql extends MySqlBase
{

    public function select_max_num($table_name,$select_key,$where_array){
        $select="select max($select_key) ";
        $table=" from ";
        if (is_array($table_name)){
            $table.=implode(',',$table_name);
        }else{
            $table.=$table_name;
        }
        $where=" where 1=1 ";
        if(isset($where_array)){
            $where_key=array_keys($where_array);
            $where_value=$this->type_change(array_values($where_array));
            $where_array = array_combine($where_key, $where_value);
            foreach ($where_array as $k=>$v) {
                $where.=' and '.$k.'='.$v;
            }
        }
        $sql=$select.$table.$where;
        echo $sql;
        return $this->dbHandle->query($sql)->fetchAll()[0];//返回查询结果的数组
    }
    //////////////////////////////////////////////////////////////////

    public function first_register_insert($user_id, $name, $classify, $phone, $address, $longitude, $latitude)
    {
//        echo "$user_id  $name $classify $phone $address   返回码：";
        $sql = "insert into merinfo (user_id, name ,classify ,phone ,address,longitude,latitude) value(?,?,?,?,?,?,?);";
        $ex = $this->dbHandle->prepare($sql);
        return $ex->execute(array($user_id, $name, $classify, $phone, $address, $longitude, $latitude));
    }

    /*
     * 废弃函数
     */
    /*public function photo_uploade_insert($user_id, $pho_name, $pho_url, $pho_type)
    {
        $sql = "insert into photo (user_id ,pho_name ,pho_url ,pho_type)  value ($user_id,'$pho_name','$pho_url','$pho_type')";
        return $this->dbHandle->exec($sql);
    }*/

    public function supply_register_update($mer_id, $introduce, $business_hours, $status, $reserve, $avecon, $longitude, $latitude, $circle, $city)
    {
        $sql = "update merinfo set introduce='$introduce',business_hours='$business_hours',status='$status',reserve='$reserve',avecon='$avecon','longitude'=$longitude,'latitude'=$latitude,'circle'=$circle,'citywhere'=$city where mer_id=$mer_id;";
        return $this->dbHandle->exec($sql);
    }


    public function find_big_project($id)
    {
        $sql = "select big_project.project from big_project,small_project,merinfo  where classify=small_project.project and small_project.big_id=big_project.big_id and merinfo.id=$id";
        //echo $sql;
        return $this->dbHandle->query($sql)->fetch();

    }

// select mer_id,name,classify,introduce,phone,address,business_hours,status,reserve,pho_url from merinfo,photo where merinfo.mer_id=photo.user_id and photo.pho_name='surface' and merinfo.user_id=1;


    public function selectall($user_id)
    {
        $sql = $this->dbHandle->prepare("select mer_id,name,classify,introduce,phone,address,business_hours,status,reserve,pass,avecon  from merinfo where "
            . " merinfo.user_id=?;");
        $sql->execute(array($user_id));
        return $sql->fetchAll();
    }

    public function selectall_($mer_id)
    {
        $sql = $this->dbHandle->prepare('select * from merinfo where id=?');
        $sql->execute(array($mer_id));
        return $sql->fetchAll();
    }

    public function selsct_photo_surface($mer_id)
    {
        $sql = $this->dbHandle->prepare("select pho_type,pho_url from photo_manage where photo_manage.pho_type='surface' and photo_manage.mer_id=?");
        $sql->execute([$mer_id]);
        return $sql->fetchAll();
    }

    public function selsct_photo_environment($mer_id)
    {
        $sql = $this->dbHandle->prepare("select pho_type,pho_url from photo_manage where photo_manage.pho_type = 'environment' and photo_manage.mer_id=?");
        $sql->execute([$mer_id]);
        return $sql->fetchAll();
    }//or photo_manage.pho_type = 'environment'

    public function update_register($mer_id, $introduce, $business_hours, $phone, $reserve, $avecon)
    {
        $sql = "update merinfo set introduce='$introduce',business_hours='$business_hours',phone='$phone',reserve='$reserve',avecon='$avecon'where mer_id=$mer_id;";
        return $this->dbHandle->exec($sql);
    }
}