<?php
$config = require(ROOT_PATH."/Conf/config.php");
$array = array(
	//'配置项'=>'配置值'
	'TMPL_L_DELIM' => '{',
  	'TMPL_R_DELIM' => '}',
  	'URL_HTML_SUFFIX' => '',  
  	'DB_HOST' => 'localhost',
	'DB_NAME' => 'hdgroup',
	'DB_USER' => 'root',
	'DB_PWD' => 'taoshihan1',
	'DB_PORT' => '3306',
	'DB_PREFIX' => 'group_',
	'UPLOAD_MAX_SIZE' => 2000000,//最大上传大小
	'UPLOAD_PATH' => './Uploads/',//文件上传保存路径
	'UPLOAD_EXTS' => array('jpg','jpeg','gif','png'),//文件上传保存路径

	 /********************商品服务****************************/
	 'goods_server'=>array(
	 	1=>array(
	 		'name'=>'假一赔十',
	 		'img'=>''
	 	),
	 	2=>array(
	 		'name'=>'支持随时退款',
	 		'img'=>''
	 	),
	 	3=>array(
	 		'name'=>'不支持随时退款',
	 		'img'=>''
	 	)
	 ),

);
return array_merge($config,$array);
?>