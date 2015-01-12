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
	<span class='title'>编辑地区</span>
</div>
<div id="content">
	<form class="form-horizontal" role="form" id="categoryForm" action="<?php echo U('category/edit',array('cid'=>$category['cid']));?>" method="post">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="20%">名称</th>
				<th>值</th>

			</tr>
		</thead>
		<tbody>
			<tr>
				<td>所属分类</td>
	
				<td>
					<select name="pid" class="form-control">
						<option value="<?php echo ($parent["cid"]); ?>"><?php echo ($parent["cname"]); ?></option>
						<option value="0">顶级分类</option>
						<?php if(is_array($level)): foreach($level as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>"><?php echo ($v["_name"]); echo ($v["cname"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>分类名称</td>
	
				<td><input type="text" name="cname" class="form-control" value="<?php echo ($category["cname"]); ?>" /></td>
			</tr>
			<tr>
				<td>分类标题</td>
	
				<td><textarea name="title" class="form-control"><?php echo ($category["title"]); ?></textarea></td>
			</tr>
			<tr>
				<td>分类关键字</td>
	
				<td><textarea name="keywords" class="form-control"><?php echo ($category["keywords"]); ?></textarea></td>
			</tr>
			<tr>
				<td>分类描述</td>
	
				<td><textarea name="description" class="form-control"><?php echo ($category["description"]); ?></textarea></td>
			</tr>
			<tr>
				<td>分类排序</td>
	
				<td><input type="text" name="sort" class="form-control" value="<?php echo ($category["sort"]); ?>" /></td>
			</tr>
			<tr>
				<td>是否显示</td>
	
				<td>
					<label>
						<span>显示</span><input type="radio" name="display" value="1" <?php if($category['display']==1): ?>checked="checked"<?php endif; ?>
					</label>
					&nbsp;&nbsp;
					<label>
						<span>隐藏</span><input type="radio" name="display" value="0" <?php if($category['display']==0): ?>checked="checked"<?php endif; ?>>
					</label>
				</td>
			</tr>
			<tr>
				<td></td>
	
				<td><input type="submit" value="提交"  class="btn btn-primary"/></td>
			</tr>
		</tbody>
	</table>
	</form>
</div>
</body>
</html>