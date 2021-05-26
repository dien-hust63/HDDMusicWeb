<?php
class UsersController extends Controller {
    function viewall(){
        //$users = new Users();
        $users = $this -> Users -> query();
        $this -> set('users', $users);
    }
    function delete($id = null){
        $users= $this -> Users ->delete($id);
        $this -> set('users', $users);
    }
}

 