<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户列表</title>
</head>
<body>
<div>
    <form name="fuser_list" id="fuser_list" method="post" action="<?php echo U(Index/user_list);?>">
        <label>注册时间 从</label>
        <input name="installtime_begin" id="installtime_begin" type="date" value="2016/07/28" width="100px">
        <label>到</label>
        <input name="installtime_end" id="installtime_end" type="date" value="2017/07/29" width="100px">
        <input name="user_count" id="user_count" type="submit" value="查&nbsp询">
    </form>
</div>
<div>
    <table border="solid 1px">
        <tr>
            <th width="30%">注册时间</th>
            <th width="10%">用户ID</th>
            <th width="10%">余额</th>
            <th width="10%">积分</th>
            <th width="20%">操作</th>
        </tr>
        <?php if(is_array($user_list)): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vulist): $mod = ($i % 2 );++$i;?><tr>
                <td align="center">
                    <?php
 $time=<?php echo ($vulist['registertime']); ?>;
                    echo date("Y-m-d h:i:s", $time);
                  ?>
                </td>
                <td align="center"><?php echo ($vulist['userid']); ?></td>
                <td align="center"><?php echo ($vulist['totalmoney']); ?></td>
                <td align="center"><?php echo ($vulist['score']); ?></td>
                <td align="center"><a href="user_detail.html">管理</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<script>
    function utime_to_date(utime){
        var d = new Date(utime * 1000);    //根据时间戳生成的时间对象
        var date = (d.getFullYear()) + "-" +
                (d.getMonth() + 1) + "-" +
                (d.getDate()) + " " +
                (d.getHours()) + ":" +
                (d.getMinutes()) + ":" +
                (d.getSeconds());
        return date;
    }
</script>
</body>
</html>