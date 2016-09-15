<?php
/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/12
 * Time: 20:49
 */
$config = array();

$config['debug'] = TRUE;

$config['base_path'] = '/var/www/html/DelWeibo/';//代码根目录位置
//$config['base_path'] = 'H:/wamp64/www/DelWeibo/';

$config['base_url'] = 'vm2/';//根目录访问的url，比如http://localhost/DelWeibo/

$config['auto_load'] = array(
	'session',
	'http',
	'config',
);

$config['cookie'] = array(

);