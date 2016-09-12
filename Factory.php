<?php

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/13
 * Time: 0:36
 */
class Factory
{
	public static function getLoader(){
		return new Loader();
	}
}