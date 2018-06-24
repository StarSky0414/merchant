<?php
/**
 * 有多少人得不到的，是你所拥有的！且行且珍惜！！
 * User: StarSky
 * Date: 2018/2/22
 * Time: 10:35
 */

/**
 * 无session接口
 */

ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once dirname(__FILE__).'/../../sql/MySqlBase.php';
require_once dirname(__FILE__).'/../../sql/staff_sql.php';
require_once dirname(__FILE__).'/../../application/staff/staff_class.php';
require_once dirname(__FILE__).'/../../application/staff/staff_login.php';