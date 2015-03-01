<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html style="overflow-y:hidden;">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script type="text/javascript" src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<script type="text/javascript" src="http://cdn.bootcss.com/css3pie/2.0beta1/PIE_IE678.js"></script>
<![endif]-->
<link href="__STATIC__/css/H-ui.css" rel="stylesheet" type="text/css" />
<link href="__STATIC__/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="__STATIC__/font/font-awesome.min.css"/>
<!--[if IE 7]>
<link href="http://www.bootcss.com/p/font-awesome/assets/css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>青果旗下后台管理系统v1.0</title>
<meta name="keywords" content="青果旗下后台管理系统v1.0">
<meta name="description" content="青果旗下后台管理系统v1.0">
</head>
<body style="overflow:hidden">
<header class="Hui-header cl"> <a class="Hui-logo l" title="H-ui.admin v2.0" href="/">青果旗下后台管理系统</a> <a class="Hui-logo-m l" href="/" title="H-ui.admin">QG</a> <span class="Hui-subtitle l">V1.0</span> <span class="Hui-userbox"><span class="c-white">超级管理员：admin</span> <a class="btn btn-danger radius ml-10" href="#" title="退出"><i class="icon-off"></i> 退出</a></span> <a aria-hidden="false" class="Hui-nav-toggle" id="nav-toggle" href="#"></a> </header>
<div class="cl Hui-main">
  <aside class="Hui-aside" style="">
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    <div class="menu_dropdown bk_2">
      <dl id="menu_1">
        <dt><i class="icon-user"></i> 用户中心<b></b></dt>
        <dd>
          <ul>
            <li><a _href="user-list.html" href="javascript:;">用户管理</a></li>
            <li><a _href="user-list-del.html" href="javascript:;">删除的用户</a></li>
            <li><a _href="user-list-black.html" href="javascript:;">黑名单</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu_2">
        <dt><i class="icon-edit"></i> 资讯管理<b></b></dt>
        <dd>
          <ul>
            <li><a _href="<?php echo U('Xwclass/index');?>" href="javascript:void(0)">分类管理</a></li>
            <li><a _href="artice-list.html" href="javascript:void(0)">资讯管理</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu_3">
        <dt><i class="icon-picture"></i> 图片库<b></b></dt>
        <dd>
          <ul>
            <li><a _href="artice-class.html" href="javascript:void(0)">分类管理</a></li>
            <li><a _href="picture-list.html" href="javascript:void(0)">图片管理</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu_4">
        <dt><i class="icon-beaker"></i> 产品库<b></b></dt>
        <dd>
          <ul>
            <li><a _href="product-brand.html" href="javascript:void(0)">品牌管理</a></li>
            <li><a _href="artice-class.html" href="javascript:void(0)">分类管理</a></li>
            <li><a _href="product-list.html" href="javascript:void(0)">产品管理</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-page">
        <dt><i class="icon-paste"></i> 页面管理<b></b></dt>
        <dd>
          <ul>
            <li id="menu-page-home"><a _href="page-home.html" href="javascript:void(0)">首页管理</a></li>
            <li id="menu-page-flink"><a _href="page-flink.html" href="javascript:void(0)">友情链接</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-admin">
        <dt><i class="icon-key"></i> 管理员管理<b></b></dt>
        <dd>
          <ul>
            <li id="menu-admin-role"><a _href="admin-role.html" href="javascript:void(0)">角色管理</a></li>
            <li id="menu-admin-permission"><a _href="admin-permission.html" href="javascript:void(0)">权限管理</a></li>
            <li id="menu-admin-list"><a _href="admin-list.html" href="javascript:void(0)">管理员列表</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-system">
        <dt><i class="icon-cogs"></i> 系统管理<b></b></dt>
        <dd>
          <ul>
            <li id="menu-system-base"><a _href="system-base.html" href="javascript:void(0)">基本设置</a></li>
            <li><a _href="system-lanmu.html" href="javascript:void(0)">栏目设置</a></li>
            <li id="menu-system-data"><a _href="system-data.html" href="javascript:void(0)">数据字典</a></li>
            <li id="menu-system-shielding"><a _href="system-shielding.html" href="javascript:void(0)">屏蔽词</a></li>
            <li id="menu-system-log"><a _href="system-log.html" href="javascript:void(0)">系统日志</a></li>
          </ul>
        </dd>
      </dl>
      <dl id="menu-tongji">
        <dt><i class="icon-bar-chart"></i> 系统统计<b></b></dt>
        <dd>
          <ul>
            <li><a _href="codeing.html" href="javascript:void(0)">统计列表</a></li>
          </ul>
        </dd>
      </dl>
    </div>
  </aside>
  <div class="dislpayArrow"><a class="pngfix" href="javascript:void(0);"></a></div>
  <section class="Hui-article">
    <div id="Hui-tabNav" class="Hui-tabNav">
      <div class="Hui-tabNav-wp">
        <ul id="min_title_list" class="acrossTab cl">
          <li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
        </ul>
        
      </div>
      <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-backward"></i></a><a id="js-tabNav-next" class="btn radius btn-default btn-small" href="javascript:;"><i class="icon-step-forward"></i></a></div>
    </div>
    <div id="iframe_box" class="Hui-articlebox">
      <div class="show_iframe">
        <div style="display:none" class="loading"></div>
        <iframe scrolling="yes" frameborder="0" src="welcome.html"></iframe>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/H-ui.js"></script>
<script type="text/javascript" src="__STATIC__/js/H-ui.admin.js"></script>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>