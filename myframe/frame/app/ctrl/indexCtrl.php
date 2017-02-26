<?php
namespace app\ctrl;
class indexCtrl extends \core\frame
{ 
	// 类名之所以要加上Ctrl是因为防止跟方法名重复
	public function index()
	{ 
		// p('this is index!!!!'); 

		$tmp = \core\lib\conf::get('CTRL','route');
		// get方法执行了两次，第二次就做缓存
		$tmp = \core\lib\conf::get('ACTION','route');

		$model = new \core\lib\model();
		var_dump($model);
		// $sql = "select * from table";
		// $res = $model->query($sql);
		// echo 'res';
		// p($res->fectchAll());

		$data = 'hello world';
		$this->assign('data',$data);
		$this->display('index.html');
	}


}