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
/**
* 加密函数(异位或加密字符串)
* @param 要加密的字符串
* @param 自定义的key值
* @param 0加密 1解密
* @return string 加密后的字符串
*/
function enctyption($value,$type=0,$key="taoshihan"){
	if($type==0){
		//加密、
		return str_replace('=','',base64_encode($value^$key));
	}else{
		//解密
		$value=base64_decode($value);
		return $value^$key;
	}
}
 /**
 * 获取当前页面完整URL地址
 * @return string 当前url的地址
 */
function getCurrentUrl() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
 }
 
