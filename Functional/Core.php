<?php
require_once('common.php');

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/13
 * Time: 0:31
 */
class Core
{
	protected $Loader;

	public function __construct()
	{
		$this->Loader = Factory::getLoader();
		if(!$_SESSION['user_name']){

		}
	}
}