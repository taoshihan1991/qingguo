<?php
$config = require(ROOT_PATH."/Conf/config.php");
$array=array(
	//'配置项'=>'配置值'
	'URL_MODEL'=>0,
	'TMPL_PARSE_STRING'=>array(
		'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Public/'
	),

	'DB_BACKUP'=>ROOT_PATH."/Upload/database/",
	//'SHOW_PAGE_TRACE'=>true
);

return array_merge($config,$array);
?>