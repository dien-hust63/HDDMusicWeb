<?php
class UserController extends Controller {
    function viewall(){
        $user = $this -> User -> query();
        $this -> set('index', $user);
    }
}

 