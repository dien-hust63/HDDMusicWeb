<?php

class SongController extends Controller {
    function viewall(){
        $this -> Song -> showHasOne();
        $song = $this->Song->query();
        $this -> set('song', $song);
    }

    function viewdetail($id = null){
        $this -> Song -> showHasOne();
        $this->Song->showHMABTM();
        $song = $this -> Song -> query($id);
        $this -> set('song', $song);
    }
}