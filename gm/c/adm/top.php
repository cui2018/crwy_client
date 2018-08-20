<?php
class Top extends Controller {
	public function index() {
		Load::view('admin/top.php',parent::$data);
	}
}