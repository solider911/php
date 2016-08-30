<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <style type="text/css">
        #form1
        {
            width:500px;
            height:250px;
            margin:20px auto;
            border:1px #039 solid;
            padding:20px 20px;
        }
    </style>
    <script type='text/javascript'>
        function freshVerify()
        {
            document.getElementByIdx_x('verifyImg').src='/thinkphp_environment/index.php/Home/Index/verify/'+Math.random();
        }
    </script>
</head>
<body>
<form name="form1" id="form1" method="post" action="/thinkphp_environment/index.php/Home/Index/insert">
    注册帐号：<br /><br />
    帐号：<input type="text" name="user" id="user" maxlength="16" /><br /><br />
    密码：<input type="password" name="password" id="password" maxlength="16" /><br /><br />
    Q&nbsp;&nbsp;Q：<input type="text" name="qq" id="qq" maxlength="16" /><br /><br />

    验证码:<input type='text' name='verifyTest' size="5">
    <img style='cursor:pointer' title='刷新验证码' src='/thinkphp_environment/index.php/Home/Index/verify' id='verifyImg' onClick='freshVerify()'/> <br /><br />

    <input type="submit" name="btn1" id="btn1" value="提交" />
    <input type="reset" name="btn2" id="btn2" value="重置" />
</form>
</body>
</html>