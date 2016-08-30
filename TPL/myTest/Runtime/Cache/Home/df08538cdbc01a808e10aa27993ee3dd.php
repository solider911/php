<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新手任务</title>
</head>
<body>
    <div>
        <form name="login" id="flogin" method="post" action="<?php echo U(Index/user_newtask);?>">
            <label>注册时间 从</label>
            <input name="installtime_begin" id="installtime_begin" type="date" value="2016/07/28" width="100px">
            <label>到</label>
            <input name="installtime_end" id="installtime_end" type="date" value="2017/07/29" width="100px">
            <input name="user_count" id="user_count" type="submit" value="查&nbsp询">
        </form>
    </div>
    <div>
        <div name="user"width="20%" style="border: 1px; border-color: red">
            新增用户数：<?php echo ($user[0]['ucount']); ?> 锤子额
        </div>
       <table border="solid 1px">
           <tr>
               <th width="10%">任务步骤</th>
               <th width="15%">当前数量</th>
               <th width="15%">占比</th>
           </tr>
           <?php if(is_array($step)): $i = 0; $__LIST__ = $step;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vstep): $mod = ($i % 2 );++$i;?><tr>
                   <td align="center"><?php echo ($vstep['taskstepid']); ?></td>
                   <td align="center"><?php echo ($vstep['scount']); ?></td>
                   <td align="center">10%</td>
               </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       </table>
    </div>
</body>
</html>