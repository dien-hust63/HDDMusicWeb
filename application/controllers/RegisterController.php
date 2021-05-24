<?php

class RegisterController extends Controller {
    function signup() {
        $register = $this -> Register;
        $this -> set('register', $register);
    }
}