<?php
/* 
 * 后台权限验证类
 * @Package Name: Admin_hook
 * @Author: Keboy xolox@163.com
 * @Modifications:No20170629
 *
 */
class Admin_hook extends Controller {
	//后台权限验证
	public function checking() {
		if ( Uri::$class == 'login' ) return;
		$cookie = Load::library('cookie');
		$adminid = $cookie->get('adminid');
		if ( !$adminid ) show_admin_notice('登录状态已超时，请重新登录！','login');
		$adminid = @decrypt($adminid);
		if ( !$adminid ) show_admin_notice('登录身份错误，请重新登录！','login');
		if ( Uri::$class == 'index' ) return;
		$this->db = Load::database();
		$this->modules = $this->db->max('module','','id');
		parent::$data['me'] = $this->db->one('admin',$adminid);
		parent::$data['me']['power'] = $this->_myPower();
		$module = $this->db->one('module',array(
			'sign' => Uri::$class
		));
		if ( $module && !substr(parent::$data['me']['power'],$module['id'] - 1,1) ) show_admin_error('您没有访问此页面的权限！','back');
		Load::view('/admin/head.php',parent::$data);
	}
	//获取当前用户的权限字符串
	public function _myPower() {
		if ( parent::$data['me']['sa'] ) return str_repeat('1',$this->modules);
		else {
			if ( parent::$data['me']['roleid'] == 0 ) return parent::$data['me']['power'];
			else {
				$role = $this->db->one('role',parent::$data['me']['roleid']);
				if ( $role ) return $role['power'];
				else return parent::$data['me']['power'];
			}
		}
	}
}