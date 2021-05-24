<?php
class Song extends Model {
    var $hasOne = array('Country' => 'Country', 'Genre' => 'Genre');
    var $hasManyAndBelongsToMany = array('Artist' => 'Artist');
}