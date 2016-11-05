<?php
//index控制器
namespace app\Controller;
use Elshequ\Core\lib\model;
class indexCtrl extends \Elshequ\Core\elshequ{
	public function index(){
		//$model = new \app\Model\UserModel();
		//$ret = $model->lists();
		
//		p('这是index控制器');

		//链接数据库
		//$model = new model();
		//dump($model);
		//这是官方文档 http://medoo.lvtao.net/doc.select.php
		//select($table表名string, $columns要查询的字段名string/array, $where查询的条件array)
		//$ret = $model->select('user', '*');
		//例子 $datas = $database->select("account", ["user_name","email"], ["user_id[>]" => 100]);
		
		//select($table表名string, $join多表查询,不使用可以忽略array, $columns要查询的字段名string/array, $where查询的条件array)
		//dump($ret);

//获取配置信息
//		$temp = \Core\lib\conf::get('CTRL','route');
//		$temp = \Core\lib\conf::get('ACTION','route');
//		p($temp);die;

		$data = "你好";
		$this->assign('data',$data);
		$this->display('index/index.html');
	}
	
	public function text(){
		$data = "这个好不错";
		$this->assign('data',$data);
		$this->display('index/text.html');
	}
}
