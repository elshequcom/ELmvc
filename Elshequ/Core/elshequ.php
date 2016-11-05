<?php
//定义命名空间
namespace Elshequ\Core;
class elshequ{
	//存储引入的类名
	public static $classMap = array();
	public $assign; // 存入控制器赋值给模板的数据

	//核心文件启动方法
	static public function run(){
		\Elshequ\Core\lib\log::init();//启动日志类
		//生成核心对象
		$route = new \Elshequ\Core\lib\route();
		//存放控制器
		$ctrlClass = $route->ctrl;
		//存放方法
		$action = $route->action;
		//加载控制器的类文件
		$ctrlfile = APP.'/Controller/'.$ctrlClass.'Ctrl.php';
		$cltrlClass = '\\'.MODULE.'\Controller\\'.$ctrlClass.'Ctrl';
		
		//判断控制器类文件是否存在
		if(is_file($ctrlfile)){
			// D:/WWW/b/app/Controller/indexCtrl.php
			include($ctrlfile); //引入类文件
			$ctrl = new $cltrlClass(); //生成控制器对象
			$ctrl->$action();
			//调用写入日志的方法 \Core\lib\log::log('kongzhiqi:'.$ctrlClass.'--fangfa:'.$action);//写入日志的方法
		}else{
			//抛出异常
			throw new \Exception('找不到'.$ctrlClass.'控制器');
		}
	}
	
	//自动加载类库
	static public function load($class){
		// new \Common\route();
		// $class = '\Common\route'; 目的是转化成这样 ELSHEQU./'Common/route.php';
		if(isset($classMap[$class])){
			//说明已经引入过了，就直接返回TRUE
			return true;
		}else{
			//说明没有引入过，继续加载类文件
			$class = str_replace('\\','/',$class); //替换/
			$file = ELSHEQU.'/'.$class.'.php';
			if(is_file($file)){
				//说明这个xxx.php文件存在
				include($file);
				self::$classMap[$class]=$class;//把引入的类名存入静态变量
			}else{
				//这个文件不存在
				return false;
			}
		}
	}
	
	public function assign($name,$vulue){
		$this->assign[$name] = $vulue;
	}
	
	public function display($file){  
    //验证文件是否存在  
    $files = APP.'/View/'.$file;
    if(is_file($files)){  
        //将数组打散，键为变量，变量的值为键所对应的值  
        // extract($this->assign);  
        // include($files);  
        //使用TWIG模板引擎
        \Twig_Autoloader::register();
		$loader = new \Twig_Loader_Filesystem(APP.'/View'); 
        $twig = new \Twig_Environment($loader, array(  
            'cache'=>ELSHEQU."/Runtime/cache",
			"debug"=> DEBUG, 
        ));  
        $template = $twig->loadTemplate($file);  
        $template->display($this->assign?$this->assign:array());
    }else{  
        echo $file.'文件不存在';  
    }  
} 
	
}
