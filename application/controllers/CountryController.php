
<?php

class CountryController extends Controller {
    function add(){
        if(isset($_POST['country'])){
            $country_name = $_POST['country'];
            echo "test";
            $query = "INSERT INTO `country`(`name`) VALUES ('$country_name');";
            $this -> Country -> customQuery($query) ;
        }
        $country = $this->Country->query();
        $this -> set('country', $country);     
    }

    function delete($id){
        $query = "DELETE FROM `country` WHERE 'country'.'id' = $id";
        $this -> Country -> customQuery($query);
    }
        


}