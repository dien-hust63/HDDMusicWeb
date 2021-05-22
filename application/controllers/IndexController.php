<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'artist.php');

class IndexController extends Controller {
    function index(){
        $artist = new Artist();
        $this->set('artist',$artist->query());
    }
}
