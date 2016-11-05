<?php
//辅助函数库文件，会自动调用

/*
 * 输出变量或者数组
 */
function p($var){
	if(is_bool($var)){
		var_dump($var);
	}else if(is_null($var)){
		var_dump(NULL);
	}else{
		echo "<pre style='border: 1px solid #3399ff;border-radius: 44px;color: red;font-size: 24px;line-height: 20px;padding: 10px;position: relative;z-index: 1000;'>";
		print_r($var);
		echo "</pre>";
	}
}


/*
 * 接收post请求
 * $data 表单接收的参数
 * $default 默认参数
 * $fitt 过滤模式
 */
function Post($data,$default= 'false',$fitt = 'false'){
	$data = $_POST[$data];
	if(isset($data)){
		switch($fitt){
			case 'int':
				if(is_numeric($data)){
					return $data;
				}else{
					return $default;
				}
			break;
		}
	}else{
		return $default;
	}
}


/*
 * 接收Get请求
 */
function Get(){
	
}