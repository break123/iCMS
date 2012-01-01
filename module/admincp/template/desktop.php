<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>iCMS后台管理</title>
<link href="module/admincp/css/reset.css" rel="stylesheet" type="text/css" />
<link href="module/admincp/css/desktop.css" rel="stylesheet" type="text/css" />
<link href="module/admincp/css/skin.css" rel="stylesheet" type="text/css" id="skincss"/>
<script type="text/javascript" src="module/admincp/js/jquery.js?1.6.2"></script>
<script type="text/javascript" src="module/admincp/js/jquery-ui.js?1.8.16"></script>
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
      <div index="0" class="desktopContainer" style="left: 1440px; width: 1367px; height: 749px; ">
        <div class="appListContainer" customacceptdrop="1" index="0" style="overflow-y: hidden; display: block; opacity: 1; width: 1339px; margin-left: 28px; height: 703px; margin-top: 46px; " _olddisplay="">
          <div class="scrollBar" style="height: 0px; display: none; " _olddisplay=""></div>
          <div class="appButton addQuickLinkButton" title="添加" screen="0" style="left: 27px; top: 460px; ">
            <div class="addQuickLinkButtonInner"></div>
            <div class="appButton_appName">
              <div class="appButton_appName_inner">添加</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
          </div>
          <div appid="48" fileid="48" type="app" id="alloy_icon_app_48_16" uid="app_48" class="appButton " title="欢乐斗地主" style="left: 27px; top: 12px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_48_16_icon_div" style=""><img id="alloy_icon_app_48_16_img" class="appButton_appIconImg" src="http://8.web.qstatic.com/webqqpic/pubapps/0/48/images/big.png" alt="欢乐斗地主"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_48_16_name" class="appButton_appName_inner">欢乐斗地主</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_48_16_delete" title="卸载应用"></div>
          </div>
          <div appid="49" fileid="49" type="app" id="alloy_icon_app_49_17" uid="app_49" class="appButton " title="3366" style="left: 27px; top: 124px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_49_17_icon_div" style=""><img id="alloy_icon_app_49_17_img" class="appButton_appIconImg" src="http://9.web.qstatic.com/webqqpic/pubapps/0/49/images/big.png" alt="3366"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_49_17_name" class="appButton_appName_inner">3366</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_49_17_delete" title="卸载应用"></div>
          </div>
          <div appid="26" fileid="26" type="app" id="alloy_icon_app_26_18" uid="app_26" class="appButton " title="QQ宝贝" style="left: 27px; top: 236px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_26_18_icon_div" style=""><img id="alloy_icon_app_26_18_img" class="appButton_appIconImg" src="http://6.web.qstatic.com/webqqpic/pubapps/0/26/images/big.png" alt="QQ宝贝"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_26_18_name" class="appButton_appName_inner">QQ宝贝</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_26_18_delete" title="卸载应用"></div>
          </div>
          <div fileid="1000" type="dir" id="alloy_icon_dir_1000_19" uid="dir_1000" class="appButton " title="游戏" style="left: 27px; top: 348px; ">
            <div class="appButton_appIcon " id="alloy_icon_dir_1000_19_icon_div" style=""><img id="alloy_icon_dir_1000_19_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/style/images/filesys/folder_o.png?t=20111011001" alt="游戏"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_dir_1000_19_name" class="appButton_appName_inner">游戏</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_dir_1000_19_delete" title="删除文件夹"></div>
          </div>
        </div>
      </div>
      <div index="1" class="desktopContainer" style="left: 1440px; width: 1367px; height: 749px; ">
        <div class="appListContainer" customacceptdrop="1" index="1" style="overflow-y: hidden; width: 1339px; margin-left: 28px; height: 703px; margin-top: 46px; display: block; opacity: 1; " _olddisplay="">
          <div class="scrollBar" style="height: 0px; display: none; " _olddisplay=""></div>
          <div class="appButton addQuickLinkButton" title="添加" screen="1" style="left: 27px; top: 572px; ">
            <div class="addQuickLinkButtonInner"></div>
            <div class="appButton_appName">
              <div class="appButton_appName_inner">添加</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
          </div>
          <div appid="3401" fileid="3401" type="app" id="alloy_icon_app_3401_20" uid="app_3401" class="appButton " title="芒果旅游" style="left: 27px; top: 12px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_3401_20_icon_div" style=""><img id="alloy_icon_app_3401_20_img" class="appButton_appIconImg" src="http://1.web.qstatic.com/webqqpic/pubapps/3/3401/images/big.png" alt="芒果旅游"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_3401_20_name" class="appButton_appName_inner">芒果旅游</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_3401_20_delete" title="卸载应用"></div>
          </div>
          <div appid="2527" fileid="2527" type="app" id="alloy_icon_app_2527_21" uid="app_2527" class="appButton " title="团购地图" style="left: 27px; top: 124px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_2527_21_icon_div" style=""><img id="alloy_icon_app_2527_21_img" class="appButton_appIconImg" src="http://7.web.qstatic.com/webqqpic/pubapps/2/2527/images/big.png" alt="团购地图"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_2527_21_name" class="appButton_appName_inner">团购地图</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_2527_21_delete" title="卸载应用"></div>
          </div>
          <div appid="3693" fileid="3693" type="app" id="alloy_icon_app_3693_22" uid="app_3693" class="appButton " title="快递查询" style="left: 27px; top: 236px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_3693_22_icon_div" style=""><img id="alloy_icon_app_3693_22_img" class="appButton_appIconImg" src="http://3.web.qstatic.com/webqqpic/pubapps/3/3693/images/big.png" alt="快递查询"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_3693_22_name" class="appButton_appName_inner">快递查询</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_3693_22_delete" title="卸载应用"></div>
          </div>
          <div appid="10" fileid="10" type="app" id="alloy_icon_app_10_23" uid="app_10" class="appButton " title="便签" style="left: 27px; top: 348px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_10_23_icon_div" style=""><img id="alloy_icon_app_10_23_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/pubapps/0/10/images/big.png" alt="便签"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_10_23_name" class="appButton_appName_inner">便签</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_10_23_delete" title="卸载应用"></div>
          </div>
          <div appid="13" fileid="13" type="app" id="alloy_icon_app_13_24" uid="app_13" class="appButton not_deleteable" title="网络硬盘" style="left: 27px; top: 460px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_13_24_icon_div" style=""><img id="alloy_icon_app_13_24_img" class="appButton_appIconImg" src="http://3.web.qstatic.com/webqqpic/pubapps/0/13/images/big.png" alt="网络硬盘"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_13_24_name" class="appButton_appName_inner">网络硬盘</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_13_24_delete" title="卸载应用"></div>
          </div>
        </div>
      </div>
      <div index="2" class="desktopContainer desktop_current desktop_current_noanimation" style="left: 1440px; width: 1367px; height: 749px; ">
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
      </div>
      <div index="3" class="desktopContainer" style="left: 1440px; width: 1367px; height: 749px; ">
        <div class="appListContainer" customacceptdrop="1" index="3" style="overflow-y: hidden; width: 1339px; margin-left: 28px; height: 703px; margin-top: 46px; display: block; opacity: 1; " _olddisplay="">
          <div class="scrollBar" style="height: 0px; display: none; " _olddisplay=""></div>
          <div class="appButton addQuickLinkButton" title="添加" screen="3" style="left: 169px; top: 12px; ">
            <div class="addQuickLinkButtonInner"></div>
            <div class="appButton_appName">
              <div class="appButton_appName_inner">添加</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
          </div>
          <div appid="2528" fileid="2528" type="app" id="alloy_icon_app_2528_25" uid="app_2528" class="appButton " title="起点中文" style="left: 27px; top: 12px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_2528_25_icon_div" style=""><img id="alloy_icon_app_2528_25_img" class="appButton_appIconImg" src="http://8.web.qstatic.com/webqqpic/pubapps/2/2528/images/big.png" alt="起点中文"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_2528_25_name" class="appButton_appName_inner">起点中文</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_2528_25_delete" title="卸载应用"></div>
          </div>
          <div appid="45" fileid="45" type="app" id="alloy_icon_app_45_26" uid="app_45" class="appButton " title="QQ阅读" style="left: 27px; top: 124px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_45_26_icon_div" style=""><img id="alloy_icon_app_45_26_img" class="appButton_appIconImg" src="http://5.web.qstatic.com/webqqpic/pubapps/0/45/images/big.png" alt="QQ阅读"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_45_26_name" class="appButton_appName_inner">QQ阅读</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_45_26_delete" title="卸载应用"></div>
          </div>
          <div appid="2526" fileid="2526" type="app" id="alloy_icon_app_2526_27" uid="app_2526" class="appButton " title="虾米电台" style="left: 27px; top: 236px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_2526_27_icon_div" style=""><img id="alloy_icon_app_2526_27_img" class="appButton_appIconImg" src="http://6.web.qstatic.com/webqqpic/pubapps/2/2526/images/big.png" alt="虾米电台"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_2526_27_name" class="appButton_appName_inner">虾米电台</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_2526_27_delete" title="卸载应用"></div>
          </div>
          <div appid="56" fileid="56" type="app" id="alloy_icon_app_56_28" uid="app_56" class="appButton " title="音乐盒子" style="left: 27px; top: 348px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_56_28_icon_div" style=""><img id="alloy_icon_app_56_28_img" class="appButton_appIconImg" src="http://6.web.qstatic.com/webqqpic/pubapps/0/56/images/big.png" alt="音乐盒子"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_56_28_name" class="appButton_appName_inner">音乐盒子</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_56_28_delete" title="卸载应用"></div>
          </div>
          <div appid="15" fileid="15" type="app" id="alloy_icon_app_15_29" uid="app_15" class="appButton " title="腾讯视频" style="left: 27px; top: 460px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_15_29_icon_div" style=""><img id="alloy_icon_app_15_29_img" class="appButton_appIconImg" src="http://5.web.qstatic.com/webqqpic/pubapps/0/15/images/big.png" alt="腾讯视频"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_15_29_name" class="appButton_appName_inner">腾讯视频</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_15_29_delete" title="卸载应用"></div>
          </div>
          <div appid="3148" fileid="3148" type="app" id="alloy_icon_app_3148_30" uid="app_3148" class="appButton " title="乐视网" style="left: 27px; top: 572px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_3148_30_icon_div" style=""><img id="alloy_icon_app_3148_30_img" class="appButton_appIconImg" src="http://8.web.qstatic.com/webqqpic/pubapps/3/3148/images/big.png" alt="乐视网"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_3148_30_name" class="appButton_appName_inner">乐视网</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_3148_30_delete" title="卸载应用"></div>
          </div>
        </div>
      </div>
      <div index="4" class="desktopContainer" style="left: 1440px; width: 1367px; height: 749px; ">
        <div class="appListContainer" customacceptdrop="1" index="4" style="overflow-y: hidden; width: 1339px; margin-left: 28px; height: 703px; margin-top: 46px; display: block; opacity: 1; " _olddisplay="">
          <div class="scrollBar" style="height: 0px; display: none; " _olddisplay=""></div>
          <div class="appButton addQuickLinkButton" title="添加" screen="4" style="left: 27px; top: 572px; ">
            <div class="addQuickLinkButtonInner"></div>
            <div class="appButton_appName">
              <div class="appButton_appName_inner">添加</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
          </div>
          <div appid="21" fileid="21" type="app" id="alloy_icon_app_21_31" uid="app_21" class="appButton " title="朋友网" style="left: 27px; top: 12px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_21_31_icon_div" style=""><img id="alloy_icon_app_21_31_img" class="appButton_appIconImg" src="http://1.web.qstatic.com/webqqpic/pubapps/0/21/images/big.png" alt="朋友网"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_21_31_name" class="appButton_appName_inner">朋友网</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_21_31_delete" title="卸载应用"></div>
          </div>
          <div appid="7" fileid="7" type="app" id="alloy_icon_app_7_32" uid="app_7" class="appButton " title="好友近况" style="left: 27px; top: 124px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_7_32_icon_div" style=""><img id="alloy_icon_app_7_32_img" class="appButton_appIconImg" src="http://7.web.qstatic.com/webqqpic/pubapps/0/7/images/big.png" alt="好友近况"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_7_32_name" class="appButton_appName_inner">好友近况</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_7_32_delete" title="卸载应用"></div>
          </div>
          <div appid="5" fileid="5" type="app" id="alloy_icon_app_5_33" uid="app_5" class="appButton " title="好友管理" style="left: 27px; top: 236px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_5_33_icon_div" style=""><img id="alloy_icon_app_5_33_img" class="appButton_appIconImg" src="http://5.web.qstatic.com/webqqpic/pubapps/0/5/images/big.png" alt="好友管理"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_5_33_name" class="appButton_appName_inner">好友管理</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_5_33_delete" title="卸载应用"></div>
          </div>
          <div appid="2250" fileid="2250" type="app" id="alloy_icon_app_2250_34" uid="app_2250" class="appButton " title="开开" style="left: 27px; top: 348px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_2250_34_icon_div" style=""><img id="alloy_icon_app_2250_34_img" class="appButton_appIconImg" src="http://0.web.qstatic.com/webqqpic/pubapps/2/2250/images/big.png" alt="开开"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_2250_34_name" class="appButton_appName_inner">开开</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_2250_34_delete" title="卸载应用"></div>
          </div>
          <div appid="2535" fileid="2535" type="app" id="alloy_icon_app_2535_35" uid="app_2535" class="appButton " title="开心交友" style="left: 27px; top: 460px; ">
            <div class="appButton_appIcon " id="alloy_icon_app_2535_35_icon_div" style=""><img id="alloy_icon_app_2535_35_img" class="appButton_appIconImg" src="http://5.web.qstatic.com/webqqpic/pubapps/2/2535/images/big.png" alt="开心交友"></div>
            <div class="appButton_appName">
              <div id="alloy_icon_app_2535_35_name" class="appButton_appName_inner">开心交友</div>
              <div class="appButton_appName_inner_right"></div>
            </div>
            <div class="appButton_delete" id="alloy_icon_app_2535_35_delete" title="卸载应用"></div>
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
})

</script>
</body>
</html>
