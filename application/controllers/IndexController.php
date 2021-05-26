<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'artist.php');
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'song.php');

class IndexController extends Controller {
    function index(){
        $artist = new Artist();
        $login = new Login();
        $song = new Song();
        $this->set('artist',$artist->query());
        $this->set('index', $login);
        $this->set('index', $song);
    }
}
