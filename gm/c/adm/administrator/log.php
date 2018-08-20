<?php
class Log extends Controller {
	public function __construct() {
		$this->db = Load::database();
	}
	//日志管理
	public function index() {
		$this->login();
	}
	//登录日志
	public function login() {
		parent::$data['login'] = $this->db->page('log_login',parent::$data['me']['sa'] ? '' : array(
			'sa' => 0
		),'`id` DESC');
		foreach (parent::$data['login'] as &$item) $item = array_merge($item,$this->db->one('admin',$item['aid'],'uname,name'));
		parent::$data['page'] = $this->db->page[2];
		Load::view('/admin/administrator/log/login.php',parent::$data);
	}
	//操作日志
	public function operate() {
		parent::$data['operate'] = $this->db->page('log_operate',parent::$data['me']['sa'] ? '' : array(
			'sa' => 0
		),'`id` DESC');
		foreach (parent::$data['operate'] as &$item) $item = array_merge($item,$this->db->one('admin',$item['aid'],'uname,name'));
		parent::$data['page'] = $this->db->page[2];
		Load::view('/admin/administrator/log/operate.php',parent::$data);
	}
}