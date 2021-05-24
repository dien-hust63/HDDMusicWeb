
<?php

class ArtistController extends Controller {
    function viewall(){
        $this -> Artist -> showHasOne();
        $artist = $this -> Artist -> query();
        $this -> set('artist', $artist);
    }

    function viewdetail($id = null){
        $this -> Artist -> showHasOne();
        $this->Artist->showHMABTM();
        $artist = $this -> Artist -> query($id);
        $this -> set('artist', $artist);
    }
}