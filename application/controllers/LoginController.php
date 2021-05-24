<?php

class LoginController extends Controller {
    function signin() {
        //$login = $this -> Login -> query();8
        $login = $this -> Login; 
        $this-> set('login', $login);
    }
}
