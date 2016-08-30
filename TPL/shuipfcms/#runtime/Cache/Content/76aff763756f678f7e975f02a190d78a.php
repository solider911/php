<?php if (!defined('THINK_PATH')) exit(); if (!defined('SHUIPF_VERSION')) exit(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="canonical" href="<?php echo ($config_siteurl); ?>" />
<title><?php if( isset($SEO['title']) && !empty($SEO['title']) ): echo ($SEO['title']); endif; echo ($SEO['site_title']); ?></title>
<meta name="description" content="<?php echo ($SEO['description']); ?>" />
<meta name="keywords" content="<?php echo ($SEO['keyword']); ?>" />
<link href="<?php echo ($config_siteurl); ?>statics/default/css/index.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($config_siteurl); ?>statics/default/css/layout.css" rel="stylesheet" type="text/css" />
<script src="<?php echo ($config_siteurl); ?>statics/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo ($config_siteurl); ?>statics/default/js/w3cer.js" type="text/javascript"></script>
<base target="_blank" />
</head>
<body>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<div class="top">
  <div class="logo left"> <a href="<?php echo ($config_siteurl); ?>" title="<?php echo ($Config["sitename"]); ?>-国内后起的站长资源门户站"><img src="<?php echo ($config_siteurl); ?>statics/images/hei_logo.png" alt="<?php echo ($Config["sitename"]); ?>-国内后起的站长资源门户站"/></a></div>
  <div class="top_ad right"></div>
  <div style="clear:both"></div>
</div>
<!--top end-->
<div class="nav">
  <div id="nav-menu">
    <div class="container">
      <div class="outerbox">
        <div class="innerbox clearfixmenu">
          <ul class="menu">
            <li class="stmenu">
              <h3><a href="<?php echo ($config_siteurl); ?>" class="xialaguang <?php if( !isset($catid) ): ?>navhovers<?php endif; ?>" title="<?php echo ($Config["sitename"]); ?>"><span>网站首页</span></a></h3>
            </li>
            <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>'0','order'=>'listorder ASC','num'=>'0','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if( $vo['child'] ): ?><!--<?php echo ($vo["catname"]); ?>-->
            <li class="stmenu">
              <h3><a href="<?php echo ($vo["url"]); ?>" class="xialaguang <?php if( in_array($catid,explode(',',$vo['arrchildid'])) ): ?>navhovers<?php endif; ?>" title="<?php echo ($vo["description"]); ?>"><span><?php echo ($vo["catname"]); ?></span></a></h3>
              <ul style="display: none;" class="children clearfixmenu">
              <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "category")){ $data = $content_tag->category(array('action'=>'category','catid'=>$vo['catid'],'order'=>'listorder ASC','num'=>'0','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li <?php if( $i%2 == 0 ): ?>class="noborder"<?php endif; ?>>
                  <h3><a href="<?php echo ($r["url"]); ?>" class="stmenu" title="<?php echo ($r["catname"]); ?>"><span><?php echo ($r["catname"]); ?></span></a></h3>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li class="count noborder">
                  <div><?php echo ($vo["description"]); ?></div>
                </li>
              </ul>
            </li>
            <?php else: ?>
            <!--<?php echo ($vo["catname"]); ?>-->
            <li class="stmenu">
              <h3><a href="<?php echo ($vo["url"]); ?>" class="xialaguang <?php if( in_array($catid,explode(',',$vo['arrchildid'])) ): ?>navhovers<?php endif; ?>" style="margin-left:1px" title="<?php echo ($vo["description"]); ?>"><span><?php echo ($vo["catname"]); ?></span></a></h3>
            </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li class="overlay"></li>
          </ul>
          <script type="text/javascript">
		  $('#nav-menu .menu > li').hover(function () {
		      $(this).find('.children').animate({
		          opacity: 'show',
		          height: 'show'
		      }, 300);
		      $(this).find('.xialaguang').addClass('navhover');
		  }, function () {
		      $('.children').stop(true, true).slideUp(100);
		      $('.xialaguang').removeClass('navhover');
		  }).slice(-3, -1).find('.children').addClass('sleft');
          </script></div>
      </div>
    </div>
  </div>
</div>
<!--nav end-->
<div class="search">
  <form  name="formsearch" class="form" action="<?php echo U('Search/Index/index');?>" method="post">
    <input type="text" name="q" size="24" class="search-keyword"  id="inputString" class="f-text" x-webkit-speech /><input type="submit" class="search-submit"  id="search-submit" value="搜 索" />
    <div class="suggestionsBox" id="suggestions" style="display: none;">
      <div class="suggestionList">
        <ul id="autoSuggestionsList">
        </ul>
      </div>
    </div>
  </form>
</div>
<div class="map"><span class="home_ico">当前位置：<a href="<?php echo ($config_siteurl); ?>"><?php echo ($Config["sitename"]); ?></a></span>
  <p style="float:right;padding-right:15px;"></p>
</div>
<div class="w972 margin8">
  <div class="index_left left">
    <div class="top_left">
      <div class="facus_left left">
        <div class="index_slide">
          <div class="focusBox">
          <?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'1',)); }; ?><ul class="pic">
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["data"]["url"]); ?>" title="<?php echo ($vo["data"]["title"]); ?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="txt-bg"></div>
            <div class="txt">
              <ul>
              <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["data"]["url"]); ?>" title="<?php echo ($vo["data"]["title"]); ?>"><?php echo ($vo["data"]["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
            <ul class="num">
              <li class=""><a>1</a><span></span></li>
              <li class=""><a>2</a><span></span></li>
              <li class=""><a>3</a><span></span></li>
            </ul>
          </div>
          <script type="text/javascript">
