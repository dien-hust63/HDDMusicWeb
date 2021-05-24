<?php

class Login extends Model {
   /**
     * @var object The database connection
     */
    public $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array(); 
}
