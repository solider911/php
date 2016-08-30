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
<style>
.design_page li {
	height: 218px;
}
</style>
<div class="wrap J_check_wrap">
  <?php  $getMenu = isset($Custom)?$Custom:D('Admin/Menu')->getMenu(); if($getMenu) { ?>
<div class="nav">
  <?php
 if(!empty($menuReturn)){ echo '<div class="return"><a href="'.$menuReturn['url'].'">'.$menuReturn['name'].'</a></div>'; } ?>
  <ul class="cc">
    <?php
 foreach($getMenu as $r){ $app = $r['app']; $controller = $r['controller']; $action = $r['action']; ?>
    <li <?php echo $action==ACTION_NAME ?'class="current"':""; ?>><a href="<?php echo U("".$app."/".$controller."/".$action."",$r['parameter']);?>" <?php echo $r['target']?'target="'.$r['target'].'"':"" ?>><?php echo $r['name'];?></a></li>
    <?php
 } ?>
  </ul>
</div>
<?php } ?>
  <div class="mb10 cc">共 <span class="org"><?php echo ($count); ?></span> 套模板</div>
  <div class="design_page">
    <ul class="cc">
    <?php if(is_array($themes)): $i = 0; $__LIST__ = $themes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
        <div class="img"><a title="点击进行模板主题切换" href="<?php echo U("Template/Theme/chose",array("theme"=>$vo[name]));?>"><img src="<?php echo ($vo["preview"]); ?>" width="210" height="140" lt="<?php echo ($vo["name"]); ?>"></a></div>
        <div class="title" title="default"><?php echo ($vo["name"]); ?></div>
        <div class="ft"> <span class="org"><?php if($vo['use']==1): ?><i>已使用</i><?php else: ?><a href="<?php echo U("Template/Theme/chose",array("theme"=>$vo[name]));?>">未使用</a><?php endif; ?></span></div>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
</div>
</body>
</html>