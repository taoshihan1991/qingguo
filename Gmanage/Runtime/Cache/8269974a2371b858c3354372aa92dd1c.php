<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<script type="text/javascript" src="../Public/js/jquery.min.js"> </script>

<link href="../Public/css/bootstrap.min.css" type="text/css" rel="stylesheet">

<script type="text/javascript" src="../Public/js/common.js"> </script>
<link href="../Public/css/common.css" rel="stylesheet" type="text/css" />

<!--后盾js-->
<script type="text/javascript" src="../Public/js/hdjs.js"> </script>
<link href="../Public/css/hdjs.css" rel="stylesheet" type="text/css" />
<!--//后盾js-->

</head>
<body>
<script type="text/javascript" src="../Public/js/category.js"> </script>

<div id="map">
	<span class='title'>商铺列表</span>
</div>
<div id="content">

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="5%"></th>
				<th width="20%">商铺名称</th>
				<th width="30%">商铺地址</th>
				<th width="20%">商铺电话</th>
	
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				
				<td><?php echo ($v["shopid"]); ?></td>
				<td><?php echo ($v["shopname"]); ?></td>
				<td><?php echo ($v["shopaddress"]); ?></td>
				<td><?php echo ($v["shoptel"]); ?></td>
				
				<td>
					<a href="<?php echo U('Goods/add',array('shopid'=>$v['shopid']));?>" class="btn  btn-primary btn-xs">添加商品</a>&nbsp;&nbsp;
					<a href="<?php echo U('Shop/edit',array('shopid'=>$v['shopid']));?>" class="btn  btn-primary btn-xs">编辑</a>&nbsp;&nbsp;
					<a href="<?php echo U('Shop/del',array('shopid'=>$v['shopid']));?>" class="btn  btn-danger btn-xs delAffirm">删除</a>
				</td>
				
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	<div id="page">
		<?php echo ($page); ?>
	</div>

</div>
</body>
</html>