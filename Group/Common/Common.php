<?php
/**
* 前台函数库
* @author 陶士涵
* @time 2015年1月17日21:08:27
*/
/**
* 获取不同大小的图片路径
* @param 数据库存的图片路径数据
* @param max medium mini 取不同尺寸图片
* @return string 图片路径
*/
function getPicUrl($goods_img,$size){
	$img_arr=explode(',',$goods_img);
	$src='';
	switch ($size) {
		case 'max':
			$src=$img_arr[0];
			break;
		case 'medium':
			$src=$img_arr[1];
			break;
		case 'mini':
			$src=$img_arr[2];
			break;
		default:
			$src=$img_arr[0];
			break;
	}
	return ROOT_URL.$src;
}