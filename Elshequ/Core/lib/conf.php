<?php
namespace Elshequ\Core\lib;

class conf{
	static public $conf = array();//存储配置名字
	
	//获取核心文件配置
	static public function get($name,$file){
		/*
		 * 1.判断配置文件是否存在
		 * 2.判断配置文件是否存在
		 * 3.缓存配置
		 */
		if(isset(self::$conf[$file])){
			//加载过配置，直接返回
			return self::$conf[$file][$name];
		}else{
			//没有加载过配置
			$path = ELSHEQU.'/Elshequ/Core/config/'.$file.'.php';
			if(is_file($path)){
				$conf = include($path);
				if(isset($conf[$name])){
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					throw new \Exception('没有'.$name.'这个配置项');
				}
			}else{
				throw new \Exception('找不到配置文件'.$file);
			}
		}
	}
	
	//获取数据库配置
	static public function all($file){
		if(isset(self::$conf[$file])){
			//加载过配置，直接返回
			return self::$conf[$file];
		}else{
			//没有加载过配置
			$path = ELSHEQU.'/Core/config/'.$file.'.php';
			if(is_file($path)){
				$conf = include($path);
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				throw new \Exception('找不到配置文件'.$file);
			}
		}
	}
}
