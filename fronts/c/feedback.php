<?php
class Feedback extends Controller {
    public function index($page = '') {
        parent::$data['wx'] = $wx = Load::library('wx');
        parent::$data['user'] = $wx->oauth2(1);
        parent::$data['page'] = $page;
        Load::view('feedback.php',parent::$data);
    }
}