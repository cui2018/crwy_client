<?php
/* 
 * API全局类
 * @Package Name: API_hook
 * @Author: Keboy xolox@163.com
 * @Modifications:No20180625
 *
 */
class Api_hook extends Controller {
	//全局加载
	public function init() {
		header("ACCESS-CONTROL-ALLOW-ORIGIN: *");
		header("Access-CONTROL-ALLOW-METHODS: POST, GET, OPTIONS, PUT, DELETE");
		header('Access-CONTROL-ALLOW-HERDERS:x-requested-with,content-type');
	}
}