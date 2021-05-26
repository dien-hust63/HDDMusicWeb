<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'artist.php');
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');

class IndexController extends Controller {
    function index(){
        $artist = new Artist();
        $login = new Login();
        $this->set('artist',$artist->query());
        $this->set('index', $login);
    }
}
