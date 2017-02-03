<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/21
 * Time: 19:29
 */
include C("PUBLIC_RESOURSE")."phpqrcode/phpqrcode.php";
$value = "www.baidu.com"; //二维码内容
$errorCorrectionLevel = 'L';//容错级别
$matrixPointSize = 6;//生成图片大小
//生成二维码图片
QRcode::png($value, "qrcode_share.png", $errorCorrectionLevel, $matrixPointSize, 2);