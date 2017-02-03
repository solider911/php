<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/20
 * Time: 11:44
 */

date_default_timezone_set(PRC);




get_return_date(1);
get_return_date(20);



function get_return_date($returnDay){
//    echo "日期：".date("Y-m-d",strtotime( " -$returnDay day"))."</br>";
//    echo "时间戳：".strtotime(date("Y-m-d",strtotime( " -$returnDay day")))."</br>";

    echo "日期：".date("Y-m-d", mktime(0,0,0,date('m'),date('d')-$returnDay, date('Y')))."</br>";
    echo "时间戳：".mktime(0,0,0,date('m'),date('d')-$returnDay, date('Y'))."</br>";

}


//phpinfo();
//echo "chuizi";
//echo PHP_VERSION;
//echo "锤子";