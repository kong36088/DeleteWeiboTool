<?php

/**
 * Created by PhpStorm.
 * User: William
 * Date: 2016/9/12
 * Time: 19:50
 */
class Curl
{
	public $cookie='SINAGLOBAL=4947131473301.778.1461049199608; __gads=ID=746e3c69bff4031d:T=1473778913:S=ALNI_MbhE_zR2VX2YzgLRreFNEhM7xjc0A; _s_tentry=chenall.net; Apache=2528766078208.533.1473944214530; ULV=1473944214561:27:6:4:2528766078208.533.1473944214530:1473907065265; UOR=blog.csdn.net,widget.weibo.com,www.ddazhi.com; login_sid_t=807c8a155ab9ece09b72ebc36aa1322d; YF-Ugrow-G0=8751d9166f7676afdce9885c6d31cd61; YF-V5-G0=ab4df45851fc4ded40c6ece473536bdd; WBStorage=86fb700cbf513258|undefined; SCF=AuHRnn-UiRFN2SLuvt-YUI_wB4PePW0GLrj-HMqvAm2AZ0Ko5ZFCFXUAFLkNqFsQ2gGA3sagGOfRobGxV_g3CBY.; SUB=_2A2563uziDeTxGedI6loZ8ifKwz-IHXVZqlkqrDV8PUNbmtBeLXjgkW8ePVveJGsk2g_TqSYvr5bMvvIKRQ..; SUBP=0033WrSXqPxfM725Ws9jqgMF55529P9D9WFjyNj8jSg1PXxFzv8CrJXN5JpX5K2hUgL.Fo2ceKnReo.c1he2dJLoI7vZC-81xfU8C-plK.UGxXMt; SUHB=0y0oaquOQ0QAca; ALF=1505480754; SSOLoginState=1473944755; un=longzai3608@vip.qq.com; wvr=6; YF-Page-G0=0acee381afd48776ab7a56bd67c2e7ac';
	/**
	 * request 执行一次curl请求
	 * @param  string $method   请求方法
	 * @param  string $url      请求的URL
	 * @param  array $fields    执行POST请求时的数据
	 * @return string           请求结果
	 */
	public function request($method, $url, $fields = array())
	{
		$cookiePath = self::initCookie($url);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiePath);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.130 Safari/537.36');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		if ($method === 'POST') {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		}
		if($this->cookie){
			curl_setopt($ch,CURLOPT_COOKIE,$this->cookie );
		}
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	/**
	 * 初始化cookie
	 * @return string   cookie存放路径
	 */
	public function initCookie($url){
		$curl = curl_init();//初始化curl模块
		curl_setopt($curl, CURLOPT_URL,$url);//登录提交的地址
		curl_setopt($curl, CURLOPT_HEADER, 1);//是否显示头信息
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息
		curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIEPATH); //设置Cookie信息保存在指定的文件中
		curl_exec($curl);//执行cURL
		curl_close($curl);//关闭cURL资源，并且释放系统资源
	}
}