<?php
class Coder extends Controller {
	public function index() {
		$code = file_get_contents('./c/' . ADMIN . '/develop/run.php');
		parent::$data['code'] = $code;
		parent::$data['methods'] = $this->_getMethods($code);
		Load::view('/admin/develop/coder.php',parent::$data);
	}
	public function save2run() {
		$code = post('code');
		$code = str_replace('&lt;','<',$code);
		$code = str_replace('&gt;','>',$code);
		file_put_contents('./c/' . ADMIN . '/develop/run.php',$code);
		$methods = $this->_getMethods($code);
		api_success($methods);
	}
	private function _getMethods($code) {
		preg_match_all('/public function (.+?)\(\)/',$code,$matches);
		$methods = array();
		foreach ( $matches[1] as $item ) {
			if ( $item == '__construct' ) continue;
			array_push($methods,$item);
		}
		return $methods;
	}
}