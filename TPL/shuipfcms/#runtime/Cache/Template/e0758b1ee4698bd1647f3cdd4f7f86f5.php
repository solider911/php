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
  <form action="<?php echo U("Custompage/createhtml");?>" method="post">
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td align="center" width="50"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</td>
            <td align="center" width="40">ID</td>
            <td width="200">名称</td>
            <td>生成路径</td>
            <td align="center" width="120">操作</td>
          </tr>
        </thead>
        <tbody>
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
              <td><input class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="tempid[]" value="<?php echo ($vo["tempid"]); ?>" type="checkbox"></td>
              <td align="center"><?php echo ($vo["tempid"]); ?></td>
              <td><a href="<?php echo (substr($Config["siteurl"],0,-1)); echo ($vo["temppath"]); echo ($vo["tempname"]); ?>" target="_blank" ><?php echo ($vo["name"]); ?></a></td>
              <td><?php echo ($vo["temppath"]); echo ($vo["tempname"]); ?></td>
              <td align="center">
              <?php
 $op = array(); if(\Libs\System\RBAC::authenticate('edit')){ $op[] = '<a href="'.U("Custompage/edit",array('tempid'=>$vo['tempid'])).'">修改</a>'; } if(\Libs\System\RBAC::authenticate('delete')){ $op[] = '<a class="J_ajax_del" href="'.U("Custompage/delete",array('tempid'=>$vo['tempid'])).'">删除</a>'; } if(\Libs\System\RBAC::authenticate('createhtml')){ $op[] = '<a href="'.U("Custompage/createhtml",array('tempid'=>$vo['tempid'])).'">更新</a>'; } echo implode(' | ',$op); ?>
              </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> <?php echo ($Page); ?> </div>
      </div>
    </div>
    <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <label class="mr20"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label> 
        <?php
 if(\Libs\System\RBAC::authenticate('createhtml')){ ?>
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">生成自定义页面</button>
        <?php
 } ?>
      </div>
    </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script>
</body>
</html>