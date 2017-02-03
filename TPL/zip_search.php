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

        $fp = fopen("zip_ins.txt", "a+");
       while( $arr_zipurl = mysql_fetch_assoc($ret_zipurl)){
           foreach($arr_zipurl as $key=>$value) {
               $zip_name = strrchr($value, '/');
               fwrite($fp, $zip_name . "\r\n");
           }
       }
        fclose($fp);

        //$rdata = send_post('http://upfile.u005.com/zip_ins.php', $ret_test);
        //echo( $rdata);

        mysql_close($db_conn);
    }

echo "zip_search leaving..."."</br>";


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


function http_post_json_data($url, $json_data) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($json_data))
    );
    ob_start();
    curl_exec($ch);
    $return_content = ob_get_contents();
    ob_end_clean();

    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    return array($return_code, $return_content);
}




