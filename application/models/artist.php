<?php
 
class Artist extends Model {
    var $hasOne = array('Country' =>'Country');
    var $hasManyAndBelongsToMany = array('Song' => 'Song');
}