<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'song.php');

class PlaylistController extends Controller {
    function add(){
        $login = new Login();
        if(isset($_SESSION['user_id'])){
            if(isset($_POST['playlist_name'])){
                $playlist_name = $_POST['playlist_name'];
                $user_id = $_SESSION['user_id'];
                $query = "INSERT INTO `playlist`(`name`, `user`) VALUES ('$playlist_name', '$user_id')";
                if($this->Playlist -> customQuery($query)){
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

    function addsong($playlist_id = null, $song_id = null) {
        $login = new Login();
        $song = new Song();
        $check = 0;
        if(isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 1)){
            //check songs in playlist
            if($song_id == null) $song_id = -1;
            $sqlcheck = 'SELECT * FROM playlist_song WHERE playlist = '. $playlist_id . ' AND song = ' . $song_id;
            $result = $this -> Playlist -> customQueryCheck($sqlcheck);

            if ($result == 0 && $song_id != null){
                $sql = 'INSERT INTO playlist_song VALUES(null, ' . $playlist_id . ',' . $song_id . ')';
                $this -> Playlist -> customQuery($sql);
                $check = 1;
                $this -> set('check', $check);
            }
            $user_id = $_SESSION['user_id'];
            $condition = 'user = ' . $user_id ;
            $playlist = $this -> Playlist -> query(NULL, $condition);
            $this -> set('playlist', $playlist);
            $this -> set('playlist_id', $playlist_id);
            $song-> showHasOne();
            $this -> set('song', $song->query());
        } 
    }
    function viewdetail($id=null, $playlistName=null){
        $login = new Login();
        if(isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 1)){
            $user_id = $_SESSION['user_id'];
            $condition = 'user = ' . $user_id ;
            $sql = 'SELECT playlist.id playlist_id, playlist.name playlist_name, song.id song_id, song.name song_name FROM playlist AS Playlist LEFT JOIN playlist_song AS Playlist_song ON playlist.id = playlist_song.playlist LEFT JOIN song AS Song ON playlist_song.song = song.id WHERE playlist.id = ' . $id . ' AND playlist.user = ' . $user_id;
            $playlist = $this -> Playlist -> customQueryObject($sql);
            $this -> set('playlist', $playlist);
            $this -> set('playlistName', $playlistName);
            $this -> set('playlistid', $id);
        } 
    }
    function deletesong($playlist_id = null, $song_id = null) {
        $login = new Login();
        if(isset($_SESSION['user_login_status']) AND ($_SESSION['user_login_status'] == 1)){
            $sql = 'DELETE FROM playlist_song WHERE playlist = '. $playlist_id . ' AND ' . 'song = ' . $song_id;
            $this -> Playlist -> customQuery($sql);
            $user_id = $_SESSION['user_id'];
            $condition = 'user = ' . $user_id ;
            $playlist_name = $this->Playlist->query(null, $condition);
            $this-> set('playlist_name', $playlist_name);
            $this -> set ('playlist_id', $playlist_id);
            $sql = 'SELECT playlist.id playlist_id, playlist.name playlist_name, song.id song_id, song.name song_name FROM playlist AS Playlist LEFT JOIN playlist_song AS Playlist_song ON playlist.id = playlist_song.playlist LEFT JOIN song AS Song ON playlist_song.song = song.id WHERE playlist.id = ' . $playlist_id . ' AND playlist.user = ' . $user_id;
            $playlist = $this -> Playlist -> customQueryObject($sql);
            $this -> set('playlist', $playlist);
        } 
    }
    function delete($id = null){
        $login = new Login();
        $playlist= $this -> Playlist ->delete($id);
        $this -> set('playlist', $playlist);
    }
}