<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title><?php echo ($Title); ?> - <?php echo ($Powered); ?></title>
<link rel="stylesheet" href="./statics/extres/install/css/install.css?v=9.0" />
<script type="text/javascript" src="./statics/extres/install/js/jquery.js"></script>
</head>
<body>
<div class="wrap">
  <div class="header">
    <h1 class="logo">logo</h1>
    <div class="icon_install">安装向导</div>
    <div class="version"><?php echo C('SHUIPF_VERSION');?></div>
  </div> 
  <section class="section">
    <div class="step">
      <ul>
        <li class="current"><em>1</em>检测环境</li>
        <li><em>2</em>创建数据</li>
        <li><em>3</em>完成安装</li>
      </ul>
    </div>
    <div class="server">
      <table width="100%">
        <tr>
          <td class="td1">环境检测</td>
          <td class="td1" width="25%">推荐配置</td>
          <td class="td1" width="25%">当前状态</td>
          <td class="td1" width="25%">最低要求</td>
        </tr>
        <tr>
          <td>操作系统</td>
          <td>类UNIX</td>
          <td><span class="correct_span">&radic;</span> <?php echo ($os); ?></td>
          <td>不限制</td>
        </tr>
        <tr>
          <td>PHP版本</td>
          <td>>5.3.x</td>
          <td><span class="correct_span">&radic;</span> <?php echo ($phpv); ?></td>
          <td>5.3.0</td>
        </tr>
        <tr>
          <td>MySQL版本（client）</td>
          <td>>5.x.x</td>
          <td><?php echo ($mysql); ?></td>
          <td>5.2</td>
        </tr>
        <tr>
          <td>附件上传</td>
          <td>>2M</td>
          <td><?php echo ($uploadSize); ?></td>
          <td>不限制</td>
        </tr>
        <tr>
          <td>SESSION</td>
          <td>开启</td>
          <td><?php echo ($session); ?></td>
          <td>开启</td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td class="td1">函数支持检测</td>
          <td class="td1" width="25%">当前环境</td>
          <td class="td1" width="25%">程序要求</td>
        </tr>
       <?php if(is_array($function)): $i = 0; $__LIST__ = $function;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><tr>
          <td><?php echo ($key); ?></td>
          <td><?php if($rs): ?><span class="correct_span">&radic;</span>支持<?php else: ?><span class="correct_span error_span">&radic;</span>不支持<?php endif; ?></td>
          <td><span class="correct_span">&radic;</span>支持</td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      <table width="100%">
        <tr>
          <td class="td1">目录、文件权限检查</td>
          <td class="td1" width="25%">写入</td>
          <td class="td1" width="25%">读取</td>
        </tr>
       <?php if(is_array($folderInfo)): $i = 0; $__LIST__ = $folderInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rs): $mod = ($i % 2 );++$i;?><tr>
          <td><?php echo ($rs["dir"]); ?></td>
          <td><?php echo ($rs["is_writable"]); ?></td>
          <td><?php echo ($rs["is_readable"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </table>
    </div>
    <div class="bottom tac"> <a href="<?php echo U('step_2');?>" class="btn">重新检测</a><a href="<?php echo U('step_3');?>" class="btn next">下一步</a> </div>
  </section>
</div>
<div class="footer"> &copy; 2012 - <?php echo date("Y");?> <a href="http://www.shuipfcms.com" target="_blank">http://www.shuipfcms.com</a>（ShuipFCMS内容管理系统） </div> 
<script>
$(function(){
	var errSum = <?php echo ($err); ?>;
	if(errSum){
		$('a.next').addClass('btn_old').click(function(){
			alert('环境检测不通过，无法进行下一步！');
			return false;
		});
	}
});
</script>
</body>
</html>