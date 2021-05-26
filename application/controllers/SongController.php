<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'genre.php');
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'country.php');

class SongController extends Controller {
    function viewall(){
        $login = new Login();
        $this -> Song -> showHasOne();
        $song = $this->Song->query();
        $this -> set('song', $song);
        $this->set('index', $login);
    }

    function viewdetail($id = null){
        $login = new Login();
        $this -> Song -> showHasOne();
        $this->Song->showHMABTM();
        $song = $this -> Song -> query($id);
        $this -> set('song', $song);
    }

    function add(){
        $login = new Login();
        $genre = new Genre();
        $queryset = $genre -> query();
        $country = new Country();
        $countryset = $country -> query();
        $artist = new Artist();
        $artistqueryset = $artist -> query();
        $this -> set('genre', $queryset);
        $this -> set('country', $countryset);
        $this -> set('artist', $artistqueryset);
        if(isset($_POST['song_name']) && isset($_FILES['song_file']) && isset($_FILES['song_image']) ){
            if($_POST['song_name'] && $_FILES['song_file']['name'] && $_FILES['song_image']['name']){
                $song_name = $_POST['song_name'];

                $file_name = $_FILES['song_file']['name'];
                $file_tem_loc = $_FILES['song_file']['tmp_name'];
                $file_store = ROOT.DS."public".DS."assets".DS."music".DS.$file_name;
                move_uploaded_file($file_tem_loc, $file_store);

                $image_file = $_FILES['song_image']['name'];
                $image_tem_loc = $_FILES['song_image']['tmp_name'];
                $image_store = ROOT.DS."public".DS."assets".DS."img".DS.$image_file;
                move_uploaded_file($image_tem_loc, $image_store);

                $genre = $_POST['song_genre'];
                $country = $_POST['song_country'];
                $song_artist = $_POST['song_artist'];

                $query = "INSERT INTO `song`(`name`,`link`, `image`, `genre`,`country`) VALUES ('$song_name','$file_name', '$image_file','$genre', '$country')";
                
                if($this -> Song -> customQuery($query)){
                    echo "add successfully";
                }
                $query2 = "SELECT `id` FROM `song` WHERE `name` = '$song_name' AND `link` = '$file_name' ";
                $result = $this -> Song -> customQuery($query2);
                $row = mysqli_fetch_row($result);
                $song_id = $row[0];
                $query3 = "INSERT INTO `artist_song`(`artist`, `song`) VALUES ($song_artist, $song_id )";
                $this -> Song -> customQuery($query3);
           
            }
        }
    }
    function delete($id = null){
        $login = new Login();
        $song = $this -> Song ->delete($id);
        $this -> set('song', $song);
    }
}