<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/8
 * Time: 13:47
 */


//if (! is_dir ( $target )) {
//    mkdir ( $target, 0777, true );
//}

//$context = file_get_contents("zip_ins.txt");
//
//$fp = fopen("zip_ins.txt", "r");
//if($fp)
//{
//    for($i=1;! feof($fp);$i++)
//    {
//        $src_zip = fgets($fp);
//        $des_zip = $target.strrchr($src_zip, '/');
//
//        copy($src_zip, $des_zip);
//        //echo $src_zip."==>". $des_zip."<br />";
//        //echo fgets($fp). "<br />";
//    }
//}
//else
//{
//    echo "打开文件失败";
//}
//fclose($fp);

$target = "sohu_23465";
$orgin_dir = "uploads/sohu_23465.apk/2016-09-07";

$a = file('./zip_ins.txt');
foreach($a as $line => $content){
    $zipname = str_replace("\r\n","",$content);
    $src_zip = $orgin_dir.$zipname;
    $des_zip = $target.$zipname;

    if(file_exists($src_zip)){
        copy($src_zip, $des_zip);
        //echo $src_zip."==>". $des_zip."<br />";
    }
}

echo "upfile.com zip_ins leaving..";