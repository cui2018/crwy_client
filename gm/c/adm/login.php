<?php
/*
	myadmin初始密码：1qaz@WSX`
	姓名用户名初始密码：开头大写姓名首拼@wsx`，例如用户苏刚的密码为：Sg@WSX`
*/
class Login extends Controller {
	//登录
	public function index() {
		$cookie = Load::library('cookie');
		if ( $cookie->get('adminid') ) redirect(ua('/index'));
		if ( post() ) {
			$uname = post('u');
			$upswd = post('p');
			$db = Load::database();
			$admin = $db->one('admin',array(
				'uname' => $uname
			));
			if ( !$admin ) return api_success(array(
				'login' => 0,
				'msg' => '用户名或密码不正确'
			));
			$pswd = decrypt($admin['upswd']);
			if ( $upswd != $pswd ) return api_success(array(
				'login' => 0,
				'msg' => '用户名或密码不正确'
			));
			$cookie->set('adminid',encrypt($admin['id']));
			$db->update('admin',array(
				'lastlogin' => time(),
				'lastip' => ip_address()
			),$admin['id']);
			$db->insert('log_login',array(
				'aid' => $admin['id'],
				'time' => NOW_TIME,
				'ip' => ip_address(),
				'sa' => $admin['sa']
			));
			return api_success(array(
				'login' => 1
			));
		}
		Load::view('admin/login.php',parent::$data);
	}
	//注销
	public function out() {
		$cookie = Load::library('cookie');
		$cookie->delete('adminid');
		redirect(ua('/login'));
	}
}