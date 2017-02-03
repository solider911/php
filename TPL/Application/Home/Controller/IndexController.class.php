<?php
namespace Home\Controller;
use Think\Controller;



class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function TPL(){
        echo "TPL";
    }

    public function get_qr(){
        Vendor('phpqrcode.phpqrcode');
        $errorCorrectionLevel =intval(3) ;//容错级别
        $matrixPointSize = intval(6);//生成图片大小
        //生成二维码图片
        //echo $_SERVER['REQUEST_URI'];
        $object = new \QRcode();
        $object->png("www.baidu.com", "res02/qrcode_index.png", $errorCorrectionLevel, $matrixPointSize, 2);
    }

    public function get_pub(){
        echo C("PUBLIC_RESOURSE")."phpqrcode/phpqrcode.php";
    }
}