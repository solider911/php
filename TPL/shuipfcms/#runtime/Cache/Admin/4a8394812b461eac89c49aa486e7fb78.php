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
<body>
<div class="wrap">
  <div id="home_toptip"></div>
  <h2 class="h_a">系统信息</h2>
  <div class="home_info">
    <ul>
      <?php if(is_array($server_info)): $i = 0; $__LIST__ = $server_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li> <em><?php echo ($key); ?></em> <span><?php echo ($vo); ?></span> </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <h2 class="h_a">开发团队</h2>
  <div class="home_info" id="home_devteam">
    <ul>
      <li> <em>版权所有</em> <span><a href="http://www.shuipfcms.com" target="_blank">http://www.shuipfcms.com/</a></span> </li>
      <li> <em>负责人</em> <span>水平凡</span> </li>
      <li> <em>微博</em> <span><a href="http://t.qq.com/shuipf" target="_blank">http://t.qq.com/shuipf</a></span> </li>
      <li> <em>联系邮箱</em> <span>admin@abc3210.com</span> </li>
      <li> <em>捐赠</em> <span>您因如果使用ShuipFCMS而受益或者感到愉悦，您还可以这样帮助ShuipFCMS成长~<br/>捐赠：<a href="https://www.alipay.com/" target="_blank">支付宝帐号：gongjingpingde@163.com</a></span> </li>
      <li> <em><font color="#0000FF">在线使用手册</font></em> <span><a href="http://document.shuipfcms.com/" target="_blank">http://document.shuipfcms.com/</a></span> </li>
    </ul>
  </div>
  <h2 class="h_a" style="display:none">问题反馈</h2>
  <div class="table_full" style="display:none">
  <form method="post" action="http://www.abc3210.com/index.php?g=Formguide&a=post" id="RegForm" name="RegForm">
  <table width="100%" class="table_form">
  <input type="hidden" name="formid" value="4"/>
		<tr>
			<th width="80">类型<font color="red">*</font></th> 
			<td><select name='info[type]' id='type' ><option value="1" >意见反馈</option><option value="2" >Bug反馈</option></select></td>
		</tr>
        <tr>
			<th width="80">反馈者<font color="red">*</font></th> 
			<td><input type="text" name="info[name]"  class="input" id="name" /></td>
		</tr>
		<tr>
			<th>联系邮箱<font color="red">*</font></th> 
			<td><input type="text" name="info[email]"  class="input" id="email" /></td>
		</tr>
        <tr>
			<th>反馈内容<font color="red">*</font></th> 
			<td><textarea id="content" name="info[content]" style="width:600px; height:150px;"></textarea></td>
		</tr>
	</table>
  </div>
  <div class="" style="display:none">
      <div class="btn_wrap_pd">             
        <button class="btn btn_submit mr10" type="submit">提交</button>
      </div>
  </div>
  </form>
</div>
<script src="<?php echo ($config_siteurl); ?>statics/js/common.js"></script> 
<script src="<?php echo ($config_siteurl); ?>statics/js/artDialog/artDialog.js"></script> 
<script>
$("#btn_submit").click(function(){
	$("#tips_success").fadeTo(500,1);
});
artDialog.notice = function (options) {
    var opt = options || {},
        api, aConfig, hide, wrap, top,
        duration = 800;
        
    var config = {
        id: 'Notice',
        left: '100%',
        top: '100%',
        fixed: true,
        drag: false,
        resize: false,
        follow: null,
        lock: false,
        init: function(here){
            api = this;
            aConfig = api.config;
            wrap = api.DOM.wrap;
            top = parseInt(wrap[0].style.top);
            hide = top + wrap[0].offsetHeight;
            
            wrap.css('top', hide + 'px')
                .animate({top: top + 'px'}, duration, function () {
                    opt.init && opt.init.call(api, here);
                });
        },
        close: function(here){
            wrap.animate({top: hide + 'px'}, duration, function () {
                opt.close && opt.close.call(this, here);
                aConfig.close = $.noop;
                api.close();
            });
            
            return false;
        }
    };	
    
    for (var i in opt) {
        if (config[i] === undefined) config[i] = opt[i];
    };
    
    return artDialog(config);
};
$(function(){
	$.getJSON('<?php echo U("public_server");?>',function(data){
		if(data.state != 'fail'){
			return false;
		}
		if(data.latestversion.status){
			art.dialog({
				title:'升级提示',
				 icon: 'warning',
				content: '系统检测到新版本发布，请尽快更新到 '+data.latestversion.version.version + '，以确保网站安全！',
				cancelVal: '关闭',
				cancel: true
			});
		}
		if(data.license.authorize){
			$('#server_license').html(data.license.name);
		}else{
			$('#server_license').html('非授权用户');
		}
		$('#server_version').html(data.latestversion.version.version);
		$('#server_build').html(data.latestversion.version.build);
		
		if(data.notice.id > 0){
			art.dialog.notice({
				title: data.notice.title,
				width: 400,// 必须指定一个像素宽度值或者百分比，否则浏览器窗口改变可能导致artDialog收缩
				content: data.notice.content,
				close:function(){
					setCookie('notice_'+data.notice.id,1,30);
				}
			});
		}
	});
});
</script>
</body>
</html>