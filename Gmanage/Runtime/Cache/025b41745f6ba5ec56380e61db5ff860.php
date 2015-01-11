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
<script type="text/javascript" src="../Public/js/locality.js"> </script>

<div id="map">
	<span class='title'>添加地区</span>
</div>
<div id="content">
	<form class="form-horizontal" role="form" id="localityForm" action="<?php echo U('locality/add');?>" method="post">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="20%">名称</th>
				<th>值</th>

			</tr>
		</thead>
		<tbody>
			<tr>
				<td>所属地区</td>
	
				<td>
					<select name="pid" class="form-control">
						<option value="<?php echo ($parent["lid"]); ?>"><?php echo ($parent["lname"]); ?></option>
						<option value="0">顶级地区</option>
						<?php if(is_array($level)): foreach($level as $key=>$v): ?><option value="<?php echo ($v["lid"]); ?>"><?php echo ($v["_name"]); echo ($v["lname"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>地区名称</td>
	
				<td><input type="text" name="lname" class="form-control"/></td>
			</tr>
			
			<tr>
				<td>地区排序</td>
	
				<td><input type="text" name="sort" class="form-control"/></td>
			</tr>
			<tr>
				<td>是否显示</td>
	
				<td>
					<label>
						<span>显示</span><input type="radio" name="display" value="1" checked="checked">
					</label>
					&nbsp;&nbsp;
					<label>
						<span>隐藏</span><input type="radio" name="display" value="0">
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