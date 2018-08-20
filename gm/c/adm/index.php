<?php
class Index extends Controller {
	public function __construct() {}
	public function index() {
		Load::view('admin/index.php',parent::$data);
	}
}