<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/30
 * Time: 17:53
 */

date_default_timezone_set(PRC);

$context = file_get_contents("zip_ins.txt");

$fp = fopen("zip_ins.txt", "r");
if($fp)
{
    for($i=1;! feof($fp);$i++)
    {
        echo fgets($fp). "<br />";
    }
}
else
{
    echo "打开文件失败";
}
fclose($fp);