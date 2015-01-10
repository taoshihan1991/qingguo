<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../Public/css/base.css" type="text/css" rel="stylesheet">
<link href="../Public/css/index.css" type="text/css" rel="stylesheet">
<link href="../Public/css/reset.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="../Public/js/jquery.min.js"> </script>
<script	type="text/javascript" src="../Public/js/index.js"></script>

<base target="showContent" />
<title>后盾团购</title>

</head>
<body style="" scroll="no">

<div id="header">
	<div class='hd-box'>
		<div class='hd-top'>
			<div class="logo">
				<a href="__APP__"><img src="../Public/images/logo.png"/></a>
			</div>
			<div class='logout'>
				<a style='color:#FFF;' href="">站点主页</a>
				<a href="">退出登录</a>
			</div>
		</div>
		<div class='bar'>
			<div class='home'>
				<a href="__APP__"></a>
			</div>
			<div class="nav">
				
				<a href="javascript:void(0);">会员管理</a>
				
				<a href="javascript:void(0);">地区管理</a>
				
				<a href="javascript:void(0);">分类管理</a>
			
				<a href="javascript:void(0);">商铺管理</a>
				
				<a href="javascript:void(0);">商品管理</a>
				
				<a  href="javascript:void(0);">订单管理</a>
				
				<a class='active' href="javascript:void(0);">站点概要</a>
			</div>
		</div>
	</div>
</div>
<div id="box">
	<div id="sidebar">
		<!-- 会员管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">会员管理</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
		<!-- 地区管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">地区管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('locality/add');?>">添加地区</a></li>
					<li><a href="<?php echo U('locality/index');?>">地区列表</a></li>
				</ul>
			</div>
		</div>
		<!-- 分类管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">分类管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('Category/add');?>">添加分类</a></li>
					<li><a href="<?php echo U('Category/index');?>">分类列表</a></li>
				</ul>
			</div>
		</div>
		<!-- 商铺管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">商铺管理</a>
				<ul class='menuList' >
					<li><a href="<?php echo U('shop/add');?>">添加商铺</a></li>
					<li><a href="<?php echo U('shop/index');?>">商铺列表</a></li>
				</ul>
			</div>	
		</div>	
		<!-- 商品管理 -->
		<div class='menuItem'>
			<div class='menu'>
				<a class='title' href="javascript:void(0);">商品管理</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>	
		</div>
		<!-- 订单管理 -->
		<div class='menuItem'>
			<div class='menu'>	
				<a class='title' href="javascript:void(0);">订单管理</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
		<!-- 站点概要 -->
		<div class='menuItem' style="display:block;">
			<div class='menu'>	
				<a class='title' href="javascript:void(0);">站点概要</a>
				<ul class='menuList' >
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="content">
		 <iframe id="iContent" name='showContent' height="100%" width="100%" frameborder="0" src="<?php echo U('Index/welcome');?>" >
     		  
	 	</iframe>
	</div>
</div>
</body>
</html>