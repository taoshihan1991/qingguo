<?php
// +----------------------------------------------------------------------
// | 青果许愿墙
// +----------------------------------------------------------------------
// | 新年许愿开始啦
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 陶士涵
// +----------------------------------------------------------------------
define('APP_NAME','wish');
define('APP_PATH','./Wish/');          
define('ROOT_PATH', str_replace("\\", '/', dirname(__FILE__)));
define("RUNTIME_PATH", ROOT_PATH . "/Runtime/Wish/");
define('APP_DEBUG',true);
define('ROOT_URL',strtolower('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/'));
require('./ThinkPHP/ThinkPHP.php');
?>