<?php


//$str = " HAHA'sadf -mutlines";
//
//echo <<<END
//    HAHA'sadf
//    -mutlines
//END;

//  定义常量
define("ROOT_LOCATION", "D:\\cgit\\php");

$directory = ROOT_LOCATION;

_debug_out(__LINE__, __FILE__);

echo "file:".__FILE__."<br>";
echo "line:".__LINE__."<br>";
echo "dir:".__DIR__."<br>";
echo "function:".__FUNCTION__."<br>";

_debug_out(__LINE__, __FILE__);


function _debug_out($line, $file){

    echo "This is line ".$line." of file ".$file."<br>";
}


$b=1 ? print "TRUE" : print "FALSE";

echo "<br>";

$came_from = $_SERVER["HTTP_ACCEPT"];

echo phpversion();