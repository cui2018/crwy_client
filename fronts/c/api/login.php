<?php
class Login extends Controller {
	public function __construct() {
		$this->redis = Load::redis();
	}
	public function banner() {
		$banner = $this->redis->get('banner');
		$banner = $banner ? $banner : array();
		api_success2($banner);
	}
	public function zouma() {
		$userZouMa = $this->redis->get('indexZouMa');
		$userZouMa = $userZouMa ? $userZouMa : array();
		api_success2($userZouMa);
	}
	public function history() {
		$openId = post('openId');
		if ( !$openId ) return api_error2(5004);
		$userhistorygame = $this->redis->hget('userhistorygame',$openId);
		$userhistorygame = $userhistorygame ? $userhistorygame : array();
		api_success2($userhistorygame);
	}
	public function gamelist() {
		$this->_findGameList(post());
	}
	public function identity() {
		$openId = post('openId');
		if ( !$openId ) return api_error2(5004);
		$useridentity = $this->redis->hget('identity',$openId);
		$useridentity = $useridentity ? 1 : 0;
		api_success2($useridentity);
	}
	public function newgamelist() {
		$this->_findNewGame(post());
	}
	public function gametype() {
		$this->_findGameType();
	}
	public function gametypelist() {
		$this->_findGameTypeList(post());
	}
	public function userhistorygame() {
		$openId = post('openId');
		if ( !$openId ) return api_error2(5004);
		$this->_userHistoryGame(post());
	}
	private function _userHistoryGame($data) {
		$openId = post('openId');
		if ( !$openId ) return api_error2(5004);
		$userhistorygame = $this->redis->hget('userhistorygame',$openId);
		$res = $userhistorygame ? $userhistorygame : array();
		api_success2($userhistorygame);
	}
	private function _findGameList($data) {
		$page = post('page','intval');
		if ( !$page ) return api_error2(5001);
		$page = 'page' . $page;
		$gamelist = $this->redis->hget('gamelist',$page);
		if ( !$gamelist ) return api_error2(5003);
		api_success2($gamelist);
	}
	private function _findNewGame($data) {
		$newgame = $this->redis->get('newgame');
		if ( !$newgame ) return api_error2(5003);
		api_success2($newgame);
	}
	private function _findGameType($data) {
		$gametype = $this->redis->get('gametype');
		if ( !$gametype ) return api_error2(5003);
		api_success2($gametype);
	}
	private function _findGameTypeList($data) {
		$typeid = post('typeid');
		if ( !$typeid ) return api_error2(5001);
		$gametypelist = $this->redis->get('gametypelist' . $typeid);
		if ( !$gametypelist ) return api_error2(5003);
		api_success2($gametypelist);
	}
}