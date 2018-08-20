<?php
class Css extends Controller {
	public function index() {
		$param = func_get_args();
		$css = implode('/',$param);
		if ( !$css ) return;
		parent::$data['v'] = get('v');
		parent::$data['u'] = $param[0] == 'test' ? 'ufvtest' : 'ufv';
		Load::css($css,parent::$data);
	}
}