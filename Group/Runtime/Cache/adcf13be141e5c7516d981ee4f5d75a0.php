<?php if (!defined('THINK_PATH')) exit();?>	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../Public/css/reset.css" type="text/css" rel="stylesheet" >
<link href="../Public/css/common.css" type="text/css" rel="stylesheet" >
<script type="text/javascript" src="../Public/js/jquery.min.js"></script>
<script type="text/javascript" src="../Public/js/common.js"></script>
<meta name="keywords" content="" />
<meta name="description" content="" />
<title><?php echo ($webInfo["title"]); ?></title>

</head>
<body>
	<!-- 顶部开始 -->
	<div id="top">
		<div class='position'>
			<div class='left'>
				青果团购，清新美团系统
			</div>
			<div class='right'>
				<a href="javascript:addFavorite2();">收藏</a>
			</div>
		</div>
	</div>
	<!-- 顶部结束 -->
	<!-- 头部开始 -->
	<div id="header">
		<div class='position'>
			<div class='logo'>
				<a style="line-height:60px;" href="__ROOT__">青果团购</a>
				<a style="font-size:16px;" href="__ROOT__">www.tshgrw.cn</a>
			</div>
			<div class='search'>
				<div class='item'>
					<a href="">小时代</a>
					<a href="">KTV</a>
					<a href="">电影</a>
					<a href="">全聚德</a>
				</div>
				<div class='search-bar'>
					<input class='s-text' type="text" name="keywords" value="请输入商品名称，地址等">
					<input class='s-submit' type="submit" value='搜索'>
				</div>
			</div>
			<div class='commitment'>
				
			</div>
		</div>
	</div>
	<!-- 头部结束 -->
	<!-- 导航开始-->
	<div id="nav">
		<div class='position'>
			<!-- 分类相关 -->
			<div class='category'>
				<a <?php if(!$_GET['cid']): ?>class="active"<?php endif; ?> href="__ROOT__">首页</a>
				<?php if(is_array($nav)): foreach($nav as $key=>$v): ?><a <?php if($_GET['cid']==$v['cid']): ?>class="active"<?php endif; ?> href="<?php echo U('Index/index',array('cid'=>$v['cid']));?>"><?php echo ($v["cname"]); ?></a><?php endforeach; endif; ?>

			</div>
			<!-- 用户相关 -->
			<div id="user-relevance" class='user-relevance'>
				<?php if($userIsLogin): ?><div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Login/quit');?>">退出</a>
					</div>
					<!--我的团购 -->	
					<div class='user-nav my-hdtg '>
						<a class='title' href="">我的团购</a>
						<ul class="menu">
							<li><a href="">我的订单</a></li>	
							<li><a href="">我的评价</a></li>
							<li><a href="">我的收藏</a></li>
							<li><a href="">我的成长</a></li>
							<li><a href="">账户余额</a></li>
							<li><a href="">账户充值</a></li>
							<li><a href="">账户设置</a></li>
						</ul>
					</div>
				<?php else: ?>
					<!--登录注册-->
					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Login/register');?>">注册</a>
					</div>
					<div class='user-nav login-reg'>	
						<a class='title' href="<?php echo U('Login/index');?>">登录</a>
					</div><?php endif; ?>

				
				<!-- 最近浏览 -->	
					<div  class='user-nav recent-view '>
						<a class='title' href="">最近浏览</a>
						<ul class="menu">
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><del>36</del></span>
								</div>					
							</li>
							<p class='clear'><a href="">清空最近浏览记录</a></p>
						</ul>
					</div>
					<div  class='user-nav my-cart '>
						<a class='title' href=""><i>&nbsp;</i>购物车</a>
						<ul class="menu">
							<li>
								<a class='image' href="">
									<img src="http://p1.meituan.net/80.50/deal/__10119572__2038276.jpg" />
								</a>
								<div>
									<h4>
										<a href="">上岛咖啡双人下午茶套餐，五道口</a>
									</h4>
									<span><strong>¥25</strong><a href="">删除</a></span>
								</div>					
							</li>
							<p class='clear'><a href="">查看我的购物车</a></p>
						</ul>
					</div>
			</div>
		</div>
	</div> 
	<!-- 导航结束 -->
	
	<!-- 载入公共头部文件-->
	<link href="../Public/css/login.css" type="text/css" rel="stylesheet" >
	<script type="text/javascript" src="../Public/js/checkForm.js"></script>
	<script type="text/javascript">
		$(function(){
			var obj=new checkForm('#loginForm','.must');
			obj.run({
				'username':{
					preg:/^\S{3,50}$/i,
					focus:'请填写你的用户名或邮箱',
					empty:'账号不能为空',
					error:'账号需要5-15位',
					success:'账号填写正确'
				},
				'password':{
					preg:/^\S{6,32}$/,
					focus:'请填写你的密码',
					empty:'密码不能为空',
					error:'密码格式错误',
					success:'密码填写正确'
				}
			});
		})
	</script>
	<!-- 页面主体开始 -->
	<div id="login-box">
		<h3>会员登录</h3>
		<div class='left'>
			<div class='form'>
				<form action="<?php echo U('Login/login');?>" method="post" id="loginForm">
				<dl>
					<dt>账号:</dt>
					<dd class='text'>
						<input  type="text" class="must" name="username" />
					</dd>
					<dd class="prompt"></dd>
				</dl>
				<dl>
					<dt>密码:</dt>
					<dd class='text'>
						<input type="password" class="must" name="password"/>
					</dd>
					<dd class="prompt"></dd>
					<dd><a style="color:#11bbbb;" href="">忘记密码</a></dd>
				</dl>
				<dl>
					<dt></dt>
					<dd>
						<label>
							<input type="checkbox"/> 记住账号
						</label>
						&nbsp;&nbsp;				
						<label>
							<input type="checkbox" name="auto_login" value="1" /> 下次自动登录
						</label>
					</dd>
				</dl>
				<dl>
					<dt></dt>
					<dd class='submit'>
						<input type="submit" value="登录">
					</dd>
				</dl>
				</form>
			</div>
		</div>
		<div class='right'>
			<p class='right-title'>尚未注册？</p>
			<a class='reg-link' href="<?php echo U('Login/register');?>">免费注册</a>
			<p class='open-title'>用合作网站账号登录</p>
			<div class='open'>
				<a class='open-login-link sina' href=""><img src="http://study.houdunwang.com/hdlearn/config/img/weibo_login.png"></a>
				<a class='open-login-link qq' href=""><img src="http://study.houdunwang.com/hdlearn/config/img/qq_login.png"></a>
			</div>
		</div>
	</div>

	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>