<?php

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/13
 * Time: 0:36
 */
class Factory
{
	private static $loader;

	public static function getLoader()
	{
		if (self::$loader) {
			return self::$loader;
		}
		self::$loader = new Loader();
		return self::$loader;
	}
}