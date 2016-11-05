<?php
namespace Elshequ\Core\lib;
use Elshequ\Core\lib\conf;
class route{
	
	public $ctrl;   //存放控制器 
	public $action; //存放方法
	
	//路由的构造函数
	public function __construct(){
		//xxx.com/index/index
		//xxx.com/index.php/index/index
		/*
		 * 1.隐藏index.php
		 * 2.获取url参数部分
		 * 3.返回对应控制器和方法
		 */
		//p($_SERVER['REDIRECT_URL']); // /index/index
		if(isset($_SERVER['REDIRECT_URL']) && $_SERVER['REDIRECT_URL'] != '/'){
			//用/分割这个字符串  /index/index
			$path = $_SERVER['REDIRECT_URL'];
			$pathArr = explode('/',trim($path,'/'));// 去除前后/斜线Array([0] => index[1] => index)
			if($pathArr[0]){
				//判断存在就存入控制器
				$this->ctrl = $pathArr[0];
			}
			//删除控制器，为了解析参数
			unset($pathArr[0]);
			if($pathArr[1]){
				//判断存在就存入方法
				$this->action = $pathArr[1];
				unset($pathArr[1]);
			}else{
				//判断不存在就默认
				$this->action = conf::get('ACTION','route'); //index方法
			}
			
			//如果带参数呢
			//url多余部分转成 GET
			//id/1/str/2/test/3
			$count = count($pathArr) + 2;
			$i = 2;
			while($i < $count){
				if(isset($pathArr[$i + 1])){
					//说明有个参数值没有例如 id/1/str/ 这个参数数组就是奇数个数
					$_GET[$pathArr[$i]] = $pathArr[$i + 1];
				}
				$i = $i + 2;
			}
			unset($_GET[$_SERVER['QUERY_STRING']]);
		}else{
			//默认控制器是 index
			$this->ctrl = conf::get('ACTION','route'); //index 控制器
			//默认方法也是 index
			$this->action = conf::get('ACTION','route'); //index方法
		}
	}
}
