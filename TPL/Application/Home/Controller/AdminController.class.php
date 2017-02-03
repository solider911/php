<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/26
 * Time: 18:49
 */

namespace Home\Controller;


use Think\Controller;
use Org\Util\AjaxPage;
include "Common/function.php";


// http://localhost/TPL/index.php?c=admin&a=

class AdminController extends Controller
{
    public function _empty()
    {
        echo "no way!";
    }

    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function Admin(){
        $view_user = D('Login');
        $list_user = $view_user->select();
        //print_r($list_login);

        $this->assign('Admin/admin', $list_user);
        $this->display();
    }

    public function login(){
        header("Content-Type:text/html; charset=utf-8");
        $username   = $_POST["username"];
        $password   = $_POST["password"];

        if($username && $password){
            $condition['username'] = $username;
            $condition['password'] = $password;

            $chb_user = M('Login');
            $list_user = $chb_user->where($condition)->find();
            if($list_user){
                // 登录成功
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
            $new_user_step = $chb_newusertask->field('taskStepID, count(taskStepID) as scount')
                ->where("registerTime between $btime and $etime")
                ->group('taskStepID')
                ->select();

            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);
            $this->assign('user', $new_user_count);
            $this->assign('step', $new_user_step);
            $this->display();
        }
        else{
            $installtime_begin = date("Y-m-d", time()-24*60*60);
            $installtime_end = date("Y-m-d", time());
            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);
            $this->display();
        }
    }

    public function user_list_page(){
        $installtime_begin = $_POST['installtime_begin'];
        $installtime_end   = $_POST['installtime_end'];

        if($installtime_begin && $installtime_end){
            $btime = strtotime($installtime_begin );
            $etime = strtotime($installtime_end );

            $table_user = M('User');
            $where_user['registerTime'] = array(array('gt', $btime), array('lt', $etime));

            $user_count = $table_user->where($where_user)->count();  // 查询满足要求的总记录数
            $p = getpage($user_count,20); // 实例化分页类
            //$p = new \Think\Page($user_count, 10); // 实例化分页类
            // $p = new AjaxPage($user_count, 10); // 实例化分页类
            $page = $p->show();

            // 进行分页数据查询, limit 方式
            $user_list = $table_user->field("userID,nickname, registerTime, totalMoney, score")
                ->where($where_user)
                ->order('userID desc')
                ->limit($p->firstRow.','. $p->listRows)
                ->select();

            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);
            $this->assign('user_list', $user_list); // 赋值数据集
            $this->assign('user_page', $page); // 赋值分页输出
            $this->display();

//            //ajax返回信息
//            $res02["content"] = $this->fetch('Admin:user_list');
//            $this->ajaxReturn($res02);

        }else{
            $installtime_begin = date("Y-m-d", time()-24*60*60);
            $installtime_end = date("Y-m-d", time());
            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);
            $this->display();
        }
    }

    public function user_list(){
        $installtime_begin = $_POST['installtime_begin'];
        $installtime_end   = $_POST['installtime_end'];

        if($installtime_begin && $installtime_end){
            $btime = strtotime($installtime_begin );
            $etime = strtotime($installtime_end );

            $table_user = M('User');
            $where_user['registerTime'] = array(array('gt', $btime), array('lt', $etime));

            $user_list = $table_user->field("userID,masterID,nickname, registerTime, totalMoney, score")
                ->where($where_user)
                ->order('userID desc')
                ->select();


            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);
            $this->assign('user_list', $user_list);
            $this->display();

        }else{
            $installtime_begin = date("Y-m-d", time()-24*60*60);
            $installtime_end = date("Y-m-d", time());
            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);
            $this->display();
        }
    }

    public function user_opinion(){
        $backtime_begin = $_POST['backtime_begin'];
        $backtime_end   = $_POST['backtime_end'];

        if($backtime_begin && $backtime_end){
            $btime = strtotime($backtime_begin );
            $etime = strtotime($backtime_end );

            $table_opinion = M('Opinion');
            $where_opinion['backtime'] = array(array('gt', $btime), array('lt', $etime));

            $opinion_list = $table_opinion
                ->join("app_user on app_user.userID=app_opinion.userID")
                ->field("app_user.userID, app_user.nickname, app_opinion.opinion, app_opinion.version, app_opinion.backtime")
                ->where($where_opinion)
                ->order('backtime desc')
                ->select();


            $this->assign('backtime_begin', $backtime_begin);
            $this->assign('backtime_end', $backtime_end);
            $this->assign('user_opinion', $opinion_list);
            $this->display();

        }else{
            $backtime_begin = date("Y-m-d", time()-24*60*60);
            $backtime_end = date("Y-m-d", time());
            $this->assign('backtime_begin', $backtime_begin);
            $this->assign('backtime_end', $backtime_end);
            $this->display();
        }
    }

    public function user_detail(){
        $user_search = $_POST['search_user'];
        if($user_search){
            $tab_user = M("User");

            // 用户基本信息查询
            $tab_user = $tab_user->field("userID, masterID, registerTime,score, totalMoney")->where("userID=$user_search")->find();
            if($tab_user){
                $this->assign("user_search", $user_search);
                $this->assign("user_base", $tab_user);
            }

            $tab_user_score_platform = M("ScorePlatform")
                ->field("platformID, platformScore")
                ->where("userID=$user_search")
                ->select();


            // 用户积分详情
            foreach($tab_user_score_platform as $row_score_platform){
                switch($row_score_platform['platformID']){
                    case 1:$row_score_platform["platformID"] = "积分墙有米";$arr_score_platform[] = $row_score_platform;break;
                    case 2:$row_score_platform["platformID"] = "积分墙趣米";$arr_score_platform[] = $row_score_platform;break;
                    case 3:$row_score_platform["platformID"] = "积分墙万普";$arr_score_platform[] = $row_score_platform;break;
                    case 4:$row_score_platform["platformID"] = "积分墙点乐";$arr_score_platform[] = $row_score_platform;break;
                    case 5:$row_score_platform["platformID"] = "积分墙多盟";$arr_score_platform[] = $row_score_platform;break;
                    case 6:$row_score_platform["platformID"] = "积分墙千速";$arr_score_platform[] = $row_score_platform;break;
                    case 7:$row_score_platform["platformID"] = "积分墙点财";$arr_score_platform[] = $row_score_platform;break;
                    case 8:$row_score_platform["platformID"] = "积分墙中亿";$arr_score_platform[] = $row_score_platform;break;
                    default:break;
                }
            }

            if($arr_score_platform)
                $this->assign("user_score", $arr_score_platform);

            // 用户师徒信息
            $user_pupillist = M("User")->field("userID, registerTime")->where("masterID=$user_search")->select();
            if($user_pupillist)
                $this->assign("user_pupillist", $user_pupillist);

            $this->display();
        }else{
            $this->display();
        }
    }


    public function user_withdraw(){
        $installtime_begin = $_POST['installtime_begin'];
        $installtime_end   = $_POST['installtime_end'];
        $withdraw_stat = $_POST['withdraw_stat'];

        if($installtime_begin && $installtime_end){
            $btime = strtotime($installtime_begin );
            $etime = strtotime($installtime_end );
            $table_withdraw = M("Withdraw");

            $result_withdraw = $table_withdraw->field("userID,userWithdrawTime,withdrawMoney,withdrawType,withdrawAccount,withdrawStatus")
                ->where("withdrawStatus=$withdraw_stat and userWithdrawTime between $btime and $etime")
                ->select();

            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);

            $this->assign("user_withdraw",$result_withdraw );
            $this->display();

        }else{
            $installtime_begin = date("Y-m-d", time()-24*60*60);
            $installtime_end = date("Y-m-d", time());
            $this->assign('installtime_begin', $installtime_begin);
            $this->assign('installtime_end', $installtime_end);
            $this->display();
        }
    }

    // 自接包广告管理
    public function sadv_add(){
        $this->display();
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
}