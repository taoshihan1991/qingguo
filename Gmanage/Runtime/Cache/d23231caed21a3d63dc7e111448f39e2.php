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
	<span class='title'>商品列表</span>
</div>
<div id="content">

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="5%"></th>
				<th width="25%">商品主标题</th>
				<th width="10%">分类名称</th>
				<th width="10%">所属地区</th>
				<th width="15%">商铺名称</th>
				<th width="5%">原价</th>
				<th width="5%">现价</th>
				<th width="5%">销量</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				
				<td><?php echo ($v["gid"]); ?></td>
				<td><?php echo ($v["main_title"]); ?></td>
				<td><?php echo ($v["cname"]); ?></td>
				<td><?php echo ($v["lname"]); ?></td>
				<td><?php echo ($v["shopname"]); ?></td>
				<td>￥<?php echo ($v["old_price"]); ?></td>
				<td>￥<?php echo ($v["price"]); ?></td>
				<td><?php echo ($v["buy"]); ?></td>
				<td>
			
					<a href="<?php echo U('goods/edit',array('gid'=>$v['gid']));?>" class="btn  btn-primary btn-xs">编辑</a>&nbsp;&nbsp;
					<a href="<?php echo U('goods/del',array('gid'=>$v['gid']));?>" class="btn  btn-danger btn-xs delAffirm">删除</a>
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