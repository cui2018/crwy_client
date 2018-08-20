<?php
class Css extends Controller {
	public function index() {
		$css = implode('/',func_get_args());
		if ( !$css ) return;
		parent::$data['v'] = get('v');
		Load::css($css,parent::$data);
	}
}