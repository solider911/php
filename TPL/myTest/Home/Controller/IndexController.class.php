<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function Admin(){
        $view_user = D('Admin');
        $list_user = $view_user->select();
        //print_r($list_login);

        $this->assign('admin', $list_user);
        $this->display();
    }

    public function login(){
        header("Content-Type:text/html; charset=utf-8");
        $username   = $_POST["username"];
        $password   = $_POST["password"];

        if(isset($username) && isset($password)){
            $condition['username'] = $username;
            $condition['password'] = $password;

            $chb_user = M('Admin');
            $list_user = $chb_user->where($condition)->select();
            if($list_user){
                // 登录成功
                //$this->assign('admin', $list_user);
                //$this->display('admin');

                $this->display("main");

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

    public function user_newtask(){
        //print_r($_POST);
        $installtime_begin = $_POST['installtime_begin'];
        $installtime_end   = $_POST['installtime_end'];

        if($installtime_begin && $installtime_end){
           // echo "installtime_begin: $installtime_begin   installtime_end: $installtime_end"."</br>";

            $btime = strtotime($installtime_begin );
            $etime = strtotime($installtime_end );

            $chb_user = M('User');
            $chb_newusertask = M("Newusertask");
            $new_user_count = $chb_user->where("registerTime between $btime and $etime")->field("count(userID) as ucount")->select();
            $new_user_step = $chb_newusertask->field('taskStepID, count(taskStepID) as scount')->where("registerTime between $btime and $etime")->group('taskStepID')->select();

            $this->assign('user', $new_user_count);
            $this->assign('step', $new_user_step);
            $this->display();
        }
        else{
            $this->display();
        }
     }

    public function user_list(){
        $installtime_begin = $_POST['installtime_begin'];
        $installtime_end   = $_POST['installtime_end'];

        if($installtime_begin && $installtime_end){
            $btime = strtotime($installtime_begin );
            $etime = strtotime($installtime_end );

            $chb_user = M('User');
            $user_list = $chb_user->where("registerTime between $btime and $etime")
                ->field("userID, registerTime, totalMoney, score")
                ->select();

            foreach($user_list as $row_user){
                $row_user['registertime'] = date("Y-m-d h:i:s", $row_user['registertime']);
            }

            $this->assign('user_list', $user_list);
            $this->display();

        }else{
            $this->display();
        }
    }




    public function test(){
        $view_login = D('Login');
        $user['username'] = "addtest";
        $user['password'] = 'addtest';
        $id = $view_login->add($user);
        //print_r($list_login);

        if($id){
            // 页面跳转目标地址
            //$this->assign("jumpUrl","Index/index");
            //$this->success("插入数据 id 为：$id");

            $this->redirect('login','');
        }else{
            header("Content-Type:text/html; charset=utf-8");
            exit($view_login->getError().' [ <A HREF="javascript:history.back()">返 回</A> ]');
        }
    }

    public function score10(){
        $filehandle = fopen("lock.txt", "w");
        if(flock($filehandle, LOCK_EX)){
            echo 'lock file success, score10 coming...'."<br/>";
            $tab_score = M('Score');
            $score = array();
            for($i=10; $i<20; $i++){
                $time = date('Y-m-d h:i:s', time());
                $score['score'] = $i;
                $score["auther"] = "score10";
                $score['time'] = "$time";
                $tab_score->data($score)->add();
                sleep(1);
            }
            flock($filehandle, LOCK_UN);    // 释放锁定
        }else{
            echo 'lock file fieled'."<br/>";
        }
        echo 'score10 over!';
    }

    public function tdate(){
        //$date = date("Y-m-d");

        $turl = U("ww");

        echo $turl;
    }

    public function rwitetest(){
        echo "haha";
    }

    public  function insert_now(){

        $time = date("Y-m-d H:i:s", time());
        echo $time;
        return;

        $sql_score = "insert into chb_score (score, auther, time) VALUES (1232,\"chb\", $time)";
        mysql_query($sql_score);

        echo $sql_score;
    }


    public function tCount(){

        $table_score = M("Score");
        $ret_score = $table_score->where("auther='score100'")->select();

        echo count($ret_score);

    }

}