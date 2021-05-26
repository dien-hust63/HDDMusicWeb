<?php

class Playlist extends Model{
    var $hasOne = array('User' =>'User');
    var $hasManyAndBelongsToMany = array('Song' => 'Song');
}