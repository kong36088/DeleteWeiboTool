<?php
/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/12
 * Time: 20:53
 */
require ('common.php');

$Loader = Factory::getLoader();

//$Loader->http->redirect(base_url('/view/login','.html'));
$Loader->component('curl');
var_dump($Loader->curl->request('get','http://weibo.com/'));