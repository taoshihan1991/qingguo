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
	
<!-- 载入公共头部文件结束 -->
	<link href="../Public/css/detail.css" type="text/css" rel="stylesheet" >
	<div id="map" class='position'>
		<a href="<?php echo U('Index/index',array('lid'=>$info['lid']));?>"><?php echo ($info["lname"]); ?></a><span>»</span><a href="<?php echo U('Index/index',array('cid'=>$info['cid']));?>"><?php echo ($info["cname"]); ?></a><span>»</span><a><?php echo ($info["shopname"]); ?></a>	</div>
	<div id="content" class='position' style="height:3000px;">
		<div class='content-left'>
			<div class="goods-intro">
				<div class='goods-title'>
					<h1><?php echo ($info["main_title"]); ?></h1>
					<h3><?php echo ($info["sub_title"]); ?></h3>
				</div>
				<div class='deal-intro'>
					<div class='buy-intro'>
						<div class='price'>
							<div class='discount-price'>
								<span>¥</span><?php echo ($info["price"]); ?>
							</div>
							<div class='cost-price'>
								<span class='discount'><?php echo ($info["zhekou"]); ?>折</span>
								门店价<b>¥<?php echo ($info["old_price"]); ?></b>
							</div>
						</div>
						<div class='deal-buy-cart'>
							<a href="<?php echo U('Member/buy',array('gid'=>$info['gid']));?>" class='buy'></a>
							<a href="<?php echo U('Cart/index',array('gid'=>$info['gid']));?>" class='cart'></a>
						</div>
						<div class='purchased'>
							<p class='people'>
								<span><?php echo ($info["buy"]); ?></span>人已团购
							</p>
							<p class='time'>
								剩余<span>3</span>天以上
							</p>
						</div>
						<ul class='refund-intro'>
							<?php if(is_array($info["goods_server"])): foreach($info["goods_server"] as $key=>$v): ?><li>
								<span class='ico'><?php echo ($v["img"]); ?></span>
								<span class='text'><?php echo ($v["name"]); ?></span>
							</li><?php endforeach; endif; ?>
					
						</ul>
					</div>
					<div class='image-intro'>
						<img src="<?php echo getPicUrl($info['goods_img'],'max');?>"/>
					</div>
				</div>
				<div class='collect'>
					<a class='collect-link' href=''><i></i>收藏本单</a>
					
					<div class='share'>
						
					</div>
					
				</div>
			</div>
			<div class='detail'>
				<ul class='plot-points'>
					<li class='active'><a href="#shop-site">商家位置</a></li>
					<li><a href="#details">本单详情</a></li>
					<li><a href="#comment">消费评价</a></li>
				</ul>
				<div id="shop-site" class='shop-site'>
					<p class='site-title'>商家位置</p>
					<div class='box'>
						<div class='map' id="Bmap">
							
						</div>
						<div class='info'>
							<h3><?php echo ($info["shopname"]); ?></h3>
							<dl>
								<dt>地址:</dt>
								<dd><?php echo ($info["shopaddress"]); ?></dd>
							</dl>
							<dl>
								<dt>公交:</dt>
								<dd><?php echo ($info["metroaddress"]); ?></dd>
							</dl>
							<dl>
								<dt>电话:</dt>
								<dd><?php echo ($info["shoptel"]); ?></dd>
							</dl>
						</div>
					</div>
				</div>
				<div id="details"  class='details'>
					<?php echo ($info["detail"]); ?>
				</div>
				<div id="comment" class='comment'>
					<div class='comment-list-title'>
						<span>全部评价</span>
						<a class='order-time' href="">按时间<i></i></a>
					</div>
					<div class='comment-list'>
						<div class='list-con'>
							<div class='con-top'>
								<span class='username'>sdas</span>
								<span class='time'>评价于:<em>2013-08-04</em></span>
							</div>
							<p>
								说是香草拿铁不是很苦，结果根本不是想象中的味道！像速溶冲调！还要另加五元？有此一说吗？银座店环境一般！
							</p>
						</div>
						
					</div>
					<div class='comment-page'>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
						<a href="">1</a>
					</div>
				</div>
			</div>
		
		</div>
		<div class='content-right'>
			<div class='recommend'>
				<h3 class='recommend-title'>
					看过本团购的用户还看了
				</h3>
				<div class='recommend-goods'>
					<a class='goods-image' href="">
						<img alt="图像加载失败.." src="http://p0.meituan.net/200.121/deal/__5738304__3391447.jpg">
					</a>
					<h4>
						<a href="">【五道口】上岛咖啡：双人下午茶套餐，美味齐分享</a>
					</h4>
					<p>
						<strong>¥39.8</strong>
						<span class='cost-price'>门店价<del>144</del></span>
						<span class='num'>
							<span>173</span>
							 人已团购
						</span>
					</p>
				</div>
			</div>
		</div>
		
		
		
	</div>		














<!-- 载入公共底部文件开始 --> 
	
	<div id="footer">
		<p>本demo不用于任何商业目的，仅供学习与交流</p>
	</div>
	</body>
</html>
<!-- 载入公共底部文件结束 -->

					<!--百度地图实例-->
					<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=nZs75slzWpQGsIaloDGpGCGA"></script>
					<script type="text/javascript">
						// 百度地图API功能
						var map = new BMap.Map("Bmap");
						map.enableScrollWheelZoom(true);
						var point=new BMap.Point(<?php echo $info['shopcoord'];?>);
						map.centerAndZoom(point,20);
						var marker = new BMap.Marker(point);  // 创建标注
						map.addOverlay(marker);               // 将标注添加到地图中
						marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
						var cr = new BMap.CopyrightControl({anchor: BMAP_ANCHOR_TOP_RIGHT});   //设置版权控件位置
						map.addControl(cr); //添加版权控件

						var bs = map.getBounds();   //返回地图可视区域
						cr.addCopyright({id: 1, content: "<a href='http://www.tshgrw.cn' style='font-size:14px;text-decoration:none;color: #1e9999;'>青果网旗下团购系统</a>", bounds: bs});
					</script>
					<!--//百度地图实例-->