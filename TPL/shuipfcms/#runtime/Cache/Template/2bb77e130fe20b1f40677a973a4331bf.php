<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>系统后台 - <?php echo ($Config["sitename"]); ?> - by ShuipFCMS</title>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?><link href="<?php echo ($config_siteurl); ?>statics/css/admin_style.css" rel="stylesheet" />
<link href="<?php echo ($config_siteurl); ?>statics/js/artDialog/skins/default.css" rel="stylesheet" />
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "<?php echo ($config_siteurl); ?>",
	JS_ROOT: "<?php echo ($config_siteurl); ?>statics/js/"
};
</script>
<script src="<?php echo ($config_siteurl); ?>statics/js/wind.js"></script>
<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js"></script>
</head>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <div class="nav">
    <ul class="cc">
      <li class="current"><a href="<?php echo U('Style/index');?>">模板管理</a></li>
      <?php
 if(\Libs\System\RBAC::authenticate('add')){ ?>
      <li><a href="<?php echo U("Template/Style/add",array("dir"=>urlencode(str_replace('/','-',$dir)) ));?>">在此目录下添加模板</a></li>
      <?php
 } ?>
    </ul>
  </div>
  <div class="table_list">
  <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td align="left">目录列表</td>
            <td align="center"  width="100">操作</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td align="left" colspan="3">当前目录：<?php echo ($local); ?></td>
          </tr>
          <?php if($dir != '' && $dir != '.' ): ?><tr>
            <td align="left" colspan="3"><a href="<?php echo U("Template/Style/index",array("dir"=>urlencode( str_replace(basename($dir).'-','',str_replace('/','-',$dir)) ) ) );?>"><img src="<?php echo ($config_siteurl); ?>statics/images/folder-closed.gif" />上一层目录</a></td>
          </tr><?php endif; ?>
          <?php if(is_array($tplist)): $i = 0; $__LIST__ = $tplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td align="left">
            <?php if( '.'.fileext(basename($vo)) == C('TMPL_TEMPLATE_SUFFIX')): ?><img src="<?php echo ($tplextlist[$vo]); ?>" />
            <a href="<?php echo U("Template/Style/edit",array("dir"=>urlencode(str_replace('/','-',$dir)),"file"=>basename($vo)));?>"><b><?php echo (basename($vo)); ?></b></a></td>
            <td align="center"> 
            <?php
 $op = array(); if(\Libs\System\RBAC::authenticate('edit')){ $op[] = '<a href="'.U("Template/Style/edit",array("dir"=>urlencode(str_replace('/','-',$dir)) ,"file"=>basename($vo))).'">修改</a>'; } if(\Libs\System\RBAC::authenticate('delete')){ $op[] = '<a class="J_ajax_del" href="'.U("Template/Style/delete",array("dir"=>urlencode(str_replace('/','-',$dir)) ,"file"=>basename($vo))).'">删除</a>'; } echo implode(' | ',$op); ?>
            </td>
            <?php elseif(substr($tplextlist[$vo],-strlen($dirico))!=$dirico): ?>
            <img src="<?php echo ($tplextlist[$vo]); ?>" />
            <b><?php echo (basename($vo)); ?></b></td>
            <td></td>
            <?php else: ?>
            <img src="<?php echo ($tplextlist[$vo]); ?>" />
            <a href="<?php echo U("Template/Style/index",array("dir"=>urlencode(str_replace('/','-',$dir).basename($vo).'-') ));?>"><b><?php echo (basename($vo)); ?></b></a></td>
            <td></td><?php endif; ?>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
  </div>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>