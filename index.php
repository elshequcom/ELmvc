<?php
/*
 * 网站框架入口文件
 * 
 */
define('ELSHEQU',str_replace('\\','/',realpath(dirname(__FILE__))));//网站根目录 D:/WWW/b 
define('CORE',ELSHEQU.'/Elshequ/Core');//网站核心文件目录D:/WWW/Core
define('APP',ELSHEQU.'/app');//项目文件目录D:/WWW/app
define('MODULE','app');//模块
define('DEBUG',true);//是否开启调试模式 


//引入错误展现类
include("Elshequ/vendor/autoload.php");


//判断是否开开启了调试模式
if(DEBUG){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('desplay_error','On');//显示错误信息
}else{
	ini_set('desplay_error','Off');//不显示错误信息
}


//加载公共函数库文件
include_once(CORE.'/common/function.php') ;


//加载核心文件
include_once(CORE.'/elshequ.php');

//当我们调用的类不存在的时候，会调用下面这个方法
spl_autoload_register('\Elshequ\Core\elshequ::load');
//初始化入口文件
\Elshequ\Core\elshequ::run();

