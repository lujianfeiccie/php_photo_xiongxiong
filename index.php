<?php
define('APP_NAME','Index');
define('APP_PATH','./Index/');
define('APP_DEBUG',TRUE);
if(defined("SAE_MYSQL_DB")){ //SAE环境
	include './ThinkPHP/Extend/Engine/Sae.php';
}else{
	include './ThinkPHP/ThinkPHP.php';//引入ThinkPHP核心运行文件
}
?>