<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display();
    }

    /**
     * 数据库链接测试接口
     */
    public function test(){

        $cdate = date("Y-m-d", time());
        $table_client_run = M("ClientRun");
        $ret_client_runs = $table_client_run->where("date='$cdate'")->select();

        foreach($ret_client_runs as $runs){
            echo $runs['date']." ".$runs['client_id']." ".$runs['run_nums']."</br>";
        }
    }

    public function sign_up(){
        $this->display();
    }

    /**
     * 登录接口
     */
    public function sign_in(){
        $username   = $_POST["username"];
        $password   = $_POST["password"];

        if($username && $password){
            $condition['username'] = $username;
            $condition['password'] = $password;

//            print_r($condition);

            $ret_admin =  M('Admin')->where($condition)->find();

            if($ret_admin){
                // 登录成功
//                $this->display("index");
//                $this->display("sign_up");
                $this->redirect("main");
            }else{
                $this->display();
            }
        }
        else{
            $this->display();
        }
    }


    public function main(){
        $this->display();
    }


}