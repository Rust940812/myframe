<?php

namespace core;

 class frame
{ 

	public static $classMap  = array();
	public $assign;
	// 启动框架的方法
	static public function run()
	{ 	
		//启动日志类
		\core\lib\log::init();

		// \core\lib\log::log($_SERVER);


		$route = new \core\lib\route(); //实例化一个没有引入的对象出发自动加载
		p($route);
		
		// 引入控制器
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP.'/ctrl/'.$ctrlClass.'Ctrl.php';

		//反斜线比较特殊 
		$ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
		if (is_file($ctrlfile)) {
			include $ctrlfile;
			$tmp = new $ctrlClass();
			$tmp->index();

			// 用于加载日志类
			\core\lib\log::log('ctrl:'.$ctrlClass.PHP_EOL.'action:'.$action);
		}else{ 
			// 抛异常
			throw new Exception("没有引入控制器", 1);
		}

	}


	//自动加载类库
	static public function load($class)
	{ 
		// 自动加载类库
		// 正常引入路由 new\core\route();
		// $class = '\core\route';传进来是这样的,
		//把$class转化成IMOOC.'/core/route.php';

		if (isset($classMap[$class])) {
			return true;
		}else{ 

			$class = str_replace('\\','/', $class);
			$file = FRAME.'/'.$class.'.'.'php';

			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{ 
				return false;
			}

		}

	
	}


	// 加载变量
	public function assign($name,$value)
	{ 
		// 把分配过来的变量按照键值赋值给属性
		$this->assign[$name] = $value;
	}


	// 加载模板
	public function display($file)
	{ 
		$file = APP.'/view/'.$file;
		if (is_file($file)) {
			p($this->assign);
			// extract把数值的键变成变量，值是数组里的值
			extract($this->assign);
			include $file;
		}
	}
} 