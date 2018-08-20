<?php
class Password extends Controller {
	//密码修改
	public function index() {
		//修改密码
		if ( post() ) {
			$old = post('old_password');
			$new = post('new_password');
			$encrypt = Load::library('encrypt');
			if ( $old != $encrypt->decrypt(parent::$data['me']['upswd']) ) show_admin_error('旧密码不正确！','back');
			$db = Load::database();
			$db->update('admin',array(
				'upswd' => $encrypt->encrypt($new)
			),parent::$data['me']['id']);
			show_admin_op(array(
				array(
					'link' => '/admin/password',
					'text' => '重新修改'
				)
			));
		}
		//加载视图
		Load::view('/admin/password.php',parent::$data);
	}
}