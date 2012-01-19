<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class=" javascriptEnabled win win5_1" style="overflow-x: hidden; overflow-y: hidden; ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iCMS后台管理</title>
<link href="module/admincp/css/reset.css" rel="stylesheet" type="text/css" />
<link href="module/admincp/css/desktop.css" rel="stylesheet" type="text/css" />
<link href="module/admincp/css/fancybox/fancybox.css" rel="stylesheet" type="text/css"/>
<link href="module/admincp/css/ui/theme.css" rel="stylesheet" type="text/css" id="skincss"/>
<script type="text/javascript" src="module/admincp/js/jquery.js?1.6.2"></script>
<script type="text/javascript" src="module/admincp/js/jquery.ui.js?1.8.17"></script>
<script type="text/javascript" src="module/admincp/js/iCMS.ui.js?0.1.0"></script>
<script type="text/javascript" src="module/admincp/js/fancybox.js?1.3.4"></script>
</head>
<body onselectstart="return false">
<div class="hidden_div">
  <h1>iCMS,内容管理系统</h1>
  <p>iCMS 是一个采用 PHP 和 MySQL 数据库构建的高效内容管理系统,为中小型网站提供一个完美的解决方案。</p>
</div>
<noscript>
<div class="noscript"> 你好，需要浏览器开启JavaScript功能来帮助你使用iCMS+。<br/>
  请设置浏览器开启 JavaScript功能，然后重试。 </div>
</noscript>
<div id="startingCover">
  <div id="startingLogo"></div>
  <div id="startingText">Starting ...<a href="webqqpic/" id="startingChangeEvn"  style="display:none;" >您的网络不给力，请尝试手动切换环境!</a></div>
  <div id="startingBarContainer">
    <div id="startingBar"></div>
  </div>
  <div id="startingTips">0%</div>
</div>
<div id="progress" style="display:none;"></div>
<div id="desktop">
<div id="topBar"></div>
<div id="leftBar" style="width: 73px; height: 100%; ">
  <div id="dockContainer" class="dock_container dock_pos_left" style="z-index: 10; ">
    <div class="dock_middle">
      <div appid="appMarket" fileid="appMarket" type="app" id="alloy_icon_app_appMarket_1" uid="app_appMarket" class="appButton appMarket not_deleteable" title="应用市场" _olddisplay="block" style="display: block; ">
        <div class="appButton_appIcon " id="alloy_icon_app_appMarket_1_icon_div"><img id="alloy_icon_app_appMarket_1_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/style/images/appmarket.png?20111011001" alt="应用市场"></div>
        <div class="appButton_appName">
          <div id="alloy_icon_app_appMarket_1_name" class="appButton_appName_inner">应用市场</div>
          <div class="appButton_appName_inner_right"></div>
        </div>
        <div class="appButton_delete" id="alloy_icon_app_appMarket_1_delete" title="卸载应用"></div>
      </div>
      <div appid="diskExplorer" fileid="diskExplorer" type="app" id="alloy_icon_app_diskExplorer_2" uid="app_diskExplorer" class="appButton diskExplorer not_deleteable" title="云存储" _olddisplay="block" style="display: block; ">
        <div class="appButton_appIcon " id="alloy_icon_app_diskExplorer_2_icon_div"><img id="alloy_icon_app_diskExplorer_2_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/style/images/diskexplorer.png?20111011001" alt="云存储"></div>
        <div class="appButton_appName">
          <div id="alloy_icon_app_diskExplorer_2_name" class="appButton_appName_inner">云存储</div>
          <div class="appButton_appName_inner_right"></div>
        </div>
        <div class="appButton_delete" id="alloy_icon_app_diskExplorer_2_delete" title="卸载应用"></div>
      </div>
      <div id="dockItemList" class="dock_item_list" customacceptdrop="1">
        <div appid="50" fileid="50" type="app" id="alloy_icon_app_50_3" uid="app_50" class="appButton not_deleteable" title="QQ">
          <div class="appButton_appIcon " id="alloy_icon_app_50_3_icon_div"><img id="alloy_icon_app_50_3_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/pubapps/0/50/images/big.png" alt="QQ"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_50_3_name" class="appButton_appName_inner">QQ</div>
            <div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_50_3_delete" title="卸载应用"></div>
        </div>
        <div appid="16" fileid="16" type="app" id="alloy_icon_app_16_4" uid="app_16" class="appButton " title="QQ空间">
          <div class="appButton_appIcon " id="alloy_icon_app_16_4_icon_div"><img id="alloy_icon_app_16_4_img" class="appButton_appIconImg" src="http://6.web.qstatic.com/webqqpic/pubapps/0/16/images/big.png" alt="QQ空间"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_16_4_name" class="appButton_appName_inner">QQ空间</div>
            <div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_16_4_delete" title="卸载应用"></div>
        </div>
        <div appid="17" fileid="17" type="app" id="alloy_icon_app_17_5" uid="app_17" class="appButton " title="QQ邮箱">
          <div class="appButton_appIcon " id="alloy_icon_app_17_5_icon_div"><img id="alloy_icon_app_17_5_img" class="appButton_appIconImg" src="http://7.web.qstatic.com/webqqpic/pubapps/0/17/images/big.png" alt="QQ邮箱"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_17_5_name" class="appButton_appName_inner">QQ邮箱</div>
            <div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_17_5_delete" title="卸载应用"></div>
        </div>
        <div appid="2" fileid="2" type="app" id="alloy_icon_app_2_6" uid="app_2" class="appButton " title="腾讯微博">
          <div class="appButton_appIcon " id="alloy_icon_app_2_6_icon_div"><img id="alloy_icon_app_2_6_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/0/2/images/big.png" alt="腾讯微博"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_2_6_name" class="appButton_appName_inner">腾讯微博</div>
            <div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_2_6_delete" title="卸载应用"></div>
        </div>
      </div>
      <div id="dockToolList" class="dock_tool_list">
        <div class="dock_tool_item"> <a href="###" class="dock_tool_icon dock_tool_pinyin" cmd="Pinyin" title="QQ云输入法"></a> <a href="###" class="dock_tool_icon dock_tool_sound" cmd="Sound" title="静音"></a> </div>
        <div class="dock_tool_item"> <a href="###" class="dock_tool_icon dock_tool_setting" cmd="Setting" title="系统设置"></a> <a href="###" class="dock_tool_icon dock_tool_theme" cmd="Theme" title="主题设置"></a> </div>
        <div class="dock_tool_item2"> <a href="###" class="dock_tool_icon dock_tool_start" title="点击这里开始"></a> </div>
      </div>
    </div>
  </div>
