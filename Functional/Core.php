<?php
require_once('common.php');

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/13
 * Time: 0:31
 */

/**
 * Class Core
 * 核心Functional类，功能类统一继承Core，类似于控制器的超类，主要负责初始化验证等工作
 */
class Core
{
	protected $Loader;

	public function __construct()
	{
		$this->Loader = Factory::getLoader();
		$this->user_name = $_SESSION['user_name'];
		$this->user_id = $_SESSION['user_id'];
	}

	public function checkLogin(){
		if($_SESSION['user_name']||$_SESSION['user_id']){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}