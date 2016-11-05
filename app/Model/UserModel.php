<?php
namespace app\Model;
use \ElshequCore\lib\model;
class UserModel extends model{
	public $table = 'user';
	public function lists(){
		//使用官方文档 http://medoo.lvtao.net/doc.select.php
		return $ret = $this->select($this->table,'*');
	}
}
