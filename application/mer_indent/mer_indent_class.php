<?php
/**
 * Created by PhpStorm.
 * User: luojunyuan
 * Date: 18-4-6
 * Time: 下午11:32
 */

class mer_indent_class
{
    private $mer_indent_sql;

    public function __construct()
    {

            $this->mer_indent_sql = new mer_indent_sql();
    }

    public function indent_list_no_ok($mer_id)
    {
        $indent_list_no_ok_select = $this->mer_indent_sql->indent_list_no_ok_select($mer_id);
        foreach ($indent_list_no_ok_select as $key=>$item){
            $indent_list_no_ok_select[$key]['trolley_list'] = json_decode($item['trolley_list'], JSON_UNESCAPED_UNICODE);
            $indent_list_no_ok_select[$key]['indent_info'] = json_decode($item['indent_info'], JSON_UNESCAPED_UNICODE);
        }
        return $indent_list_no_ok_select;
    }

    public function order_dispose($userId, $indent_id)
    {
        $order_dispose_update = $this->mer_indent_sql->order_dispose_update($userId, $indent_id);
        return $order_dispose_update;
    }


}