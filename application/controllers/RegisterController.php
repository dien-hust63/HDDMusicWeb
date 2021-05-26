<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');

class RegisterController extends Controller {
    function signup() {
        $login = new Login();
        $register = $this -> Register;
        $this -> set('register', $register);
    }
}