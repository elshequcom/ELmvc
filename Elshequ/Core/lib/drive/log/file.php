<?php
//日志存在文件系统中
namespace Elshequ\Core\lib\drive\log;
use Elshequ\Core\lib\conf;
class file{
	protected $path; //存储日志文件路径
	public function __construct(){
		$patharr = conf::get('OPTION','log');//Array([PATH] => D:/WWW/b/Runtime/logs/)
		$this->path = $patharr['PATH']; 
	}
	
	//写入日志的方法
	/*
	 * 	\Core\lib\log::log('hahah');//写入日志的方法
	 * $message 日志内容
	 * $file 日志文件名
	 */
	public function log($message,$file='log'){
		/* 1. 判断一下日志目录是否存在
		 * 2. 日志文件名是否更改，默认log
		 * 
		 */
		if(!is_dir($this->path.date('YmdH'))){
			//日志目录不存在，用最高权限创建目录
			mkdir($this->path.date('YmdH'),'0777',true);
		}
		//调整内容，在每条日志前面加一个时间 2016-10-17 17:21:07-->["1212zas","asjajs"] 文件名2016101717log.php
	 	return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',date('Y-m-d H:i:s').'-->'.json_encode($message).PHP_EOL,FILE_APPEND); //将日志内容下入文件,用JSON格式的
	}
}
