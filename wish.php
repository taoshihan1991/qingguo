<?php
define('APP_NAME','wish');
define('APP_PATH','./Wish/');          
define('ROOT_PATH', str_replace("\\", '/', dirname(__FILE__)));
define("RUNTIME_PATH", ROOT_PATH . "/Runtime/Wish/");
define('APP_DEBUG',true);

define('ROOT_URL',strtolower('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/'));



require('./ThinkPHP/ThinkPHP.php');


?>