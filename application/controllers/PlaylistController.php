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
        if(isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 1)){
            $user_id = $_SESSION['user_id'];
            $condition = 'user = ' . $user_id ;
            $playlist = $this -> Playlist -> query(NULL, $condition);
            $this -> set('playlist', $playlist);
        } 
    }

    function addsong($id) {
        $login = new Login();
        $playlist = $this -> Playlist ->query();
        $this -> set('playlist', $playlist);
    }
    function viewdetail($id=null){
        $login = new Login();
        if(isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 1)){
            $user_id = $_SESSION['user_id'];
            $condition = 'user = ' . $user_id ;
            $playlist_name = $this->Playlist->query(null, $condition);
            $this-> set('playlist_name', $playlist_name);
            $sql = 'SELECT playlist.id playlist_id, playlist.name playlist_name, song.id song_id, song.name song_name FROM playlist AS Playlist LEFT JOIN playlist_song AS Playlist_song ON playlist.id = playlist_song.playlist LEFT JOIN song AS Song ON playlist_song.song = song.id WHERE playlist.id = ' . $id . ' AND playlist.user = ' . $user_id;
            $playlist = $this -> Playlist -> customQueryObject($sql);
            $this -> set('playlist', $playlist);
        } 
    }
    function deletesong($playlist_id = null, $song_id = null) {
        $login = new Login();
        $sql = 'DELETE FROM playlist_song WHERE playlist = '. $playlist_id . ' AND ' . 'song = ' . $song_id;
        $playlist = $this -> Playlist -> customQuery($sql);
        echo $playlist;
        $this -> set('playlist', $playlist);
 
    }
    function delete($id = null){
        $login = new Login();
        $playlist= $this -> Playlist ->delete($id);
        $this -> set('playlist', $playlist);
    }
}