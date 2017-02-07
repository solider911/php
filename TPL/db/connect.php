<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/7
 * Time: 11:47
 */

define("LOCAL_DB_TYPE", "mysql");
define("LOCAL_DB_HOST", "localhost");
define("LOCAL_DB_NAME", "chb");
define("LOCAL_DB_USER", "root");
define("LOCAL_DB_PWD", "12345678");
define("LOCAL_DB_PORT", "3306");
define("LOCAL_DB_PREFIX", "chb_");


$link=mysql_connect(LOCAL_DB_HOST, LOCAL_DB_USER, LOCAL_DB_PWD);
mysql_select_db(LOCAL_DB_NAME, $link);
mysql_query("SET names UTF8");

header("Content-Type: text/html; charset=utf-8");


//$host="taskwan.u005.com";
//$db_user="taskphello";
//$db_pass="taskP123_456";
//$db_name="taskphello";
//$timezone="Asia/Shanghai";