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
	<span class='title'>地区列表</span>
</div>
<div id="content">
	<form class="form-horizontal" role="form" id="categoryForm" action="<?php echo U('category/add');?>" method="post">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="5%"></th>
				<th width="40%">地区名称</th>

				<th width="10%">地区排序</th>
				<th width="10%">是否显示</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				
				<td><?php echo ($v["lid"]); ?></td>
				<td><?php echo ($v["_name"]); echo ($v["lname"]); ?></td>

				<td><?php echo ($v["sort"]); ?></td>
				<td><?php if($v['display']): ?>显示<?php else: ?>隐藏<?php endif; ?></td>
				<td>
					<a href="<?php echo U('locality/add',array('lid'=>$v['lid']));?>" class="btn  btn-primary btn-xs">添加子地区</a>&nbsp;&nbsp;
					<a href="<?php echo U('locality/edit',array('lid'=>$v['lid']));?>" class="btn  btn-primary btn-xs">编辑</a>&nbsp;&nbsp;
					<a href="<?php echo U('locality/del',array('lid'=>$v['lid']));?>" class="btn  btn-danger btn-xs">删除</a>
				</td>
				
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
	</form>
</div>
</body>
</html>