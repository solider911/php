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
  <form name="myform" class="J_ajaxForm" action="<?php echo U('delete');?>" method="post">
  <div class="table_list">
  <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="50"  align="center"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x" onClick="selectall('tagid[]');">全选</td>
            <td width="50">排序</td>
            <td>Tags名称</td>
            <td align="center" width="50">信息总数</td>
            <td align="center" width="50">点击次数</td>
            <td align="center" width="120">最后使用时间</td>
            <td align="center" width="120">最近访问时间</td>
            <td align="center" width="80">相关操作</td>
          </tr>
        </thead>
        <tbody>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td width="50"><input type="checkbox" value="<?php echo ($vo["tagid"]); ?>" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="tagid[]"><?php echo ($vo["tagid"]); ?></td>
            <td><input type="text" name="listorder[<?php echo ($vo["tagid"]); ?>]" class="input" value="<?php echo ($vo["listorder"]); ?>" size="5" /></td>
            <td><?php echo ($vo["tag"]); ?></td>
            <td align="center"><?php echo ($vo["usetimes"]); ?></td>
            <td align="center"><?php echo ($vo["hits"]); ?></td>
            <td align="center"><?php echo (date("Y-m-d H:i:s",$vo["lastusetime"])); ?></td>
            <td align="center"><?php echo (date("Y-m-d H:i:s",$vo["lasthittime"])); ?></td>
            <td align="center">
            <?php
 $op = array(); if(\Libs\System\RBAC::authenticate('edit')){ $op[] = '<a href="'.U('Tags/edit',array('tagid'=>$vo['tagid'])).'">修改</a>'; } if(\Libs\System\RBAC::authenticate('delete')){ $op[] = '<a class="J_ajax_del" href="'.U('Tags/delete',array('tagid'=>$vo['tagid'])).'">删除</a>'; } echo implode(" | ",$op); ?>
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
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit" data-action="<?php echo U('index');?>">排序</button>
        <?php
 if(\Libs\System\RBAC::authenticate('delete')){ ?>
        <button class="btn  mr10 J_ajax_submit_btn" type="submit">删除</button>
        <?php
 } ?>
      </div>
    </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js?v"></script>
</body>
</html>