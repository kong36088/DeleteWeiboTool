<?php

/**
 * Created by PhpStorm.
 * Author: William
 * Date: 2016/9/13
 * Time: 0:15
 */
require_once('Functional/Core.php');

class Delete extends Core
{
	// TODO 加入删除开始序号
	public function start($loopTimes = 1)
	{
		//循环执行次数
		for ($i = 0, $failTimes = 0; $i < $loopTimes;) {
			$content = $this->getContent();
			print_r($content);
			/*if (!$content) {
				if ($failTimes < 1) {
					$failTimes++;
					continue;
				} else {
					die('获取微博内容失败，请访问用浏览器访问一下微博页面并刷新');
				}
			}
			$WeiboIds = $this->getAllWeiboId($content);
			foreach ($WeiboIds as $wid) {
				echo '删除id为：' . $wid . '的微博' . PHP_EOL;
				var_dump($this->delWeiboById($wid));
			}*/
			$i++;
		}

	}

	/**
	 * 正则获取页面上所有微博的ID
	 */
	protected function getAllWeiboId($content)
	{
		$regx = '/,\"idstr\"\:\"([^\"]*)/';
		preg_match_all($regx, $content, $matchs);
		return $matchs[1];
	}

	/**
	 * 获取个人微博页面内容
	 */
	protected function getContent()
	{
		return $this->load->curl->request('GET', $this->load->config->get('self_page_url'), $this->load->config->get('sina_phone_header'));
	}

	/**
	 * 删除微博接口
	 * @param array $WeiboIds 正则获取到的微博id
	 */
	public function delWeiboById($WeiboId = '')
	{
		return $this->load->curl->request('POST', $this->load->config->get('del_weibo_api'), $this->load->config->get('sina_phone_delete_header'),array('id'=>(string)$WeiboId));
	}
}

$delete = new Delete();
//$delete->start();
var_dump($delete->delWeiboById('3488147201723695'));

/**
" 删除id为：3488378815080281的微博 string(23629) "
" 删除id为：3488147353054791的微博 string(23629) "
" 删除id为：3488129891916563的微博 string(23629) "
" 删除id为：3488147201723695的微博 string(23629) "
" 删除id为：3488071968534821的微博 string(23629) "
" 删除id为：3487950044218245的微博 string(23629) "
" 删除id为：3487803029346396的微博 string(23629) "
" 删除id为：3487772478650233的微博  删除id为：3487727616071737的微博 string(23629) "
" 删除id为：3487716673266893的微博 string(23629) "
" 删除id为：3487726299253771的微博 string(23629) "
" 删除id为：3487672910212601的微博 string(23629) "
"
 */