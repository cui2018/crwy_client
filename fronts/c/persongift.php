<?php
class Persongift extends Controller {
    public function index() {
        parent::$data['wx'] = $wx = Load::library('wx');
        parent::$data['user'] = $wx->oauth2(1);
        Load::view('persongift.php',parent::$data);
    }
}