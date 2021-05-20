
<?php

class ArtistController extends Controller {
    function viewall(){
        $this -> Artist -> showHasOne();
        $artist = $this -> Artist -> query();
        //expect artist return array;
        $this -> set('artist', $artist);
        // $this -> set('artist', $this -> Artist-> selectAll());
    }

    function viewdetail($id = null){
        $this -> Artist -> showHasOne();
        $this->Artist->showHMABTM();
        $artist = $this -> Artist -> query($id);
        $this -> set('artist', $artist);
    }


}