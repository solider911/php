<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <table border="1">
        <tr>
            <th width="10%">ID</th>
            <th width="15%">用户名</th>
            <th width="15%">密码</th>
        </tr>
        <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td align="center"><?php echo ($vo['id']); ?></td>
                <td><?php echo ($vo['username']); ?></td>
                <td><?php echo ($vo['password']); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</body>
</html>