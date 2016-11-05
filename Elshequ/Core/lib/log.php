<?php
namespace Elshequ\Core\lib;
use Elshequ\Core\lib\conf;
class log{
	static $class; //用来存储类名
	
	/*
	 * 1. 确定日志的存储方式
	 * 2. 写日志
	 */
	static public function init(){
		//确定存储方式
		$drive = conf::get('DRIVE','log'); //获取配置参数
		$class = '\Elshequ\Core\lib\drive\log\\'.$drive;//类名
		self::$class = new $class; //将生成好的对象存入静态类名属性中
		
	}
	//调用写日志的方法，写入日志文件
	static public function log($name,$file='log'){
		self::$class->log($name,$file);
	}
}
