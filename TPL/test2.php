<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/20
 * Time: 11:44
 */

// 设置系统时区
date_default_timezone_set(PRC);
//test_floor();
//test_date();
//test_array();
//test_strtotime();
//test_rand_int();
//test_shuffle();
//test_array_unique();
//test_http_referer();
//test_empty();
//test_string();
//test_strpos();
//echo test_time();
//getDiskFreeSpaceInfo();

get_date();

function get_date(){
    echo date("l");
}



function getDiskFreeSpaceInfo(){
    $df = disk_free_space("/");
    $df = $df / 1024 / 1024 / 1024;
    return $df;
}

function test_time(){
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}


function test_strpos(){
    $mystring = '192.168.12.5';
    $findme   = '.';

    echo substr($mystring, 0, strrpos($mystring, $findme));
}

function test_string(){
    $client01 = "RK9-2-17";
    $client02 = "RK9-2-165";

    if($client01 > $client02)
        echo "$client01 > $client02";
    else
        echo "$client01 < $client02";


    $clientNew =  $client01+1;
    echo "</br>";

    echo $clientNew;

}

function test_empty(){
    $taskArray = array("down"=>null, "begin"=>null);

    print_r($taskArray);

    if(empty($taskArray)){
        echo "taskArray is empty";
    }else{
        echo "taskArray not empty";
    }
}


function test_http_referer(){
    echo "test_http_referer coming";
    echo "<br>";
    echo $_SERVER['HTTP_REFERER'];
}

function test_array_unique(){
    $arr=array();
    while(count($arr)<10)
    {
        $arr[]=rand(1,10);
        $arr=array_unique($arr);
    }
    echo implode(" ",$arr);
}

function test_shuffle(){
    $arr=range(1,10);
//    shuffle($arr);
//    foreach($arr as $values)
//    {
//        echo $values." ";
//    }
    print_r($arr);
}

function test_rand_int(){
    $isFirstChannel =1;

    $rand = mt_rand(0, 100);
    if ($rand <= 50) {
        $isFirstChannel = 0;
    }

    echo "rand:".$rand." | isFirstChannel:".$isFirstChannel;
}

function test_strtotime(){
//    $cdate = date("Y-m-d");
//    $idate = strtotime($cdate);
//
//    echo "cdate:".$cdate."</br>";
//    echo "idate".$idate."</br>";

//    $beginYesterday = mktime(0,0,0,date('m'),date('d')-1,date('Y'));
//    echo $beginYesterday;


    echo time() - 10*60;

}

function test_array(){

//    $apkid_array = array(100, 102,);

    $client_array[] = 200;
//    $client_array[] = 205;

    print_r($client_array);

    foreach($client_array as $client_id){

        echo "client_id: ".$client_id."</br>";
    }

//    print_r($apkid_array);
}

function test_floor(){

    $channel = 2475001;


    $floor_channel = floor($channel/100);

    echo $channel."</br>";
    echo $floor_channel."</br>";
}


function test_date(){

    $cur_day = date("Y-m-d", time());
    echo "cur_day: $cur_day"."</br>";

    $after_day1 = date("Y-m-d",strtotime( " +1 day"));
    echo "after_day1: $after_day1"."</br>";

    $after_day3 = date("Y-m-d",strtotime( " +3 day"));
    echo "after_day3: $after_day3"."</br>";

    $after_day7 = date("Y-m-d",strtotime( " +7 day"));
    echo "after_day7: $after_day7"."</br>";

    $before_day1 = date("Y-m-d",strtotime( " -1 day"));
    echo "before_day1: $before_day1"."</br>";

    $before_day3 = date("Y-m-d",strtotime( " -3 day"));
    echo "before_day3: $before_day3"."</br>";

    $before_day7 = date("Y-m-d",strtotime( " -7 day"));
    echo "before_day7: $before_day7"."</br>";


    $before_day15 = date("Y-m-d",strtotime( " -15 day"));
    echo "before_day15: $before_day15"."</br>";


    $before_day1_date = strtotime(date("Y-m-d",strtotime( " -1 day")));
    echo "before_day1_date: $before_day1_date"."</br>";

    $before_day3_date = strtotime(date("Y-m-d",strtotime( " -3 day")));
    echo "before_day3_date: $before_day3_date"."</br>";

    $before_day7_date = strtotime(date("Y-m-d",strtotime( " -7 day")));
    echo "before_day7_date: $before_day7_date"."</br>";

}