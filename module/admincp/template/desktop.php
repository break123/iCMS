<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class=" javascriptEnabled win win5_1" style="overflow-x: hidden; overflow-y: hidden; ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iCMS后台管理</title>
<link href="module/admincp/css/all.css" rel="stylesheet" type="text/css" />
<link href="module/admincp/css/desktop.css" rel="stylesheet" type="text/css" />
<link href="module/admincp/css/desktop.2.css" rel="stylesheet" type="text/css" />
<link href="module/admincp/css/ui/theme.css" rel="stylesheet" type="text/css" id="skincss"/>
<link href="module/admincp/css/skin.css" rel="stylesheet" type="text/css" id="skincss"/>
<script type="text/javascript" src="module/admincp/js/jquery.js?1.6.2"></script>
<script type="text/javascript" src="module/admincp/js/jquery-ui.js?1.8.16"></script>
<script type="text/javascript" src="module/admincp/js/jquery.blockUI.js"></script>
</head>

<body>
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
<iframe id="touchpad" style="display:none;" src="about:blank"></iframe>
<div id="desktop" class="EQQ_Container">
<div id="topBar"></div>
<div id="leftBar" style="width: 73px; height: 100%; ">
  <div id="dockContainer" class="dock_container dock_pos_left" style="z-index: 10; ">
    <div class="dock_middle">
      <div appid="appMarket" fileid="appMarket" type="app" id="alloy_icon_app_appMarket_1" uid="app_appMarket" class="appButton appMarket not_deleteable" title="应用市场" _olddisplay="block" style="display: block; ">
        <div class="appButton_appIcon " id="alloy_icon_app_appMarket_1_icon_div" style=""><img id="alloy_icon_app_appMarket_1_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/style/images/appmarket.png?20111011001" alt="应用市场"></div>
        <div class="appButton_appName">
          <div id="alloy_icon_app_appMarket_1_name" class="appButton_appName_inner">应用市场</div>
          <div class="appButton_appName_inner_right"></div>
        </div>
        <div class="appButton_delete" id="alloy_icon_app_appMarket_1_delete" title="卸载应用"></div>
      </div>
      <div appid="diskExplorer" fileid="diskExplorer" type="app" id="alloy_icon_app_diskExplorer_2" uid="app_diskExplorer" class="appButton diskExplorer not_deleteable" title="云存储" _olddisplay="block" style="display: block; ">
        <div class="appButton_appIcon " id="alloy_icon_app_diskExplorer_2_icon_div" style=""><img id="alloy_icon_app_diskExplorer_2_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/style/images/diskexplorer.png?20111011001" alt="云存储"></div>
        <div class="appButton_appName">
          <div id="alloy_icon_app_diskExplorer_2_name" class="appButton_appName_inner">云存储</div>
          <div class="appButton_appName_inner_right"></div>
        </div>
        <div class="appButton_delete" id="alloy_icon_app_diskExplorer_2_delete" title="卸载应用"></div>
      </div>
      <div id="dockItemList" class="dock_item_list" customacceptdrop="1">
        <div appid="50" fileid="50" type="app" id="alloy_icon_app_50_3" uid="app_50" class="appButton not_deleteable" title="QQ">
          <div class="appButton_appIcon " id="alloy_icon_app_50_3_icon_div" style=""><img id="alloy_icon_app_50_3_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/pubapps/0/50/images/big.png" alt="QQ"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_50_3_name" class="appButton_appName_inner">QQ</div>
            <div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_50_3_delete" title="卸载应用"></div>
        </div>
        <div appid="16" fileid="16" type="app" id="alloy_icon_app_16_4" uid="app_16" class="appButton " title="QQ空间">
          <div class="appButton_appIcon " id="alloy_icon_app_16_4_icon_div" style=""><img id="alloy_icon_app_16_4_img" class="appButton_appIconImg" src="http://6.web.qstatic.com/webqqpic/pubapps/0/16/images/big.png" alt="QQ空间"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_16_4_name" class="appButton_appName_inner">QQ空间</div>
            <div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_16_4_delete" title="卸载应用"></div>
        </div>
        <div appid="17" fileid="17" type="app" id="alloy_icon_app_17_5" uid="app_17" class="appButton " title="QQ邮箱">
          <div class="appButton_appIcon " id="alloy_icon_app_17_5_icon_div" style=""><img id="alloy_icon_app_17_5_img" class="appButton_appIconImg" src="http://7.web.qstatic.com/webqqpic/pubapps/0/17/images/big.png" alt="QQ邮箱"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_17_5_name" class="appButton_appName_inner">QQ邮箱</div>
            <div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_17_5_delete" title="卸载应用"></div>
        </div>
        <div appid="2" fileid="2" type="app" id="alloy_icon_app_2_6" uid="app_2" class="appButton " title="腾讯微博">
          <div class="appButton_appIcon " id="alloy_icon_app_2_6_icon_div" style=""><img id="alloy_icon_app_2_6_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/0/2/images/big.png" alt="腾讯微博"></div>
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
<div id="bottomBar" class="bottomBar"></div>
<div id="desktopWrapper" style="left:73px;">
  <div id="desktopsContainer" class="desktopsContainer">
    <div class="desktopContainer desktop_current">
      <div class="appListContainer" customacceptdrop="1" index="2" style="overflow-y: hidden; display: block; opacity: 1; width: 1179px; margin-left: 28px; height: 213px; margin-top: 46px; " _olddisplay="">
        <div class="appButton addQuickLinkButton" title="添加" screen="2" style="left: 169px; top: 124px; ">
          <div class="addQuickLinkButtonInner"></div>
          <div class="appButton_appName">
            <div class="appButton_appName_inner">添加</div><div class="appButton_appName_inner_right"></div>
          </div>
        </div>
        <div appid="8992" fileid="8992" type="app" id="alloy_icon_app_8992_7" uid="app_8992" class="appButton " title="金山快盘" style="left: 27px; top: 12px; ">
          <div class="appButton_appIcon " id="alloy_icon_app_8992_7_icon_div" style=""><img id="alloy_icon_app_8992_7_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/8/8992/images/big.png" alt="金山快盘"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_8992_7_name" class="appButton_appName_inner">金山快盘</div><div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_8992_7_delete" title="卸载应用"></div>
        </div>
        <div appid="8992" fileid="8992" type="app" id="alloy_icon_app_8992_7" uid="app_8992" class="appButton " title="金山快盘" style="left: 27px; top: 12px; ">
          <div class="appButton_appIcon " id="alloy_icon_app_8992_7_icon_div" style=""><img id="alloy_icon_app_8992_7_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/8/8992/images/big.png" alt="金山快盘"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_8992_7_name" class="appButton_appName_inner">21323</div><div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_8992_7_delete" title="卸载应用"></div>
        </div>
        <div appid="8992" fileid="8992" type="app" id="alloy_icon_app_8992_7" uid="app_8992" class="appButton " title="金山快盘" style="left: 27px; top: 12px; ">
          <div class="appButton_appIcon " id="alloy_icon_app_8992_7_icon_div" style=""><img id="alloy_icon_app_8992_7_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/8/8992/images/big.png" alt="金山快盘"></div>
          <div class="appButton_appName">
            <div id="alloy_icon_app_8992_7_name" class="appButton_appName_inner">asd</div><div class="appButton_appName_inner_right"></div>
          </div>
          <div class="appButton_delete" id="alloy_icon_app_8992_7_delete" title="卸载应用"></div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<div id="zoomWallpaperGrid" class="zoomWallpaperGrid" style="position: absolute; z-index: -10; left: 0px; top: 0px; overflow-x: hidden; overflow-y: hidden; height: 100%; width: 100%; "><img id="zoomWallpaper" class="zoomWallpaper" style="position: absolute; top: 0px; left: 0px;" src="module/admincp/css/skin/blue_glow.jpg"></div>
