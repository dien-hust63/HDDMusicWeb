<?php

class Playlist extends Model{
    //var $hasOne = array('Playlist' => 'Playlist_song');
    var $hasManyAndBelongsToMany = array('Song' => 'Song');
}