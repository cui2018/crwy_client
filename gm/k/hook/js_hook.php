<?php
/* 
 * 脚本加载类
 * @Package Name: Js_hook
 * @Author: Keboy xolox@163.com
 * @Modifications:No20170629
 *
 */
class Js_hook extends Controller {
	//后台权限验证
	public function show() {
		parent::$data['js'] = Load::library('js');
	}
}