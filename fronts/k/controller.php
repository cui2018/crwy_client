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
			'admintitle' => '潮人微游v3.0.0'
		),
		'qd' => 'PT',
		'upqd' => false,
		'title' => '潮人微游'
	);
	public function __construct() {
		$qd = get('qd');
		if ( $qd ) {
			self::$data['qd'] = $qd;
			self::$data['upqd'] = true;
		}
	}
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