</div>
<div id="rightBar"></div>
<div class="bottomBarBg"></div>
<div class="bottomBarBgTask"></div>
<div id="bottomBar" class="bottomBar" style="z-index: 12; ">
  <div class="taskNextBox" id="taskNextBox" _olddisplay="" style="display: none; "><a href="#" class="taskNext" id="taskNext" hidefocus="true"></a></div>
  <div class="taskContainer" id="taskContainer">
    <div class="taskContainerInner" id="taskContainerInner" style="margin-right: 0px; ">
    </div>
  </div>
  <div class="taskPreBox" id="taskPreBox" _olddisplay="" style="display: none; "><a href="#" class="taskPre" id="taskPre" hidefocus="true"></a></div>
</div>
<div id="desktopWrapper" style="left:73px;">
  <div id="desktopsContainer" class="desktopsContainer">
    <div class="desktopContainer desktop_current">
      <div class="appListContainer" style="display: block; margin-left: 28px;margin-top: 46px; ">
      
        <div class="appButton addQuickLinkButton" title="添加" screen="2">
          <div class="addQuickLinkButtonInner"></div>
          <div class="appButton_appName">
            <div class="appButton_appName_inner">添加</div><div class="appButton_appName_inner_right"></div>
          </div>
        </div>

        <div id="alloy_icon_app_8992_73" class="appButton " title="金山快盘3">
          <div class="appButton_appIcon " id="alloy_icon_app_8992_7_icon_div"><img id="alloy_icon_app_8992_7_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/8/8992/images/big.png" alt="金山快盘"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_8992_7_name" class="appButton_appName_inner">金山快盘3</div><div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_8992_7_delete" title="卸载应用"></div>
        </div>
        
      </div>

    </div>
  </div>
</div>
<div id="zoomWallpaperGrid" class="zoomWallpaperGrid" style="position: absolute; z-index: -10; left: 0px; top: 0px; overflow-x: hidden; overflow-y: hidden; height: 100%; width: 100%; "><img id="zoomWallpaper" class="zoomWallpaper" style="position: absolute; top: 0px; left: 0px;" src="module/admincp/css/skin/blue_glow.jpg"></div>
<style>
.ui-sortable-helper{background:none !important;}
</style>
<script type="text/javascript">
var version = $.browser.version.replace('.','_'); 
$('html').addClass(($.browser.msie?'ie ie':'webkit webkit')+version);
$(function(){
	$.desktop.init();
			$.fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
	$('.appButton').click(function(){
			var self = $(this);


			self.iWindow({
				width:960,
				height:600,
				appendTo:'.desktopContainer',
				title:self.attr('title'),
				autoOpen: true,
				appSrc:'http://v6.icms.com/editor.html'
			});
			//$(this).iWindow( "open" );
	});
})
</script>
</body>
</html>
