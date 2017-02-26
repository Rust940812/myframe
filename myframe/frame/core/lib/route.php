<?php
namespace core\lib;

class route
{ 	
	public $ctrl;
	public $action;

	// 用于加载路由
	public function __construct()
	{ 
		// 1.隐藏index.php
		// 2.获取url，参数部分
		// 3.返回对应控制器和方法

		$path = $_SERVER['REQUEST_URI'];
		$tmp = '/work/myframe/frame/index.php';
		$length = strlen($tmp);
		$path = substr($path,$length);
		// 处理url地址
		// 这是因为WAMP的apache设置有问题，所以要用字符串函数去处理
		
		if (isset($_SERVER['REQUEST_URI']) && $path != '') {

				$patharr = explode('/', trim($path,'/'));
				if (isset($patharr[0])) {
					$this->ctrl = $patharr[0];
					unset($patharr[0]);
				}

				if (isset($patharr[1])) {
					$this->action = $patharr[1];
					unset($patharr[1]);
				}else{ 
					$this->action = conf::get('ACTION','route');
				}

				// url多余部分转化成GET
				// id/1/str/2/test/3
				$count = count($patharr) + 2;
				$i = 2;
				while ($i <= $count) {
					if (isset($patharr[$i + 1])) {
						$_GET[$patharr[$i]] = $patharr[$i + 1];
					}
					$i = $i + 2;
				}

			}else{

				$this->ctrl = conf::get('CTRL','route');
				$this->action = conf::get('ACTION','route');
			}

				
	}
}
