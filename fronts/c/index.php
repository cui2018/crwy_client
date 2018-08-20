<?php
class Index extends Controller {
	public function __construct() {}
	public function index() {
		parent::$data['wx'] = $wx = Load::library('wx');
		parent::$data['user'] = $wx->oauth2(1);
		Load::view('index.php',parent::$data);
	}
}