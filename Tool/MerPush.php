<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-6
 * Time: 下午11:58
 */

require_once dirname(__FILE__).'/../sdk/aliyun-php-sdk-push/Push.php';
class MerPush
{

    public static function merPushMessage($account, $key_value, $title, $body){
        $push_info = new Push_info();
        $push_info->push("MESSAGE","ACCOUNT",$account,"",$key_value,$title,$body);

    }
    public static function merPushNotic($account,$activite, $key_value, $title, $body){
        $push_info = new Push_info();
        $push_info->push("NOTICE","ACCOUNT",$account,$activite,$key_value,$title,$body);
    }
}