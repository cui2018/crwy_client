<?php
class Publick extends Controller {
    public function index($name = '') {
        parent::$data['wx'] = $wx = Load::library('wx');
        parent::$data['user'] = $wx->oauth2(1);
        Load::view('publick/' . $name . '.php',parent::$data);
    }
}