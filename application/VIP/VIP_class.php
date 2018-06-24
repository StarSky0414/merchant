<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/26
 * Time: 14:40
 */

class VIP_class
{
    private $VIP_sql;

    public function __construct()
    {
        $this->VIP_sql = new VIP_sql();
    }

    public function vip_upload($mer_id, $VIP_name, $min_num, $discount)
    {
        $min_vip_id = $this->VIP_sql->min_vip_id_select($mer_id);
        $next_vip_id=$mer_id.'0'.($min_vip_id+1);
        return $this->VIP_sql->vip_date_insert($next_vip_id,$mer_id, $VIP_name, $min_num, $discount);
    }

    public function dele_sign($VIP_id){
        $dele_sign_update = $this->VIP_sql->dele_sign_update($VIP_id);
        return $dele_sign_update;
    }

    public function vip_show($mer_id){
        $vip_list = $this->VIP_sql->vip_select($mer_id);
        return $vip_list;
    }

    public function vip_update($vip_id,$VIP_name,$min_num,$discount){
        $vip_update = $this->VIP_sql->vip_date_update($vip_id,$VIP_name,$min_num,$discount);
        return $vip_update;
    }

    private function vip_level($user,$num){
        $vip_level_select = $this->VIP_sql->vip_level_select($user,$num);
        return $vip_level_select;
    }

    public  function vip_name_part($mer_id,$name_part,$last_id){
        $vip_name_part_select = $this->VIP_sql->vip_name_part_select($mer_id, $name_part, $last_id);
        foreach ($vip_name_part_select as $key=>$item){
            $vip_name_part_select[$key]['vip_name']=$this->vip_level($mer_id,$item['integral']);
        }
        return $vip_name_part_select;
    }

}