
<?php
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'country.php');
require_once(ROOT . DS . 'application' . DS . 'models' . DS . 'login.php');
class ArtistController extends Controller {
    function viewall(){
        $login = new Login();

        $this -> Artist -> showHasOne();
        $artist = $this -> Artist -> query();
        $this -> set('artist', $artist);
        $this -> set('login', $login);
    }

    function viewdetail($id = null){
        $this -> Artist -> showHasOne();
        $this->Artist->showHMABTM();
        $artist = $this -> Artist -> query($id);
        $this -> set('artist', $artist);
    }

    function add(){
        $country = new Country();
        $countryset = $country -> query();
        $this -> set('country', $countryset);
        if(isset($_POST['artist_name']) && isset($_POST['artist_age']) && isset($_POST['artist_hometown']) && isset($_FILES['artist_image']) ){
            if($_POST['artist_name'] &&  $_POST['artist_age'] && $_POST['artist_hometown'] && $_FILES['artist_image']['name']){
                $artist_name = $_POST['artist_name'];
                $artist_age = $_POST['artist_age'];
                $artist_hometown = $_POST['artist_hometown'];
                $artist_country = $_POST['artist_country'];
    
                $file_name = $_FILES['artist_image']['name'];
                $file_tem_loc = $_FILES['artist_image']['tmp_name'];
                $file_store = ROOT.DS."public".DS."assets".DS."img".DS.$file_name;
                move_uploaded_file($file_tem_loc, $file_store);
    
                $query = "INSERT INTO `artist`( `name`, `age`, `hometown`, `country`, `avatar`) VALUES ('$artist_name', '$artist_age', '$artist_hometown', '$artist_country','$file_name')";
                if($this -> Artist -> customQuery($query)){
                    echo "add successfully";
                }
           
            }
        }
    }
    function delete($id = null){
        $artist = $this -> Artist ->delete($id);
        $this -> set('artist', $artist);
    }
}