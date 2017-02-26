<?php 
namespace core\lib;

class conf
{ 
	static public $conf = array();
	
	// 用于读取conf配置文件所设置的参数
	static public function get($name,$file)
	{ 
		/**
		 * 1.判断配置文件是否存在
		 * 2.判断配置是否存在
		 * 3.缓存配置
		 */
		p(self::$conf);
		$path = FRAME.'/core/config/'.$file.'.php';
		
		if (isset(self::$conf[$file])) {
			return self::$conf[$file][$name];
		}else{ 
				if (is_file($path)) {
				// 把从$file引入所返回的文件赋值给$conf
				$conf = include $path;
				if (isset($conf[$name])) {
					// self读取静态方法,赋值给静态属性
					self::$conf[$file] = $conf;
					
					// 这里的return $conf里的$conf是一个数组
					return $conf[$name];
				}else{ 
					throw new \Exception("没有这个配置项".$name);
				}
			}else{ 
				throw new \Exception("找不到配置文件".$file);
				
			} 
		}

	}


	// 用于引入配置文件数组(只传一个参数)
	static public function all($file)
	{ 
		$path = FRAME.'/core/config/'.$file.'.php';
		if (isset(self::$conf[$file])) {
			return self::$conf[$file];
		}else{ 
				if (is_file($path)) {
				// 把从$file引入所返回的文件赋值给$conf
				$conf = include $path;
				self::$conf[$file] = $conf;
					
				// 因为加载的配置参数过多直接返回数组
				return $conf;
				
			}else{ 
				throw new Exception("找不到配置文件".$file, 1);
				
			}
		}

	}


}
