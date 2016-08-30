<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title><?php echo ($Title); ?> - <?php echo ($Powered); ?></title>
<link rel="stylesheet" href="./statics/extres/install/css/install.css?v=9.0" />
</head>
<body>
<div class="wrap">
  <div class="header">
    <h1 class="logo">logo</h1>
    <div class="icon_install">安装向导</div>
    <div class="version"><?php echo C('SHUIPF_VERSION');?></div>
  </div> 
  <section class="section">
    <div class="">
      <div class="success_tip cc"> <a href="<?php echo U('Admin/Index/index');?>" class="f16 b">安装完成，进入后台管理</a>
        <p>进入后台以后，第一件事是<font color="#FF0000">更新网站缓存</font>，不然有些功能不正常！<p>
        <p>在线手册：<a href="http://document.shuipfcms.com/" target="_blank">http://document.shuipfcms.com/</a> <br>官网支持站点：<a href="http://www.shuipfcms.com/" target="_blank">http://www.shuipfcms.com/</a> <br>作者博客：<a href="http://www.abc3210.com/" target="_blank">http://www.abc3210.com/</a></p>
        <p style="color:#F00"><b>如果本程序对您有所帮助，那么我非常期待您能够热情的捐赠鼓励～正如您支持其他开源项目一样。</b><p>
        <p><b>捐赠鼓励：<a href="https://www.alipay.com/" target="_blank" style="color:#F00">支付宝帐号:gongjingpingde@163.com</a> 有支持，才有持续更新的动力o(∩_∩)o </b><p>
      </div>
      <div class=""> </div>
    </div>
  </section>
</div>
<div class="footer"> &copy; 2012 - <?php echo date("Y");?> <a href="http://www.shuipfcms.com" target="_blank">http://www.shuipfcms.com</a>（ShuipFCMS内容管理系统） </div> 
</body>
</html>