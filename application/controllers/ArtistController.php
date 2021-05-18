<?php

class ArtistController extends Controller {
    function viewall(){
        $this -> set('artist', $this->Artist->selectAll());
    }
}