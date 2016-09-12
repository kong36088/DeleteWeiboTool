<?php

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/12
 * Time: 20:38
 */
class Loader
{
	public $is_loaded = array();
	public $component = array();
	public $functional = array();

	public function __construct()
	{
		//自动加载组件
		foreach ($config['auto_load'] as $key => $component) {
			$this->component($component);
		}
	}

	/**
	 * 类名预处理
	 * @param string $className
	 */
	private function preHandle(&$className = ''){
		$className = ucfirst(strtolower($className));
	}
	/**
	 * 加载组件类
	 * @param string $className 类名
	 * @return boolean
	 */
	public function component($className = '')
	{
		$this->preHandle($className);

		$file = BASEPATH . 'Component/' . $className . '.php';
		if(in_array($file,$this->is_loaded)){
			return TRUE;
		}
		if (file_exists($file)) {
			require_once($file);

			$this->is_loaded[] = $file;
			$this->$className=new $className();
			return TRUE;
		} else {
			die($className . '不存在');
		}
	}

	public function functional($className = '')
	{
		$this->preHandle($className);

		$file = BASEPATH . 'Functional/' .$className . '.php';
		if(in_array($file,$this->is_loaded)){
			return TRUE;
		}
		if (file_exists($file)) {
			require_once($file);

			$this->is_loaded[] = $file;
			$this->$className=new $className();
			return TRUE;
		} else {
			die($className . '不存在');
		}
	}

	public function gComponent($className){
		return $this->component[$className];
	}
}