<script type="text/javascript">
var version = $.browser.version.replace('.','_'); 
$('html').addClass(($.browser.msie?'ie ie':'webkit webkit')+version);
var iDesk	= iDesk||{};
(function(){
	var a=iDesk;
	a.WH	= {};
	a.getWH	= function(){
		a.WH= {w:$(window).width(),h:$(window).height()};
		return a.WH;
	}
	a.log	= function(e){
		console.log(e);
	};
	a.start = function(){
		var percent = 0,timer = setInterval(function(){
			$('#startingTips').html(percent+'%');
			if(percent==100){
				window.clearInterval(timer);
			}
			percent++;
		},30);
	//	setTimeout(function(){
			$('#startingCover').hide();
	//	},3500);
		a.resize();
		a.appButtonOrder();
		$(window).resize(a.resize);
	};
	a.resize = function(){
		a.getWH();
		$('#desktopWrapper,#desktopsContainer,.desktopContainer,#zoomWallpaperGrid,#zoomWallpaper').css({width:a.WH.w,height:a.WH.h});
		$('.appListContainer').css({width:a.WH.w-28,height:a.WH.h-46});
		a.appButtonOrder();
	}
	a.appButtonOrder = function(){
		var c=Math.floor(a.WH.h/136),ri=-1;
		if(c<1){c=1;}
		$(".appListContainer > .appButton").each(function(i){
			var ci=i%c;
			if(ci==0){ri++;}
			var _top =112*ci+12;
			var _left=142*ri+27;		
			$(this).css({left:_left,top:_top});
		}); 
	}
	
})($)
//var iDesk;
$(function(){
	iDesk.start();
	$( ".appListContainer" ).sortable({
			items:".appButton",
			opacity:0.5,
			delay: 500,
			start: function(event, ui) {
				
			}
	});
$( ".appListContainer" ).disableSelection();
    $('.appButton').click(function() { 
        $.blockUI({ 
            theme:     true, 
            title:    'This is your title', 
            message:  '<p>This is your message.</p>'
           // timeout:   2000 
        }); 
    });   
})
</script>
</body>
</html>
