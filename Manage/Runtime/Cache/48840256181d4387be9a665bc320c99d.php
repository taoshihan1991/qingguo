<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="__PUBLIC__/zd_js/prototype.lite.js" type="text/javascript"></script>
<script src="__PUBLIC__/zd_js/moo.fx.js" type="text/javascript"></script>
<script src="__PUBLIC__/zd_js/moo.fx.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/zd_js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/zd_js/chili-1.7.pack.js"></script>
<script type="text/javascript" src="__PUBLIC__/zd_js/jquery.easing.js"></script>
<script type="text/javascript" src="__PUBLIC__/zd_js/jquery.dimensions.js"></script>
<script type="text/javascript" src="__PUBLIC__/zd_js/jquery.accordion.js"></script>
<script language="javascript">
	jQuery().ready(function(){
		jQuery('#navigation').accordion({
			header: '.head',
			navigation1: true, 
			event: 'click',
			fillSpace: true,
			animated: 'bounceslide'
		});
	});
</script>
<style type="text/css">
<!--
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
}
a{
	color:#000000
}
a:hover{
	color:#FF0000}
a:visited{
	color:#000000}
#navigation {
	margin:0px;
	padding:0px;
	width:147px;
	height:100%;
	overflow:auto;
}
#navigation a.head {
	cursor:pointer;
	background:url(__PUBLIC__/images/main_34.gif) no-repeat scroll;
	display:block;
	font-weight:bold;
	margin:0px;
	padding:5px 0 5px;
	text-align:center;
	font-size:12px;
	text-decoration:none;
}
#navigation ul {
	border-width:0px;
	margin:0px;
	padding:0px;
	text-indent:0px;
}
#navigation li {
	list-style:none; display:inline;
}
#navigation li a {
  text-align:left;	  
}
#navigation li li a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
}
#navigation li .nLi a {
	display:block;
	font-size:12px;
	text-decoration: none;
	text-align:left;
	padding:3px;
	padding-left:10px;
}
#navigation li div a {
	display:inline;
	line-height:25px;
	font-size:12px;
	text-decoration: none;
	text-align:center;
	padding:3px;
	padding-left:20px;
}
#navigation li li a:hover {
	background:url(__PUBLIC__/images/tab_bg.gif) repeat-x;
		border:solid 1px #adb9c2;
}
-->
</style>
</head>
<body>

<div  style="height:100%;">
  <ul id="navigation">

    <li> <a class="head">综 合 管 理</a>
      <ul>
        <li><a href="<?php echo U('Public/main');?>" target="rightFrame">管理首页 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('Config/index');?>" target="rightFrame">网站设置 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 设置</a></li>
		<li><a href="/index.php?m=index&a=buildindex" target="rightFrame">静态首页 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 生成</a></li>
		<li><a href="<?php echo U('Public/clearCache');?>" target="rightFrame">清理缓存 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 清理</a></li>
		
      </ul>
    </li>    
    
    <li> <a class="head">单 页 管 理</a>
      <ul>
        <li><a href="<?php echo U('About/index');?>" target="rightFrame">所有单页 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('About/add');?>" target="rightFrame">添加单页 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 添加</a></li>
      </ul>
    </li> 
    
     <li> <a class="head">文 章 管 理</a>
      <ul>
        <li><a href="<?php echo U('Xwclass/index');?>" target="rightFrame">所有分类 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('Xw/index');?>" target="rightFrame">所有文章 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('Xw/add');?>" target="rightFrame">添加文章 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 添加</a></li>
      </ul>
    </li> 
    
     <li> <a class="head">图 片 管 理</a>
      <ul>
      	<li><a href="<?php echo U('Cpclass/index');?>" target="rightFrame">所有分类 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('Cp/index');?>" target="rightFrame">所有产品 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('Cp/add');?>" target="rightFrame">添加产品 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 添加</a></li>
      </ul>
    </li> 

	<li> <a class="head">现 货 管 理</a>
      <ul>
        <li><a href="<?php echo U('Xh/index');?>" target="rightFrame">所有现货 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('Xh/add');?>" target="rightFrame">添加现货 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 添加</a></li>
      </ul>
    </li> 

	<li> <a class="head">关 键 词 管 理</a>
      <ul>
        <li><a href="<?php echo U('key/index');?>" target="rightFrame">关键词 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('key/add');?>" target="rightFrame">关键词 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 添加</a></li>
      </ul>
    </li>

	<li> <a class="head">友 情 链 接</a>
      <ul>
        <li><a href="<?php echo U('link/index');?>" target="rightFrame">管理友链 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
        <li><a href="<?php echo U('link/add');?>" target="rightFrame">友链添加 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 添加</a></li>
      </ul>
    </li>

	<li> <a class="head">管 理 员 管 理</a>
      <ul>
        <li><a href="<?php echo U('Admin/index');?>" target="rightFrame">管理员 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
      
      </ul>
    </li>

	<li> <a class="head">数 据 库 管 理</a>
      <ul>
		<li><a href="<?php echo U('Baksql/backall');?>" target="rightFrame" target="_blank">数据库 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 备份</a></li>
		<li><a href="<?php echo U('Baksql/index');?>" target="rightFrame" target="_blank">数据库 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 还原</a></li>
      </ul>
    </li>

	<li> <a class="head">上 传 文 件 管 理</a>
      <ul>
        <li><a href="<?php echo U('File/index');?>" target="rightFrame">文件夹管理器 <img src="__PUBLIC__/images/icon.jpg" width="7" height="5" border="0"> 管理</a></li>
		
      </ul>
    </li>

	<li> <a class="head">版 本 信 息</a>
      <ul>
        <li><a href="http://Www.zhde.cn" target="_blank">智得网络</a></li>
      </ul>
    </li>
  </ul>
</div>
</body>
</html>