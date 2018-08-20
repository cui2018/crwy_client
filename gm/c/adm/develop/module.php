<?php
class Module extends Controller {
	public function __construct() {
		$this->db = Load::database();
	}
	//模块管理
	public function index() {
		parent::$data['module'] = $this->db->get('module');
		foreach (parent::$data['module'] as &$item) $item['parentname'] = $item['pid'] ? $this->db->one('module',$item['pid'],'name') : '';
		Load::view('/admin/develop/module/index.php',parent::$data);
	}
	//模块添加
	public function add() {
		if ( post() ) {
			$this->db->insert('module',array(
				'name' => post('name'),
				'sign' => post('sign'),
				'pid' => post('pid','intval'),
				'url' => post('url'),
				'ico' => post('ico'),
				'orderby' => post('orderby','intval')
			));
			show_admin_op(array(
				array(
					'link' => ua('/develop/module/add'),
					'text' => '继续添加'
				),
				array(
					'link' => ua('/develop/module'),
					'text' => '返回列表'
				)
			));
		}
		//页面数据
		parent::$data['powers'] = $this->db->get('module',array(
			'pid' => 0
		),'`orderby` DESC,`id` ASC');
		$f = opendir('./images/admin/left/');
		parent::$data['icos'] = array();
		while ( ($file = readdir($f)) !== FALSE ) {
			if ( strtolower(substr($file,-4)) == '.gif' ) array_push(parent::$data['icos'],array(
				'name' => $file,
				'url' => u('/images/admin/left/' . $file)
			));
		}
		//加载视图
		Load::view('/admin/develop/module/add.php',parent::$data);
	}
	//模块修改
	public function edit($id) {
		$id = intval($id);
		if ( post() ) {
			$this->db->update('module',array(
				'name' => post('name'),
				'sign' => post('sign'),
				'pid' => post('pid','intval'),
				'url' => post('url'),
				'ico' => post('ico'),
				'orderby' => post('orderby','intval')
			),$id);
			show_admin_op(array(
				array(
					'link' => ua('/develop/module/edit/' . $id),
					'text' => '重新修改'
				),
				array(
					'link' => ua('/develop/module'),
					'text' => '返回列表'
				)
			));
		}
		//页面数据
		parent::$data['module'] = $this->db->one('module',$id);
		parent::$data['powers'] = $this->db->get('module',array(
			'pid' => 0
		),'`orderby` DESC,`id` ASC');
		$f = opendir('./images/admin/left/');
		parent::$data['icos'] = array();
		while ( ($file = readdir($f)) !== FALSE ) {
			if ( strtolower(substr($file,-4)) == '.gif' ) array_push(parent::$data['icos'],array(
				'name' => $file,
				'url' => u('/images/admin/left/' . $file)
			));
		}
		//加载视图
		Load::view('/admin/develop/module/edit.php',parent::$data);
	}
	//模块删除
	public function del($id) {
		$id = intval($id);
		$this->db->delete('module',$id);
		show_admin_op(array(
			array(
				'link' => ua('/develop/module'),
				'text' => '返回列表'
			)
		));
	}
}