jQuery(".focusBox").slide({ titCell:".num li", mainCell:".pic",effect:"fold", autoPlay:true,trigger:"click",startFun:function(i){jQuery(".focusBox .txt li").eq(i).animate({"bottom":0}).siblings().animate({"bottom":-36});}});
</script> 
        </div>
        <!--index_slider end-->
        <div class="software">
          <h2><span class="more right"><a href="<?php echo getCategory(9,'url');?>" target="_blank">更多>></a></span><span class="h2_txt">常用软件</span></h2>
          <ul>
            <li><a href="<?php echo ($config_siteurl); ?>2013/software_06/31.html" title="photoshop CS5绿化破解版免费下载"><img src="<?php echo ($config_siteurl); ?>statics/default/images/ps_ico.png" alt="PS软件"/></a></li>
            <li><a href="<?php echo ($config_siteurl); ?>2013/software_06/32.html" title="Adobe Dreamweaver cs6汉化破解版免费下载"><img src="<?php echo ($config_siteurl); ?>statics/default/images/dw_ico.png" alt="Dreamweaver软件"/></a></li>
            <li><a href="<?php echo ($config_siteurl); ?>2013/software_06/33.html" title="Flash cs3下载"><img src="<?php echo ($config_siteurl); ?>statics/default/images/fl_ico.png" alt="Flash软件"/></a></li>
            <li><a href="<?php echo ($config_siteurl); ?>2013/software_06/33.html" title="Fireworks cs3下载"><img src="<?php echo ($config_siteurl); ?>statics/default/images/fw_ico.png" alt="Fireworks软件"/></a></li>
            <div style="clear:both"></div>
          </ul>
          <div class="softlist">
          <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'9','order'=>'id DESC','num'=>'3','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
              <dt><a href="<?php echo ($vo["url"]); ?>"><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="HttpWatch - 一款网站HTTP监"/></a></dt>
              <dd class="softname"><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],12)); ?></a></dd>
              <dd class="softinfo"><?php echo (str_cut($vo["description"],15)); ?>...</dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
        <!--常用软件 end--> 
      </div>
      <div class="top_right right">
        <div class="top_news">
        <?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'2',)); }; ?><div class="news_bg"></div>
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h1><a href="<?php echo ($vo["data"]["url"]); ?>" title="<?php echo ($vo["data"]["title"]); ?>"><?php echo ($vo["data"]["title"]); ?></a></h1>
          <p> <?php echo ($vo["data"]["description"]); ?><a href="<?php echo ($vo["data"]["url"]); ?>" target="_blank">[查看全文]</a></p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        
        <!--首页头条end-->
        <div class="top_info">
          <h2><span class="more right"><a href="<?php echo getCategory(7,'url');?>" target="_blank">更多&gt;&gt;</a></span><span class="h2_txt">站长推荐</span></h2>
          <div id="ztlist1" class="ztlist" style="display:block">
          <?php $Position_tag = \Think\Think::instance("\Content\TagLib\Position"); if(method_exists($Position_tag, "position")){ $data = $Position_tag->position(array('action'=>'position','posid'=>'3',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
              <dt><a href="<?php echo ($vo["data"]["url"]); ?>" title="<?php echo ($vo["data"]["title"]); ?>"><img src="<?php echo ($vo["data"]["thumb"]); ?>" alt="<?php echo ($vo["data"]["title"]); ?>" /></a></dt>
              <dd class="info_tt"><a href="<?php echo ($vo["data"]["url"]); ?>" title="<?php echo ($vo["data"]["title"]); ?>"><?php echo ($vo["data"]["title"]); ?></a></dd>
              <dd class="info_txt"><?php echo ($vo["data"]["description"]); ?></dd>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
        <!--专题推荐end--> 
      </div>
      <div style="clear:both"></div>
    </div>
    <!--index_TOP_RIGHT end--> 
    <!--网页特效-->
    <div class="index_tab">
      <h2 class="h2">网页特效</h2>
      <ul class="tabs" id="tabs">
        <li><a href="<?php echo getCategory(16,'url');?>" tab="tab1" hidefocus="true" title="焦点幻灯片">JS幻灯片</a></li>
        <li><a href="<?php echo getCategory(17,'url');?>" tab="tab2" hidefocus="true" title="导航菜单">导航菜单</a></li>
      </ul>
      <div style="clear:both"></div>
      <ul class="tab_conbox">
        <li id="tab1" class="tab_con" style="display:block;">
        <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'16','order'=>'id DESC','num'=>'3','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
            <dt><a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a></dt>
            <dd class="span1"><a href="<?php echo ($vo["url"]); ?>"  title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
            <dd class="span2"><a href="<?php echo getCategory(16,'url');?>" title="JS幻灯片">JS幻灯片</a>&nbsp;/&nbsp;<?php echo (date("m-d",$vo["updatetime"])); ?> </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          <div style="clear:both"></div>
        </li>
        <li id="tab2" class="tab_con">
         <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'17','order'=>'id DESC','num'=>'3','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
            <dt><a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a></dt>
            <dd class="span1"><a href="<?php echo ($vo["url"]); ?>"  title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
            <dd class="span2"><a href="<?php echo getCategory(17,'url');?>" title="导航菜单">导航菜单</a>&nbsp;/&nbsp;<?php echo (date("m-d",$vo["updatetime"])); ?> </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          <div style="clear:both"></div>
        </li>
      </ul>
    </div>
    
    <!--网页素材-->
    <div class="index_tab">
      <h2 class="h2">建站素材</h2>
      <ul class="tabs" id="tabss">
        <li><a href="<?php echo getCategory(18,'url');?>" tab="tab1s" hidefocus="true">PNG图标</a></li>
        <li><a href="<?php echo getCategory(19,'url');?>" tab="tab2s" hidefocus="true">GIF图标</a></li>
      </ul>
      <div style="clear:both"></div>
      <ul class="tab_conbox">
        <li id="tab1s" class="tab_cons" style="display: block; ">
        <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'18','order'=>'id DESC','num'=>'3','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
            <dt><a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a></dt>
            <dd class="span1"><a href="<?php echo ($vo["url"]); ?>"  title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
            <dd class="span2"><a href="<?php echo getCategory(18,'url');?>" title="PNG图标">PNG图标</a>&nbsp;/&nbsp;<?php echo (date("m-d",$vo["updatetime"])); ?> </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          <div style="clear:both"></div>
        </li>
        <li id="tab2s" class="tab_con">
         <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'19','order'=>'id DESC','num'=>'3','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
            <dt><a href="<?php echo ($vo["url"]); ?>"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>"/></a></dt>
            <dd class="span1"><a href="<?php echo ($vo["url"]); ?>"  title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
            <dd class="span2"><a href="<?php echo getCategory(19,'url');?>" title="GIF图标">GIF图标</a>&nbsp;/&nbsp;<?php echo (date("m-d",$vo["updatetime"])); ?> </dd>
          </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          <div style="clear:both"></div>
        </li>
      </ul>
    </div>
  </div>
  <!--index_left end-->
  <div class="index_right right">
    <div class="quick_nav">
      <h2><span class="h2_txt">快捷导航</span></h2>
      <ul>
        <li><a href="http://www.css88.com/jqapi-1.9/" title="jquery1.9在线手册"><img  src="<?php echo ($config_siteurl); ?>statics/default/images/jq.png"/ alt="jquery1.8.3在线手册"><span>jquery手册</span></a></li>
        <li><a href="http://www.css88.com/book/css/" title="CSS3在线手册"><img  src="<?php echo ($config_siteurl); ?>statics/default/images/3.gif"/ alt="CSS3在线手册"><span>CSS3手册</span></a></li>
        <li><a title="字体专区"><img  src="<?php echo ($config_siteurl); ?>statics/default/images/1.gif" alt="字体专区"/><span>字体专区</span></a></li>
        <li><a href="<?php echo getCategory(9,'url');?>" title="常用软件"><img  src="<?php echo ($config_siteurl); ?>statics/default/images/4.gif" alt="软件专区"/><span>软件专区</span></a></li>
        <li><a href="<?php echo getCategory(3,'url');?>" title="PS专区"><img  src="<?php echo ($config_siteurl); ?>statics/default/images/5.gif" alt="在线P图"/><span>在线PS</span></a></li>
        <li><a href="<?php echo getCategory(7,'url');?>" title="站长快迅"><img  src="<?php echo ($config_siteurl); ?>statics/default/images/2.gif" alt="站长快讯"/><span>站长快讯</span></a></li>
        <div style="clear:both;"></div>
      </ul>
    </div>
    <div class="update">
      <h2><span class="h2_txt">最近更新</span></h2>
      <script>
        $(function(){
			$("#update li:even").css("background","#f2f2f2")
		})
        </script>
      <ul id="update">
       <?php  $cache = 0; $cacheID = to_guid_string(array('sql'=>'select * from chb_article  where status=99 order by inputtime desc','num'=>'9','page'=>'0','return'=>'data','pagefun'=>'page','cache'=>'0','dbsource'=>'',)); if(0 && $_return = S( $cacheID ) ){ $data=$_return; }else{ $_sql = "select * from chb_article  where status=99 order by inputtime desc"; $get_db = M(); $data=$get_db->query($_sql." LIMIT 9 "); if(0){ S( $cacheID ,$data,$cache); }; } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>[<a href='<?php echo getCategory($vo['catid'],'url');?>'><?php echo getCategory($vo['catid'],'catname');?></a>] <a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="hot_news">
      <h2><span class="h2_txt">热门点击</span></h2>
      <ul>
      <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "hits")){ $data = $content_tag->hits(array('action'=>'hits','modelid'=>'1','order'=>'weekviews DESC','num'=>'10','catid'=>'','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="right_tag">
      <h2><span class="h2_txt">网站云标签</span></h2>
      <div class="right_tag_con"> 
      <?php $Tags_tag = \Think\Think::instance("\Content\TagLib\Tags"); if(method_exists($Tags_tag, "top")){ $data = $Tags_tag->top(array('action'=>'top','num'=>'12','order'=>'hits DESC','page'=>'0','pagefun'=>'page','return'=>'data','where'=>'',)); }; if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a title="<?php echo ($vo["tag"]); ?>" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["tag"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?> 
      </div>
    </div>
  </div>
  <div style="clear:both"></div>
  <!--top part end--> 
</div>
<!--top part end-->
<div class="w972s margin8">
  <div class="web_jc">
    <h2><span class="more right"><a href="<?php echo getCategory(1,'url');?>" target="_blank">更多>></a></span><span class="h2_txt">网页教程</span></h2>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "hits")){ $data = $content_tag->hits(array('action'=>'hits','catid'=>'1','order'=>'weekviews DESC','num'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
      <dt><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="<?php echo ($vo["title"]); ?>" /></a></dt>
      <dd class="textname"><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
      <dd  class="texttxt" title="<?php echo ($vo["description"]); ?>"><?php echo (str_cut($vo["description"],40)); ?></dd>
      <div style="clear:both"></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <ul>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'1','order'=>'id DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><span class="right"> <?php echo (date("m-d",$vo["updatetime"])); ?></span><?php echo (str_cut($vo["title"],18)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="web_jc" style="margin-left:8px;">
    <h2><span class="more right"><a href="<?php echo getCategory(2,'url');?>" target="_blank">更多>></a></span><span class="h2_txt">前端开发</span></h2>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "hits")){ $data = $content_tag->hits(array('action'=>'hits','catid'=>'2','order'=>'weekviews DESC','num'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
      <dt><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="<?php echo ($vo["title"]); ?>" /></a></dt>
      <dd class="textname"><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
      <dd  class="texttxt" title="<?php echo ($vo["description"]); ?>"><?php echo (str_cut($vo["description"],40)); ?></dd>
      <div style="clear:both"></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <ul>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'2','order'=>'id DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><span class="right"> <?php echo (date("m-d",$vo["updatetime"])); ?></span><?php echo (str_cut($vo["title"],18)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="web_jc" style="margin-left:7px;">
    <h2><span class="more right"><a href="<?php echo getCategory(3,'url');?>" target="_blank">更多>></a></span><span class="h2_txt">PS教程</span></h2>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "hits")){ $data = $content_tag->hits(array('action'=>'hits','catid'=>'3','order'=>'weekviews DESC','num'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
      <dt><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="<?php echo ($vo["title"]); ?>" /></a></dt>
      <dd class="textname"><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
      <dd  class="texttxt" title="<?php echo ($vo["description"]); ?>"><?php echo (str_cut($vo["description"],40)); ?></dd>
      <div style="clear:both"></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <ul>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'3','order'=>'id DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><span class="right"> <?php echo (date("m-d",$vo["updatetime"])); ?></span><?php echo (str_cut($vo["title"],18)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div style="clear:both"></div>
</div>
<div class="big_ad1 margin8" style="padding: 0;"> 
  <img src="http://placekitten.com/970/102" />
</div>
<div class="w972s margin8">
  <div class="web_jc">
    <h2><span class="more right"><a href="<?php echo getCategory(6,'url');?>" target="_blank">更多>></a></span><span class="h2_txt">SEO优化</span></h2>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "hits")){ $data = $content_tag->hits(array('action'=>'hits','catid'=>'6','order'=>'weekviews DESC','num'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
      <dt><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="<?php echo ($vo["title"]); ?>" /></a></dt>
      <dd class="textname"><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
      <dd  class="texttxt" title="<?php echo ($vo["description"]); ?>"><?php echo (str_cut($vo["description"],40)); ?></dd>
      <div style="clear:both"></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <ul>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'6','order'=>'id DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><span class="right"> <?php echo (date("m-d",$vo["updatetime"])); ?></span><?php echo (str_cut($vo["title"],18)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="web_jc" style="margin-left:8px;">
    <h2><span class="more right"><a href="<?php echo getCategory(7,'url');?>" target="_blank">更多>></a></span><span class="h2_txt">站长杂谈</span></h2>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "hits")){ $data = $content_tag->hits(array('action'=>'hits','catid'=>'7','order'=>'weekviews DESC','num'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
      <dt><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="<?php echo ($vo["title"]); ?>" /></a></dt>
      <dd class="textname"><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
      <dd  class="texttxt" title="<?php echo ($vo["description"]); ?>"><?php echo (str_cut($vo["description"],40)); ?></dd>
      <div style="clear:both"></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <ul>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'7','order'=>'id DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><span class="right"> <?php echo (date("m-d",$vo["updatetime"])); ?></span><?php echo (str_cut($vo["title"],18)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="web_jc" style="margin-left:7px;">
    <h2><span class="more right"><a href="<?php echo getCategory(9,'url');?>" target="_blank">更多>></a></span><span class="h2_txt">常用软件</span></h2>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "hits")){ $data = $content_tag->hits(array('action'=>'hits','catid'=>'9','order'=>'weekviews DESC','num'=>'1','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
      <dt><a href="<?php echo ($vo["url"]); ?>" target="_blank" title="<?php echo ($vo["title"]); ?>"><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="<?php echo ($vo["title"]); ?>" /></a></dt>
      <dd class="textname"><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo (str_cut($vo["title"],15)); ?></a></dd>
      <dd  class="texttxt" title="<?php echo ($vo["description"]); ?>"><?php echo (str_cut($vo["description"],40)); ?></dd>
      <div style="clear:both"></div><?php endforeach; endif; else: echo "" ;endif; ?>
    </dl>
    <ul>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'9','order'=>'id DESC','num'=>'7','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>" title="<?php echo ($vo["title"]); ?>"><span class="right"> <?php echo (date("m-d",$vo["updatetime"])); ?></span><?php echo (str_cut($vo["title"],18)); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div style="clear:both"></div>
</div>
<div class="big_ad1" style="padding: 0;"> 
  <img src="http://lorempixel.com/970/102" />
</div>
<div class="art_pic">
  <h2><span class="more right"><a href="<?php echo getCategory(8,'url');?>">更多>></a></span><span class="h2_txt">设计欣赏/artist</span></h2>
  <ul>
    <?php $content_tag = \Think\Think::instance("\Content\TagLib\Content"); if(method_exists($content_tag, "lists")){ $data = $content_tag->lists(array('action'=>'lists','catid'=>'8','order'=>'id DESC','num'=>'4','page'=>'0','pagefun'=>'page','return'=>'data',)); } if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><span><?php echo ($vo["title"]); ?></span><img src="<?php if($vo['thumb']): echo ($vo["thumb"]); else: echo ($config_siteurl); ?>statics/default/images/defaultpic.gif<?php endif; ?>" alt="<?php echo ($vo["title"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    <div style="clear:both"></div>
  </ul>
</div>
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<div id="footer">
  <div class="foot_con">
    <div class="ul_con">
      <ul>
        <li class="h">关于我们</li>
        <li><a>关于我们</a></li>
        <li><a>加入我们</a></li>
        <li><a>免责声明</a></li>
        <li><a>网站地图</a></li>
      </ul>
      <ul>
        <li class="h">联系我们</li>
        <li><a>联系方式</a></li>
        <li><a>交流QQ群</a></li>
        <li><a>RSS订阅</a></li>
        <li><a>给我留言</a></li>
      </ul>
      <ul>
        <li class="h">其他帮助</li>
        <li><a>在线音乐</a></li>
        <li><a>业务合作</a></li>
        <li><a>用户投稿</a></li>
        <li><a>高级搜索</a></li>
      </ul>
    </div>
    <div class="txt_con">
      <p style="line-height:2;">本站资源全来源于网络,不承担任何版权问题,如果我们侵犯了您的权益,请来信告知,我们会在第一时间处理！<br />
        copyright &#169;2013 <?php echo ($config_siteurl); ?> <a href="http://www.miitbeian.gov.cn" ref="nofollow">闽ICP备13015355号-1</a><br/>
        <?php echo ($Config["sitename"]); ?>版权所有</p>
    </div>
    <div style="clear:both"></div>
  </div>
</div>
<script type="text/javascript">$(function (){$(window).toTop({showHeight : 100,});});</script>
</body>
</html>