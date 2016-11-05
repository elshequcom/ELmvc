<?php
namespace Elshequ\Core\lib;
use Elshequ\Core\lib\conf;
class model extends \medoo{
	public function __construct(){
		$option = conf::all('database');
		parent::__construct($option);
	}
}
