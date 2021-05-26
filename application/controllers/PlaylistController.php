<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');
class PlaylistController extends Controller {
    function add(){
        $login = new Login();
        if(isset($_SESSION['user_id'])){
            if(isset($_POST['playlist_name'])){
                $playlist_name = $_POST['playlist_name'];
                $user_id = $_SESSION['user_id'];
                $query = "INSERT INTO `playlist`(`name`, `user`) VALUES ('$playlist_name', '$user_id')";
                if($this->Playlist -> customQuery($query)){
                    echo "add successfully";
                }
            }
        }
        else{
            echo "You don't have permission";
        }
    }

    function viewall(){
        $login = new Login();
        $is_user = 0;
        if(isset($_SESSION['user_id'])){
            $is_user = 1;
            $user_id = $_SESSION['user_id'];
            $playlist = $this -> Playlist -> query(NULL, "`user` = `$user_id`");
            $this -> set('playlist', $playlist);
        }
        $this -> set('is_user', $is_user);
    }

    function viewdetail($id=null){
        //list song
    }

}