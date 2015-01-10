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
<script type="text/javascript" src="../Public/js/goods.js"> </script>

<div id="map">
	<span class='title'>添加商品</span>
</div>
<div id="content">
	<form class="form-horizontal" role="form" id="goodsForm" action="<?php echo U('Goods/add');?>" method="post">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="20%">名称</th>
				<th>值</th>

			</tr>
		</thead>
		<tbody>
			<tr>
				<td>商铺名称</td>
	
				<td><input type="hidden" name="shopid" value="<?php echo ($shop["shopid"]); ?>" /><?php echo ($shop["shopname"]); ?></td>
			</tr>
			<tr>
				<td>分类名称</td>
	
				<td>
					<select name="pid" class="form-control">
						<option value="0">请选择分类</option>
						<?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>"><?php echo ($v["_name"]); echo ($v["cname"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>所属地区</td>
	
				<td>
					<select name="pid" class="form-control">
						<option value="0">请选择地区</option>
						<?php if(is_array($locality)): foreach($locality as $key=>$v): ?><option value="<?php echo ($v["lid"]); ?>"><?php echo ($v["_name"]); echo ($v["lname"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>商品主标题</td>
	
				<td><input type="text" name="main_title" class="form-control"/></td>
			</tr>
			<tr>
				<td>商品副标题</td>
	
				<td><input type="text" name="sub_title" class="form-control"/></td>
			</tr>
			<tr>
				<td>商品现价</td>
	
				<td><input type="text" name="price" class="form-control"/></td>
			</tr>
			<tr>
				<td>商品原价</td>
	
				<td><input type="text" name="old_price" class="form-control"/></td>
			</tr>
			<tr>
				<td>商品展示图</td>
	
				<td><input type="file" name="goods_img" id="goods_img" class="form-control"/></td>
				<!--图片上传插件uploadify-->
				<link rel="stylesheet" type="text/css" href="__PUBLIC__/Uploadify/uploadify.css"/>
				<script type="text/javascript" src='__PUBLIC__/Uploadify/jquery.uploadify.min.js'></script>
				<script type="text/javascript">
					$('#goods_img').uploadify({
						swf : '__PUBLIC__/Uploadify/uploadify.swf',//载入swf
						uploader : "<?php echo U('Common/uploadGoodsImg');?>",//php处理脚本
						width : 120,//按钮的宽度
						height : 30,//按钮的高度
						buttonImage: "__PUBLIC__/Uploadify/browse-btn.png",//按钮背景图
						fileTypeDesc : 'Image File'
					});
				</script>
				<!--//图片上传插件-->
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