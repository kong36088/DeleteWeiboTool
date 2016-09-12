<?php
/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/12
 * Time: 23:27
 */

//根目录
define('BASEPATH', !empty($config['base_path']) ? $config['base_path'] : str_replace('\\', '/', realpath(dirname(__FILE__) . '/')) . "/");

//cookie路径
define('COOKIEPATH', BASEPATH . (!$config['cookie_path'] ? $config['cookie_path'] : 'cache/cookie/'));