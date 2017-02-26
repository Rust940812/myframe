<?php
namespace core\lib;
// use core\lib\conf;

class model extends \PDO
{ 
	public function __construct()
	{ 
		$dsn = 'mysql:host=localhost;dbname=test';
		$username = 'root';
		$passwd = '';
		$var = conf::all('database');

		// var_dump($var);
		// 利用PDO去连接
		try {
			parent::__construct($var['DSN'],$var['USERNAME'],$var['PASSWD']);
		} catch (Exception $e) {
			p($e->getMessage());
		}
	}
}