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


<div id="map">
	<span class='title'>添加商品</span>
</div>
<div id="content">
	<form class="form-horizontal" role="form" id="goodsForm" action="<?php echo U('Goods/edit',array('gid'=>$info['gid']));?>" method="post">
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
	
				<td><input type="hidden" name="shopid" value="<?php echo ($info["shopid"]); ?>" /><?php echo ($info["shopname"]); ?></td>
			</tr>
			<tr>
				<td>分类名称</td>
	
				<td>
					<select name="cid" class="form-control">
						<option value="<?php echo ($info["cid"]); ?>"><?php echo ($info["cname"]); ?></option>
						<?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>"><?php echo ($v["_name"]); echo ($v["cname"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>所属地区</td>
	
				<td>
					<select name="lid" class="form-control">
						<option value="<?php echo ($info["lid"]); ?>"><?php echo ($info["lname"]); ?></option>
						<?php if(is_array($locality)): foreach($locality as $key=>$v): ?><option value="<?php echo ($v["lid"]); ?>"><?php echo ($v["_name"]); echo ($v["lname"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>商品主标题</td>
	
				<td><input type="text" name="main_title" class="form-control" value="<?php echo ($info["main_title"]); ?>" /></td>
			</tr>
			<tr>
				<td>商品副标题</td>
	
				<td><input type="text" name="sub_title" class="form-control" value="<?php echo ($info["sub_title"]); ?>" /></td>
			</tr>
			<tr>
				<td>商品现价</td>
	
				<td><input type="text" name="price" class="form-control" value="<?php echo ($info["price"]); ?>" /></td>
			</tr>
			<tr>
				<td>商品原价</td>
	
				<td><input type="text" name="old_price" class="form-control" value="<?php echo ($info["old_price"]); ?>" /></td>
			</tr>
			<tr>
				<td>商品展示图</td>
	
				<td><input type="file" id="goods_img" class="form-control"/>
				<input type="hidden" name="goods_img" id="hid_img" value="<?php echo ($info["goods_img"]); ?>" />
				<?php if($info['goods_img']): ?><img src="__ROOT__<?php $pic=explode(',',$info['goods_img']);echo $pic[1];?>" id="thumb" class="img-thumbnail"/><?php endif; ?>
				<input type="hidden" name="old_img" value="<?php echo ($info["goods_img"]); ?>"/>
				</td>
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
						fileTypeDesc : 'Image File',//windows保存类型那里
						fileTypeExts : '*.jpeg;*.jpg;*.png;*.gif',//允许选择的文件类型
						formData : {<?php echo session_name();?>:'<?php echo session_id();?>'},//解决session丢失问题
						//上传成功后的回调函数
						onUploadSuccess : function(file,data,res){
							data=JSON.parse(data);
							if(data.status){
								$('#thumb').attr('src','__ROOT__/'+'Uploads/Goods/'+data.path.medium);
								var imgPath='/Uploads/Goods/'+data.path.max+',/Uploads/Goods/'+data.path.medium+',/Uploads/Goods/'+data.path.mini;
								$('#hid_img').val(imgPath);
							}else{
								alert(data.msg);
							}
						}
					});
				</script>
				<!--//图片上传插件-->
			</tr>
			<tr>
				<td>商品服务</td>
				<td>
					<?php if(is_array($goods_server)): foreach($goods_server as $k=>$v): ?><label><input type="checkbox" name="goods_server[]" value="<?php echo ($k); ?>" 
						<?php if(in_array($k,$info['goods_server'])): ?>checked="checked"<?php endif; ?>
						/>&nbsp;<?php echo ($v["name"]); ?>
						</label><br/><br/><?php endforeach; endif; ?>
				</td>
			</tr>
			<tr>
				<td>商品详情</td>
				<td>
					<!--Umeditor编辑器-->
					<script id="detail" name="detail" type="text/plain" style="width:600px;height:200px;"><?php echo ($info["detail"]); ?></script>
					<!-- 样式文件 -->
					<link rel="stylesheet" href="__PUBLIC__/Umeditor/themes/default/css/umeditor.css">
					<!-- 配置文件 -->
					<script type="text/javascript" src="__PUBLIC__/Umeditor/umeditor.config.js"></script>
					<!-- 编辑器源码文件 -->
					<script type="text/javascript" src="__PUBLIC__/Umeditor/umeditor.js"></script>
					<!-- 实例化编辑器代码 -->
					<script type="text/javascript">
					    $(function(){
					        window.um = UM.getEditor('detail', {
					            /* 传入配置参数,可配参数列表看umeditor.config.js */
					            toolbar: ['undo redo | bold italic underline | emotion image'],
					            imageUrl:"<?php echo U('Common/uploadDetailImg');?>",//php处理脚本
					            imagePath:'__ROOT__/Uploads/Goods/',
					            focus: true,
					            enterTag:'br'
					        });
					    });
					</script>
					<!--//Umeditor编辑器-->
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