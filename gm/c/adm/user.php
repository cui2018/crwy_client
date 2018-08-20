<?php
define('S','ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789');
class User extends Controller {
	public function __construct() {
		$this->db = Load::database('v3');
	}
	private function _getNonce() {
		$noncestr = '';
		for ( $i = 0; $i < 16; $i++ ) $noncestr .= substr(S,mt_rand(0,strlen(S)),1);
		return $noncestr;
	}
	//用户列表
	public function index() {
		parent::$data['seastr'] = $seastr = array(
			'openid' => get('openid'),
			'nick' => get('nick'),
			'name' => get('name'),
			'tel' => get('tel')
		);
		$where = array();
		if ( $seastr['openid'] ) $where['openId'] = $seastr['openid'];
		if ( $seastr['nick'] ) $where['nickName LIKE'] = $seastr['nick'];
		if ( $seastr['name'] ) $where['trueName LIKE'] = $seastr['name'];
		if ( $seastr['tel'] ) $where['phone'] = $seastr['tel'];
		parent::$data['user'] = $this->db->page('userinfo',$where,'`id` DESC',100);
		foreach ( parent::$data['user'] as &$item ) {
			$item['timestamp'] = time();
			$item['noncestr'] = $this->_getNonce();
			$item['sign'] = sha1('noncestr=' . $item['noncestr'] . '&openid=' . $item['openId'] . '&timestamp=' . $item['timestamp'] . '&key=crwy3&autoLogin');
		}
		parent::$data['page'] = $this->db->page[2];
		Load::view('/admin/user/index.php',parent::$data);
	}
	//基本配置
	public function edit($id) {
		$id = intval($id);
		if ( post() ) {
			$base = post();
			$this->db->update('game',array(
				'base' => json_encode2($base)
			),$id);
			show_admin_op(array(
				array(
					'link' => ua('/game/edit/' . $id),
					'text' => '重新修改'
				),
				array(
					'link' => ua('/game'),
					'text' => '返回列表'
				)
			));
		}
		parent::$data['game'] = $this->db->one('game',$id);
		parent::$data['base'] = parent::$data['game']['base'] ? json_decode(parent::$data['game']['base'],TRUE) : array();
		Load::view('/admin/game/edit.php',parent::$data);
	}
}