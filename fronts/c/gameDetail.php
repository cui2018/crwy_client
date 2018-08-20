<?php
class GameDetail extends Controller {
    public function index() {
        parent::$data['wx'] = $wx = Load::library('wx');
        parent::$data['user'] = $wx->oauth2(1);
        Load::view('gameDetail.php',parent::$data);
    }
}