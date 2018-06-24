<?php
//require dirname(__FILE__).'/../../mysql/mysql_register.php';
//require dirname(__FILE__).'/../../sql/register_sql.php';
ob_start();
$mysql_show =  new register_sql();
$merId = CurrentMerId::getMerId();
$content=$mysql_show->selectall(UserInfo::getUserId());
//print_r($content);
foreach ($content as $key=>$val){

//    print_r($val);
    $con_photo=$mysql_show->selsct_photo_surface($val['mer_id']);
//    $pho_type=$con_photo[0]['pho_type'];
    $pho_url=$con_photo[0]['pho_url'];
    $val['surface']=null;
    $val['surface']=$pho_url;

    $con_photo=$mysql_show->selsct_photo_environment($val['mer_id']);
//    print_r($con_photo);
    $val['environment'][]=null;
    foreach ($con_photo as $key_p=>$val_p){
       $val['environment'][$key_p]=$val_p['pho_url'];
    }
    //$content[0][$val['pho_name']]=$val['pho_url'];
    //print_r($val);
    $temp['merinfo'][]=$val;
}
//print_r($temp);
//$content['$content']=$content[0];
//unset($content[0]);
//print_r($con_photo);
//print_r($content);
ob_end_clean();
if (empty($temp)){
    echo '{"merinfo":[]}';
    return;
}
print_r(json_encode($temp,JSON_UNESCAPED_UNICODE));
