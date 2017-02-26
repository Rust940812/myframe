<?php 
namespace core\lib;

class Log
{ 
	/**
	 * 1.确定日志存储方式
	 * 2.写日志
	 */
	static public $class;
	// 确定日志的存储方式，确认
	static public function init()
	{
		// 确定存储方式
		// 加载配置
		$drive = conf::get('DRIVE','log');
		$class = '\core\lib\drive\log\\'.$drive;
		self::$class = new $class;
	}

	static  public function log($name,$file = 'log')
	{ 
		self::$class->log($name);
	}
}

 ?>
