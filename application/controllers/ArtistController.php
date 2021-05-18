<?php

class ArtistController extends Controller {
    function viewall(){
        $this -> set('artist', $this->Artist->selectAll());
    }

    function viewdetail($id = null){
        $this -> set('artist', $this -> Artist-> select($id));
    }

    
}