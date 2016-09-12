<?php

/**
 * Created by PhpStorm.
 * User: William
 * Date: 2016/9/12
 * Time: 19:50
 */
class Curl
{
	/**
	 * request 执行一次curl请求
	 * @param  string $method   请求方法
	 * @param  string $url      请求的URL
	 * @param  array $fields    执行POST请求时的数据
	 * @return string           请求结果
	 */
	public static function request($method, $url, $fields = array())
	{
		$cookiePath = self::initCookie($url);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiePath);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		if ($method === 'POST') {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		}
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	/**
	 * 初始化cookie
	 * @return string   cookie存放路径
	 */
	private static function initCookie($url){
		$curl = curl_init();//初始化curl模块
		curl_setopt($curl, CURLOPT_URL,$url);//登录提交的地址
		curl_setopt($curl, CURLOPT_HEADER, 1);//是否显示头信息
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息
		curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIEPATH); //设置Cookie信息保存在指定的文件中
		curl_exec($curl);//执行cURL
		curl_close($curl);//关闭cURL资源，并且释放系统资源
	}
}