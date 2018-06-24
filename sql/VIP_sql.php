<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/26
 * Time: 14:41
 */

class VIP_sql extends MySqlBase
{

    public function min_vip_id_select($mer_id)
    {
        $sql = 'SELECT count(*) FROM mer_VIP_manage WHERE mer_id=? ;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($mer_id));
        $count = $PDOStatement->fetch()['count(*)'];
        return $count;
    }

    public function vip_date_insert($VIP_id, $mer_id, $VIP_name, $min_num, $discount)
    {
        $sql = 'INSERT INTO mer_VIP_manage (VIP_id, mer_id, VIP_name, min_num, discount ) VALUES (?,?,?,?,?);';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($VIP_id, $mer_id, $VIP_name, $min_num, $discount));
    }

    public function dele_sign_update($VIP_id)
    {
        $sql = 'UPDATE mer_VIP_manage SET  dele_sign=1 WHERE VIP_id=? ;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($VIP_id));
    }

    public function vip_select($mer_id)
    {
        $sql='SELECT VIP_id,VIP_name,min_num,discount FROM mer_VIP_manage WHERE dele_sign=0 and mer_id=?;';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($mer_id));
        $result = $PDOStatement->fetchAll();
        return $result;
    }

    public function vip_date_update($vip_id,$VIP_name,$min_num,$discount){
        $sql='UPDATE mer_VIP_manage SET VIP_name = ? ,min_num = ? ,discount = ?  WHERE VIP_id=?';
        $PDOStatement = $this->dbHandle->prepare($sql);
        return $PDOStatement->execute(array($VIP_name,$min_num,$discount,$vip_id));
    }

    public function vip_name_part_select($mer_id,$name_part,$last_id){
//        print_r($mer_id);
//        print_r("%$name_part%");
        $sql='select integral,user_id,nickname,photo from vip_date,con_user where user_id>? and mer_id=? and user_id=id  and (user_id=? or nickname like ? )order by id ASC limit 10;';
        //
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($last_id,$mer_id,$name_part,"%$name_part%"));
        $result = $PDOStatement->fetchAll();
//        print_r($result);
        return $result;
    }
    public function vip_level_select($mer_id,$num){
        $sql='select VIP_name from mer_VIP_manage where mer_id=? and dele_sign=0 and min_num>=? order by min_num DESC limit 1';
        $PDOStatement = $this->dbHandle->prepare($sql);
        $PDOStatement->execute(array($mer_id,$num));
        $VIP_name = $PDOStatement->fetch();
        return $VIP_name['VIP_name'];
    }

}