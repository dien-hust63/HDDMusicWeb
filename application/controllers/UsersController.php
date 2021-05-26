<?php
class UsersController extends Controller {
    function viewall(){
        //$users = new Users();
        $users = $this -> Users -> query();
        $this -> set('users', $users);
    }
}

 