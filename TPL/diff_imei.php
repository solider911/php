<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/30
 * Time: 20:23
 */

set_time_limit(0);

$db_conn = null;
  $db_server_name="taskwan.u005.com";  // 数据库服务器名称
  $db_username="taskphello"; 			// 连接数据库用户名
  $db_password="taskP123_456"; 		// 连接数据库密码
  $db_database="taskphello"; 			// 数据库的名字

    $db_conn = mysql_connect($db_server_name, $db_username,$db_password)or die ('connected failed : ' . mysql_error());
    mysql_select_db($db_database, $db_conn) or die ('select failed : ' . mysql_error());
    // 为了从数据库中能读出汉字
    mysql_query('SET NAMES UTF8');
    mysql_query("set character_set_client=utf-8");
    mysql_query("set character_set_results=utf-8");


    if($db_conn){

        $sql_zipurl = "SELECT zipurl FROM tasklist  WHERE apkid=25 and zipurl!=\"\" AND installtime BETWEEN 1473177600 AND 1473264000";
        $ret_zipurl = mysql_query($sql_zipurl, $db_conn) or die("zipurl query failed : " . mysql_error());

        $old_dir = "./2016-08-30/";  // 原目录
        $new_dir = "./zipdir/";       // 新目录

        while($row_zipurl = mysql_fetch_assoc($ret_zipurl)){
            $zipurl = $row_zipurl["zipurl"];
            $zipname = substr($zipurl, strrpos($zipurl, '/')+1);
            $old_zipurl = $old_dir.$zipname;

            if(file_exists($old_zipurl)) {
                $new_zipurl = $new_dir.$zipname;
                if(copy($old_zipurl, $new_zipurl))
                    $count++;
            }
        }

        echo "success nums: $count";

        mysql_close($db_conn);
    }


function send_post($url, $post_data) {

    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}




