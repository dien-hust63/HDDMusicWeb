<?php
class Song extends Model {
    var $hasManyAndBelongsToMany = array('Artist' => 'Artist');
}