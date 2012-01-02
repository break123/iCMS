<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html class=" javascriptEnabled win win5_1 chrome chrome15_0 webkit webkit535_2 flash flash11_0" style="overflow-x: hidden; overflow-y: hidden; ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iCMS后台管理</title>
<link href="module/admincp/css/reset.css" rel="stylesheet" type="text/css" />
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
  <div id="desktopWrapper" style="left: 73px; right: 0px; ">
    <div id="desktopsContainer" class="desktopsContainer desktopsContainerEx" style="top: 0px; width: 1367px; height: 749px; ">
      <div index="2" class="desktopContainer desktop_current desktop_show_prepare1 desktop_show_animation1" style="left: 1440px; width: 1367px; height: 749px; ">
        <div class="appListContainer" customacceptdrop="1" index="2" style="overflow-y: hidden; display: block; opacity: 1; width: 1339px; margin-left: 28px; height: 703px; margin-top: 46px; " _olddisplay="">
          <div class="scrollBar" style="height: 0px; display: none; " _olddisplay=""></div>
          <div class="appButton addQuickLinkButton" title="添加" screen="2" style="left: 169px; top: 348px; ">
            <div class="addQuickLinkButtonInner"></div>
            <div class="appButton_appName">
              <div class="appButton_appName_inner">添加</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
          </div>
          <div appid="8992" fileid="8992" type="app" id="alloy_icon_app_8992_7" uid="app_8992" class="appButton " title="金山快盘" style="left: 27px; top: 12px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_8992_7_icon_div" style=""><img id="alloy_icon_app_8992_7_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/8/8992/images/big.png" alt="金山快盘"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_8992_7_name" class="appButton_appName_inner">金山快盘</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_8992_7_delete" title="卸载应用"></div>
          </div>
          <div appid="3402" fileid="3402" type="app" id="alloy_icon_app_3402_8" uid="app_3402" class="appButton " title="豆瓣FM" style="left: 27px; top: 124px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_3402_8_icon_div" style=""><img id="alloy_icon_app_3402_8_img" class="appButton_appIconImg" src="http://2.web.qstatic.com/webqqpic/pubapps/3/3402/images/big.png" alt="豆瓣FM"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_3402_8_name" class="appButton_appName_inner">豆瓣FM</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_3402_8_delete" title="卸载应用"></div>
          </div>
          <div appid="2534" fileid="2534" type="app" id="alloy_icon_app_2534_9" uid="app_2534" class="appButton " title="读览天下" style="left: 27px; top: 236px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_2534_9_icon_div" style=""><img id="alloy_icon_app_2534_9_img" class="appButton_appIconImg" src="http://4.web.qstatic.com/webqqpic/pubapps/2/2534/images/big.png" alt="读览天下"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_2534_9_name" class="appButton_appName_inner">读览天下</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_2534_9_delete" title="卸载应用"></div>
          </div>
          <div appid="4" fileid="4" type="app" id="alloy_icon_app_4_10" uid="app_4" class="appButton " title="搜搜地图" style="left: 27px; top: 348px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_4_10_icon_div" style=""><img id="alloy_icon_app_4_10_img" class="appButton_appIconImg" src="http://4.web.qstatic.com/webqqpic/pubapps/0/4/images/big.png" alt="搜搜地图"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_4_10_name" class="appButton_appName_inner">搜搜地图</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_4_10_delete" title="卸载应用"></div>
          </div>
          <div appid="6" fileid="6" type="app" id="alloy_icon_app_6_11" uid="app_6" class="appButton not_deleteable" title="浏览网页" style="left: 27px; top: 460px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_6_11_icon_div" style=""><img id="alloy_icon_app_6_11_img" class="appButton_appIconImg" src="http://6.web.qstatic.com/webqqpic/pubapps/0/6/images/big.png" alt="浏览网页"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_6_11_name" class="appButton_appName_inner">浏览网页</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_6_11_delete" title="卸载应用"></div>
          </div>
          <div appid="64" fileid="64" type="app" id="alloy_icon_app_64_12" uid="app_64" class="appButton " title="Pixlr" style="left: 27px; top: 572px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_64_12_icon_div" style=""><img id="alloy_icon_app_64_12_img" class="appButton_appIconImg" src="http://4.web.qstatic.com/webqqpic/pubapps/0/64/images/big.png" alt="Pixlr"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_64_12_name" class="appButton_appName_inner">Pixlr</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_64_12_delete" title="卸载应用"></div>
          </div>
          <div appid="18" fileid="18" type="app" id="alloy_icon_app_18_13" uid="app_18" class="appButton " title="天气" style="left: 169px; top: 12px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_18_13_icon_div" style=""><img id="alloy_icon_app_18_13_img" class="appButton_appIconImg" src="http://8.web.qstatic.com/webqqpic/pubapps/0/18/images/big.png" alt="天气"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_18_13_name" class="appButton_appName_inner">天气</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_18_13_delete" title="卸载应用"></div>
          </div>
          <div appid="20" fileid="20" type="app" id="alloy_icon_app_20_14" uid="app_20" class="appButton " title="时钟" style="left: 169px; top: 124px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_20_14_icon_div" style=""><img id="alloy_icon_app_20_14_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/pubapps/0/20/images/big.png" alt="时钟"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_20_14_name" class="appButton_appName_inner">时钟</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_20_14_delete" title="卸载应用"></div>
          </div>
          <div fileid="1001" type="dir" id="alloy_icon_dir_1001_15" uid="dir_1001" class="appButton " title="娱乐" style="left: 169px; top: 236px; ">
            <div class="appButton_appIcon " id="alloy_icon_dir_1001_15_icon_div" style=""><img id="alloy_icon_dir_1001_15_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/style/images/filesys/folder_o.png?t=20111011001" alt="娱乐"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_dir_1001_15_name" class="appButton_appName_inner">娱乐</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_dir_1001_15_delete" title="删除文件夹"></div>
          </div>
        </div>
        <div id="appWindow_0" class="window window_current" style="top: 25px; left: 1107px; width: 240px; height: 170px; ">
          <div id="widget_outer_0" class="widget_outer widgetDrag" style="z-index: 11; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; height: 150px; ">
            <div id="widget_inner_0" class="widget_inner" style="z-index:11">
              <div id="widget_bg_container_0" class="widget_bg_container">
                <div class="widget_bg widget_center"></div>
                <div class="widget_bg widget_t"></div>
                <div class="widget_bg widget_rt"></div>
                <div class="widget_bg widget_r"></div>
                <div class="widget_bg widget_rb"></div>
                <div class="widget_bg widget_b"></div>
                <div class="widget_bg widget_lb"></div>
                <div class="widget_bg widget_l"></div>
                <div class="widget_bg widget_lt"></div>
              </div>
              <div class="widget_content">
                <div id="widget_titleBar_0" class="widget_titleBar">
                  <div id="widget_titleButtonBar_0" class="widget_titleButtonBar"><a id="ui_button_0" class="ui_button widget_close" title="关闭" hidefocus="" href="###" style="display: block; "></a><a id="ui_button_1" class="ui_button widget_share" title="分享" hidefocus="" href="###" style="display: block; "></a><a id="ui_button_2" class="ui_button widget_invite" title="邀请" hidefocus="" href="###" style="display: block; "></a></div>
                  <div id="widget_title_0" class="widget_title"></div>
                </div>
                <div id="widget_toolBar_0" class="widget_toolBar"></div>
                <div id="widget_Body_0" class="widget_bodyArea" style="width: 220px; height: 129px; ">
                  <div id="container_iframeApp_0" class="content_area">
                    <div id="starting_iframeApp_0" class="appStartingCover" style="opacity: 0; display: none; " _olddisplay="block">
                      <div id="error_background_0" class="appStartingError"> <a id="appRestart_0" class="appRestart" href="#"></a> </div>
                      <div id="appText_0" class="appText">loading...</div>
                      <div class="appStartingAnimation"></div>
                    </div>
                    <iframe id="iframeApp_0" name="%7B%22appid%22%3A18%2C%22webqqkey%22%3A0.7441380138043314%2C%22webqqdomain%22%3A%22web.qq.com%22%7D" class="iframeApp" frameborder="no" allowtransparency="true" scrolling="auto" hidefocus="" src="http://appx.qq.com/app/weather/index.html" style="left: 0px; width: 100%; height: 100%; "></iframe>
                    <div id="iframeApp_dragResizeMask_0" class="iframeDragResizeMask"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="appWindow_1" class="window window_current" style="width: 185px; height: 192px; top: 160px; left: 1177px; ">
          <div id="widget_outer_1" class="widget_outer widgetDrag" style="padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; height: 172px; z-index: 12; ">
            <div id="widget_inner_1" class="widget_inner" style="z-index:12">
              <div id="widget_bg_container_1" class="widget_bg_container">
                <div class="widget_bg widget_center"></div>
                <div class="widget_bg widget_t"></div>
                <div class="widget_bg widget_rt"></div>
                <div class="widget_bg widget_r"></div>
                <div class="widget_bg widget_rb"></div>
                <div class="widget_bg widget_b"></div>
                <div class="widget_bg widget_lb"></div>
                <div class="widget_bg widget_l"></div>
                <div class="widget_bg widget_lt"></div>
              </div>
              <div class="widget_content">
                <div id="widget_titleBar_1" class="widget_titleBar">
                  <div id="widget_titleButtonBar_1" class="widget_titleButtonBar"><a id="ui_button_3" class="ui_button widget_close" title="关闭" hidefocus="" href="###" style="display: block; "></a><a id="ui_button_4" class="ui_button widget_share" title="分享" hidefocus="" href="###" style="display: block; "></a><a id="ui_button_5" class="ui_button widget_invite" title="邀请" hidefocus="" href="###" style="display: block; "></a></div>
                  <div id="widget_title_1" class="widget_title"></div>
                </div>
                <div id="widget_toolBar_1" class="widget_toolBar"></div>
                <div id="widget_Body_1" class="widget_bodyArea" style="width: 165px; height: 151px; ">
                  <div id="container_iframeApp_1" class="content_area">
                    <div id="starting_iframeApp_1" class="appStartingCover" style="opacity: 0; display: none; " _olddisplay="block">
                      <div id="error_background_1" class="appStartingError"> <a id="appRestart_1" class="appRestart" href="#"></a> </div>
                      <div id="appText_1" class="appText">loading...</div>
                      <div class="appStartingAnimation"></div>
                    </div>
                    <iframe id="iframeApp_1" name="%7B%22appid%22%3A20%2C%22webqqkey%22%3A0.45547649054788053%2C%22webqqdomain%22%3A%22web.qq.com%22%7D" class="iframeApp" frameborder="no" allowtransparency="true" scrolling="auto" hidefocus="" src="http://appx.qq.com/app/clock/index.html" style="left: 0px; "></iframe>
                    <div id="iframeApp_dragResizeMask_1" class="iframeDragResizeMask"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="appWindow_2" class="window window_current" style="display: block; visibility: visible; width: 602px; height: 500px; left: 318px; top: 140px; z-index: 22; ">
        <div id="window_outer_2" class="window_outer" style="z-index: 13; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px; height: 478px; ">
          <div id="window_inner_2" class="window_inner" style="z-index: 22; ">
            <div class="window_bg_container" id="window_bg_container_2"></div>
            <div class="window_content">
              <div id="window_titleBar_2" class="window_titleBar">
                <div id="window_toolButtonBar_2" class="window_toolButtonBar"></div>
                <div id="window_titleButtonBar_2" class="window_titleButtonBar"><a id="ui_button_6" class="ui_button window_action_button window_close" title="关闭" hidefocus="" href="###" style="display: block; "></a></div>
                <div id="window_title_2" class="window_title titleText">系统设置</div>
              </div>
              <div id="window_body_outer_2" class="window_bodyOuter" style="width: 580px; top: 25px; height: 452px; ">
                <div id="window_toolBar_2" class="window_toolBar"></div>
                <div id="window_toggleToolbar_2" class="app_toolbar_icon app_toolbar_toggle app_toolbar_toggle_up" style="display:none"></div>
                <div id="window_body_2" class="window_bodyArea" style="width: 580px; height: 452px; ">
                  <div class="settingCenter_area">
                    <div id="settingCenter_globalSettingBody" class="settingCenter_globalSettingBody"> <a class="settingCenter_settingButton" appid="themeSetting" report="theme" href="###">
                      <div class="settingButton_icon settingButton_themeIcon"></div>
                      <div class="settingButton_text">主题</div>
                      </a> <a class="settingCenter_settingButton" appid="appMarket" report="market" href="###">
                      <div class="settingButton_icon settingButton_marketIcon"></div>
                      <div class="settingButton_text">应用市场</div>
                      </a> <a class="settingCenter_settingButton" appid="notifySetting" report="notify" href="###">
                      <div class="settingButton_icon settingButton_notifySettingIcon"></div>
                      <div class="settingButton_text">QQ提醒</div>
                      </a> <a class="settingCenter_settingButton" appid="notifications" report="notifications" href="###">
                      <div class="settingButton_icon settingButton_notificationsIcon"></div>
                      <div class="settingButton_text">通知设置</div>
                      </a> <a class="settingCenter_settingButton" appid="hotkeySetting" report="hotkey" href="###">
                      <div class="settingButton_icon settingButton_hotkeySettingIcon"></div>
                      <div class="settingButton_text">热键</div>
                      </a> <a class="settingCenter_settingButton" appid="restoreSetting" report="sysrecover" href="###">
                      <div class="settingButton_icon settingButton_restoreSetting"></div>
                      <div class="settingButton_text">系统还原</div>
                      </a> <a class="settingCenter_settingButton" appid="desktopSetting" report="desktopsetting" href="###">
                      <div class="settingButton_icon settingButton_desktopSetting"></div>
                      <div class="settingButton_text">桌面设置</div>
                      </a> </div>
                  </div>
                </div>
              </div>
              <div id="window_controlArea_2" class="window_controlArea" _olddisplay="" style="display: none; "> </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<div id="zoomWallpaperGrid" class="zoomWallpaperGrid" style="position: absolute; z-index: -10; left: 0px; top: 0px; overflow-x: hidden; overflow-y: hidden; height: 100%; width: 100%; "><img id="zoomWallpaper" class="zoomWallpaper" style="position: absolute; top: 0px; left: 0px;" src="module/admincp/css/skin/blue_glow.jpg"></div>
<script type="text/javascript">
var _width = $(window).width(),_height = $(window).height();
$(function(){
	var percent = 0;
	var timer = setInterval(function(){
		$('#startingTips').html(percent+'%');
		if(percent==100){
			window.clearInterval(timer);
		}
		percent++;
	},30);
//	setTimeout(function(){
		$('#startingCover').hide();
//	},3500);
	$('#zoomWallpaperGrid,#zoomWallpaper').css({width:_width,height:_height});
	
//    $('#demo13').click(function() { 
        $.blockUI({ 
            theme:     true, 
            title:    'This is your title', 
            message:  '<p>This is your message.</p>'
           // timeout:   2000 
        }); 
//    });   
})

</script>
</body>
</html>
