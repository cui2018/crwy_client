<?php
class Role extends Controller {
	public function __construct() {
		$this->db = Load::database();
	}
	//角色管理
	public function index() {
		parent::$data['roles'] = $this->db->get('role');
		foreach (parent::$data['roles'] as &$item) {
			$item['mothername'] = $this->db->one('admin',$item['mother'],'uname');
			$item['powers'] = $this->db->get('module','substr("' . $item['power'] . '",id,1) = 1');
		}
		Load::view('/admin/administrator/role/index.php',parent::$data);
	}
	//角色添加
	public function add() {
		//添加角色
		if ( post() ) {
			$rolename = post('rolename');
			$power = post('power');
			$powerString = str_repeat(0,$this->db->max('module','','id'));
			foreach ($power as $powers) $powerString = substr($powerString,0,$powers - 1) . '1' . substr($powerString,$powers);
			$power = $powerString;
			$this->db->insert('role',array(
				'rolename' => $rolename,
				'power' => $power,
				'mother' => parent::$data['me']['id'],
				'birthday' => NOW_TIME
			));
			show_admin_op(array(
				array(
					'link' => ua('/administrator/role/add'),
					'text' => '继续添加'
				),
				array(
					'link' => ua('/administrator/role'),
					'text' => '返回列表'
				)
			));
		}
		//页面数据
		parent::$data['myPowers'] = $this->db->get('module','substr("' . parent::$data['me']['power'] . '",id,1) = 1');
		//加载视图
		Load::view('/admin/administrator/role/add.php',parent::$data);
	}
	//角色修改
	public function edit($id) {
		$id = intval($id);
		//修改角色
		if ( post() ) {
			$rolename = post('rolename');
			$power = post('power');
			$powerString = str_repeat(0,$this->db->max('module','','id'));
			foreach ($power as $powers) $powerString = substr($powerString,0,$powers - 1) . '1' . substr($powerString,$powers);
			$power = $powerString;
			$this->db->update('role',array(
				'rolename' => $rolename,
				'power' => $power
			),$id);
			show_admin_op(array(
				array(
					'link' => ua('/administrator/role/edit/' . $id),
					'text' => '重新修改'
				),
				array(
					'link' => ua('/administrator/role'),
					'text' => '返回列表'
				)
			));
		}
		//页面数据
		parent::$data['role'] = $this->db->one('role',$id);
		parent::$data['myPowers'] = $this->db->get('module','substr("' . parent::$data['me']['power'] . '",id,1) = 1');
		foreach (parent::$data['myPowers'] as &$item) $item['checked'] = substr(parent::$data['role']['power'],$item['id'] - 1,1);
		//加载视图
		Load::view('/admin/administrator/role/edit.php',parent::$data);
	}
	//角色删除
	public function del($id) {
		$this->db->delete('role',intval($id));
		show_admin_op(array(
			array(
				'link' => ua('/administrator/role'),
				'text' => '返回列表'
			)
		));
	}
}