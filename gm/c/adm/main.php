<?php
class Main extends Controller {
	public function index() {
		Load::view('admin/main.php',parent::$data);
	}
}