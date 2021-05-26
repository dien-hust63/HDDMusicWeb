<?php

class PlaylistController extends Controller {
    function add(){
        if(isset($_POST['playlist_name'])){
            $playlist_name = $_POST['playlist_name'];
        }
    }

    function viewall(){
        //list playlist
    }

    function viewdetail($id=null){
        //list song
    }

}