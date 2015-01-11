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
	<span class='title'>编辑商铺</span>
</div>
<div id="content">
	<form class="form-horizontal" role="form" id="localityForm" action="<?php echo U('shop/edit',array('shopid'=>$info['shopid']));?>" method="post">
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
	
				<td><input type="text" name="shopname" class="form-control" value="<?php echo ($info["shopname"]); ?>" /></td>
			</tr>

			<tr>
				<td>商铺地址</td>
	
				<td><input type="text" name="shopaddress" class="form-control" value="<?php echo ($info["shopaddress"]); ?>" /></td>
			</tr>
			<tr>
				<td>公交地址</td>
	
				<td><input type="text" name="metroaddress" class="form-control" value="<?php echo ($info["metroaddress"]); ?>"/></td>
			</tr>
			<tr>
				<td>商铺电话</td>
	
				<td><input type="text" name="shoptel" class="form-control" value="<?php echo ($info["shoptel"]); ?>"/></td>
			</tr>
			<tr>
				<td>商铺坐标</td>
	
				<td><input type="text" name="shopcoord" class="form-control" value="<?php echo ($info["shopcoord"]); ?>"/></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<!--百度地图实例-->
					<style type="text/css">
						#allmap{width:100%;height:300px;}
					</style>
					<div id="allmap"></div>
					<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=nZs75slzWpQGsIaloDGpGCGA"></script>
					<script type="text/javascript">
						// 百度地图API功能
						var map = new BMap.Map("allmap");
						map.enableScrollWheelZoom(true);
						var point=new BMap.Point(<?php echo $info['shopcoord'];?>);
						map.centerAndZoom(point,20);
						var marker = new BMap.Marker(point);  // 创建标注
						map.addOverlay(marker);               // 将标注添加到地图中
						marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
						function showInfo(e){
							$('input[name=shopcoord]').val(e.point.lng + "," + e.point.lat);
						}
						map.addEventListener("click", showInfo);
					</script>
					<!--//百度地图实例-->
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