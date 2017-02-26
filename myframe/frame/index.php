<?php
/**
 *入口文件
 *1.定义常量
 *2.加载函数库
 *3.启动框架
 */
	// 定义目录常量
	define('FRAME', str_replace('\\','/',realpath(dirname(__FILE__).'/')));  //这是根目录
	// die();
	define('CORE', FRAME.'/core'); //这个是核心文件夹
	define('APP', FRAME.'/app');
	define('MODULE','app');
	define('DEBUG', true);
	// die();
	// echo CORE;
	// echo APP;
	// 显示错误的开关,ini_get直接设置php_ini
	if (DEBUG) {
		ini_set('display_error','On');
	}else{ 
		ini_set('display_error','Off');
	}

	// 引入函数库,   
	include CORE.'/common/function.php';
	include CORE.'/frame.php';

	// 把frame注册成__altoload类似的函数,用于自动加载
	spl_autoload_register('\core\frame::load');

	// 利用命名空间去加载run();
	\core\frame::run();  





