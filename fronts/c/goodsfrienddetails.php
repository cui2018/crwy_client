<?php
class Goodsfrienddetails extends Controller {
    public function index() {
        parent::$data['wx'] = $wx = Load::library('wx');
        parent::$data['user'] = $wx->oauth2(1);
        Load::view('goodsfrienddetails.php',parent::$data);
    }
}