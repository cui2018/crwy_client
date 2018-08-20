<?php
class Admin extends Controller {
	public function __construct() {
		$this->db = Load::database();
	}
	//管理员管理
	public function index() {
		//修改个人数据
		if ( post() ) {
			$upswd = post('upass1');
			$set = array(
				'name' => post('name'),
				'email' => post('email')
			);
			if ( $upswd ) $set['upswd'] = encrypt($upswd);
			$this->db->update('admin',$set,parent::$data['me']['id']);
			show_admin_op(array(
				array(
					'link' => ua('/administrator/admin'),
					'text' => '重新修改'
				)
			));
		}
		//个人数据
		$role = $this->db->one('role',parent::$data['me']['roleid']);
		parent::$data['me']['rolename'] = $role ? $role['rolename'] : '无';
		parent::$data['me']['mothername'] = $this->db->one('admin',parent::$data['me']['mother'],'uname');
		parent::$data['myPowers'] = $this->db->get('module','substr("' . parent::$data['me']['power'] . '",id,1) = 1');
		//其他管理员
		$where = array(
			'id !=' => parent::$data['me']['id'],
			'sa' => 0
		);
		if ( !parent::$data['me']['sa'] ) $where['mother'] = parent::$data['me']['id'];
		parent::$data['users'] = $this->db->get('admin',$where);
		foreach (parent::$data['users'] as &$item) {
			$role = $this->db->one('role',$item['roleid']);
			$item['rolename'] = $role ? $role['rolename'] : '无';
			$item['powers'] = $this->db->get('module','substr("' . $this->_userPower($item['id']) . '",id,1) = 1');
		}
		//加载视图
		Load::view('/admin/administrator/admin/index.php',parent::$data);
	}
	/* 管理员添加 */
	public function add() {
		//添加管理员
		if ( post() ) {
			$uname = post('uname');
			$name = post('name');
			$email = post('email');
			$upswd = post('upass1');
			$roleid = post('roleid','intval');
			$power = post('power');
			if ( $this->db->one('admin',array(
				'uname' => $uname
			)) ) show_admin_error('用户名已存在！','back');
			$upswd = encrypt($upswd);
			if ( $roleid ) $power = $this->db->one('role',$roleid,'power');
			else {
				$powerString = str_repeat(0,$this->db->max('module','','id'));
				foreach ($power as $powers) $powerString = substr($powerString,0,$powers - 1) . '1' . substr($powerString,$powers);
				$power = $powerString;
			}
			$this->db->insert('admin',array(
				'uname' => $uname,
				'upswd' => $upswd,
				'power' => $power,
				'mother' => parent::$data['me']['id'],
				'birthday' => NOW_TIME,
				'lastlogin' => NOW_TIME,
				'lastip' => ip_address(),
				'roleid' => $roleid,
				'name' => $name,
				'email' => $email,
				'sa' => 0
			));
			show_admin_op(array(
				array(
					'link' => ua('/administrator/admin/add'),
					'text' => '继续添加'
				),
				array(
					'link' => ua('/administrator/admin'),
					'text' => '返回列表'
				)
			));
		}
		//页面数据
		parent::$data['roles'] = array('无');
		foreach ($this->db->get('role') as $item) parent::$data['roles'][$item['id']] = $item['rolename'];
		parent::$data['myPowers'] = $this->db->get('module','substr("' . parent::$data['me']['power'] . '",id,1) = 1');
		//加载视图
		Load::view('/admin/administrator/admin/add.php',parent::$data);
	}
	/* 管理员修改 */
	public function edit($id) {
		$id = intval($id);
		//修改管理员
		if ( post() ) {
			$name = post('name');
			$email = post('email');
			$upswd = post('upass1');
			$roleid = post('roleid','intval');
			$power = post('power');
			if ( $upswd ) encrypt($upswd);
			if ( $roleid ) $power = $this->db->one('role',$roleid,'power');
			else {
				$powerString = str_repeat(0,$this->db->max('module','','id'));
				foreach ($power as $powers) $powerString = substr($powerString,0,$powers - 1) . '1' . substr($powerString,$powers);
				$power = $powerString;
			}
			$set = array(
				'power' => $power,
				'roleid' => $roleid,
				'name' => $name,
				'email' => $email
			);
			if ( $upswd ) $set['upswd'] = $upswd;
			$this->db->update('admin',$set,$id);
			show_admin_op(array(
				array(
					'link' => ua('/administrator/admin/edit/' . $id),
					'text' => '重新修改'
				),
				array(
					'link' => ua('/administrator/admin'),
					'text' => '返回列表'
				)
			));
		}
		//页面数据
		parent::$data['admin'] = $this->db->one('admin',$id);
		parent::$data['roles'] = array('无');
		foreach ($this->db->get('role') as $item) parent::$data['roles'][$item['id']] = $item['rolename'];
		parent::$data['myPowers'] = $this->db->get('module','substr("' . parent::$data['me']['power'] . '",id,1) = 1');
		$userPower = $this->_userPower($id);
		foreach (parent::$data['myPowers'] as &$item) $item['checked'] = substr($userPower,$item['id'] - 1,1);
		//加载视图
		Load::view('/admin/administrator/admin/edit.php',parent::$data);
	}
	/* 管理员删除 */
	public function del($id) {
		$this->db->delete('admin',intval($id));
		show_admin_op(array(
			array(
				'link' => ua('/administrator/admin'),
				'text' => '返回列表'
			)
		));
	}
	//获取用户权限
	private function _userPower($id) {
		$admin = $this->db->one('admin',$id);
		if ( $admin['sa'] ) return str_repeat('1',48);
		else {
			if ( $admin['roleid'] == 0 ) return $admin['power'];
			else {
				$role = $this->db->one('role',$admin['roleid']);
				if ( $role ) return $role['power'];
				else return $admin['power'];
			}
		}
	}
}