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
);
return array_merge($config,$array);
?>