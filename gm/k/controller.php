<?php
/* 
 * 控制器父类
 * @Package Name: Controller
 * @Author: Keboy xolox@163.com
 * @Modifications:No20170629
 *
 */

class Controller {
	public static $data = array(
		'webconfig' => array(
			'admintitle' => '潮人微游GM管理平台v3.0.0'
		)
	);
	public function logop($remark = '',$data = '') {
		Load::database()->insert('log_operate',array(
			'aid' => self::$data['me']['id'],
			'time' => NOW_TIME,
			'ip' => ip_address(),
			'sa' => self::$data['me']['sa'],
			'remark' => $remark,
			'data' => $data
		));
	}
}