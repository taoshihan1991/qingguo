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
				
				<!--登录注册-->
					<div class='user-nav login-reg'>
						<a class='title' href="<?php echo U('Login/register');?>">注册</a>
					</div>
					<div class='user-nav login-reg'>	
						<a class='title' href="<?php echo U('Login/index');?>">登录</a>
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
	<link href="../Public/css/reg.css" type="text/css" rel="stylesheet" >
	<script type="text/javascript" src="../Public/js/checkForm.js"></script>
	<script type="text/javascript">
	$(function(){
			var obj=new checkForm('#regForm','.must');
	obj.run({
			'email':{
				preg:/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]+$/i,
				focus:'请填写你的邮箱',
				empty:'邮箱不能为空',
				error:'邮箱格式错误',
				success:'邮箱填写正确',
				ajax:true,
				url:"<?php echo U('Login/check');?>"
			},
			'username':{
				preg:/^[a-z]\w{5,15}$/i,
				focus:'请填写你的用户名',
				empty:'用户名不能为空',
				error:'用户名格式错误',
				success:'用户名填写正确',
				ajax:true,
				url:"<?php echo U('Login/check');?>"
			},
			'password':{
				preg:/^\S{6,32}$/,
				focus:'请填写你的密码',
				empty:'密码不能为空',
				error:'密码格式错误',
				success:'密码填写正确'
			},
			'password_d':{
				focus:'请填写确认密码',
				empty:'确认密码不能为空',
				error:'确认密码不一致',
				success:'确认密码填写正确',
				confirm:'password',

			},
			'code':{
				preg:/^[a-z0-9]{4}$/i,
				focus:'请填写验证码',
				empty:'验证码不能为空',
				error:'验证码格式错误',
				success:'验证码填写正确',
				ajax:true,
				url:"<?php echo U('Login/check');?>"
			}
		});
	})

	</script>
	<div id="regBox">
		<div class='header'>
			已有本站账号?<a href="">登录</a>
		</div>
		<div class='form'>
		<form action="<?php echo U('Login/addUser');?>" method="post" id="regForm">
			<dl class=''>
				<dt>邮箱</dt>
				<dd class='text'><input class='must' type="text"  preg="/^[a-z0-9\.]+@[a-z0-9]+\.[a-z]+$/i" name="email" ajax=1 /></dd>
				<dd class='prompt'>用于登录和找回密码，不会公开</dd>
			</dl>
			<dl>
				<dt>用户名</dt>
				<dd class='text'><input class='must' type="text" name="username" preg="/^[a-z]\w{5,15}$/i" ajax=1 /></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>创建密码</dt>
				<dd class='text'><input class='must' id="password" type="password" name="password" preg="/^\S{6,32}$/"/></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>确认密码</dt>
				<dd class='text'><input class='must' type="password" name="password_d"/></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>所在城市</dt>
				<dd class='area'>
					<select id="s_province" name="s_province"></select>
					<select id="s_city" name="s_city" ></select>
					<select id="s_county" name="s_county"></select>
				</dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt>验证码</dt>
				<dd class='text code' style="width:200px;"><input class='must' type="text"  name="code" ajax=1 /><img src="<?php echo U('Login/showCode');?>"  id="checkCode"/></dd>
				<dd class='prompt'></dd>
			</dl>
			<dl>
				<dt></dt>
				<dd class='submit'><input type="submit" value="注册"></dd>
			</dl>
		</form>
		</div>
	</div>

	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>