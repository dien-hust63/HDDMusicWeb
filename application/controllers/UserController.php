<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');

class UserController extends Controller {
    function viewall(){
        $login = new Login();
        $user = $this -> User -> query();
        $this -> set('user', $user);
    }
    function delete($id = null){
        $login = new Login();
        $user= $this -> User ->deleteUser($id);
        $this -> set('user', $user);
    }
}

 