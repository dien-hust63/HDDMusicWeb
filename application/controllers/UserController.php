<?php
class UserController extends Controller {
    function viewall(){
        //$users = new Users();
        $user = $this -> User -> query();
        $this -> set('user', $user);
    }
    function delete($id = null){
        $user= $this -> User ->deleteUser($id);
        $this -> set('user', $user);
    }
}

 