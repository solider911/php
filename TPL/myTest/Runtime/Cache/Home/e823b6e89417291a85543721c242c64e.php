<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title>大红包后台管理系统</title>
    <link  rel="stylesheet" href="/thinkphp_environment/css/admin.css" type="text/css">
    <style type="text/css">
      *{margin:0;padding:0;}
    </style>
  </head>
  <body>
    <div id="header">
      <h1>大红包后台管理系统</h1>
    </div>
    <div id="content">
      <div id="menu">
        <h2>管理后台</h2>
        <dl>
          <dt onclick=ShowMenu("DM1")>用户管理</dt>
            <dd id="DM1" style="DISPLAY: none">
              <h5><a href="user_newtask.html" target="rightmain">新手任务</a> </h5>
              <h5><a href="user_list.html" target="rightmain">用户列表</a> </h5>
              <h5><a href="user_flow.html" target="rightmain">流失用户</a> </h5>
              <h5><a href="user_detail.html" target="rightmain">用户详情</a> </h5>
              <h5><a href="user_withdraw.html" target="rightmain">用户提现申请</a> </h5>
            </dd>
          <dt onclick=ShowMenu("DM2")>师徒管理</dt>
            <dd id="DM2" style="DISPLAY: none">
              <h5>单用户详情</h5>
            </dd>
          <dt onclick=ShowMenu("DM3")>广告管理</dt>
            <dd id="DM3" style="DISPLAY: none">
              <h5>分成设置</h5>
              <h5>自接包广告</h5>
              <h5>营收统计</h5>
            </dd>
          <dt onclick=ShowMenu("DM4")>消息管理</dt>
            <dd id="DM4" style="DISPLAY: none">
              <h5>发布消息</h5>
              <h5>推送设置</h5>
            </dd>
        </dl>
      </div>
      <div id="main">
        <iframe name="rightmain" id="rightmain" src="" ></iframe>
      </div>
    </div>
    <div id="footer">
      Copyright localhost
    </div>
    <script language="JavaScript" type="text/javascript">
      function ShowMenu(mid){
        var vmenu = document.getElementById(mid);
        if(vmenu.style.display == "none"){
          vmenu.style.display = "block"
        }else {
          vmenu.style.display = "none"
        }
      }
    </script>
  </body>
</html>