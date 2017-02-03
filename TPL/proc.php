<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/31
 * Time: 19:59
 */

set_time_limit(0);

$db_conn = null;
$db_server_name="localhost";  // 数据库服务器名称
$db_username="root"; 			// 连接数据库用户名
$db_password="12345678"; 		// 连接数据库密码
$db_database="chb"; 			// 数据库的名字


$db_conn = mysql_connect($db_server_name, $db_username,$db_password)or die ('connected failed : ' . mysql_error());
mysql_select_db($db_database, $db_conn) or die ('select failed : ' . mysql_error());
// 为了从数据库中能读出汉字
mysql_query('SET NAMES UTF8');
mysql_query("set character_set_client=utf-8");
mysql_query("set character_set_results=utf-8");


if($db_conn){

    $ret_score = mysql_query("call proc_score_select_03(\"score10\")", $db_conn);

    while($row_score = mysql_fetch_assoc($ret_score)){
        print_r($row_score);
        echo "</br>";
    }

}