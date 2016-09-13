<?php
/**
 * Created by PhpStorm.
 * User: William
 * Date: 2016/9/12
 * Time: 17:52
 */
if (!empty($config) && $config['debug'] == TRUE) {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
}

require_once('Config/config.php');
require_once('Config/database.php');

//根目录
define('BASEPATH', !empty($config['base_path']) ? $config['base_path'] : str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");

//cookie路径
define('COOKIEPATH', BASEPATH . (!empty($config['cookie_path']) ? $config['cookie_path'] : 'cache/cookie/'));

require_once(BASEPATH . 'global.php');

print_r($config);
require_once(BASEPATH . 'Loader.php');
require_once(BASEPATH . 'Factory.php');




