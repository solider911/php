<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录</title>
    <style type="text/css">
        #flogin
        {
            width:250px;
            height:250px;
            margin:20px auto;
            border:1px #039 solid;
            padding:20px 20px;
        }
    </style>
</head>
<body>
<form name="login" id="flogin" method="post" action="/thinkphp_environment/index.php/Home/Admin/login">
    帐号：<input type="text" name="username" id="user" maxlength="16" /><br /><br />
    密码：<input type="password" name="password" id="pwd" maxlength="16" /><br /><br />
    <input type="submit" name="btn1" id="btn1" value="登录" />
</form>
</body>
</html>