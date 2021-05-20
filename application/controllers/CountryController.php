
<?php

class CountryController extends Controller {
    function add(){
        try {
            $country_name = $_POST['country'];
        
            $query = "INSERT INTO `country`(`name`) VALUES ('$country_name');";
            $country = $this->Country->query();
            $this -> set('country', $country);
        }
          //catch exception
        catch(Exception $e) {
            $country = $this->Country->query();
            $this -> set('country', $country);
        }
        
    
    }
        


}