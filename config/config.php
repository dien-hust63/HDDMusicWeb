<?php

/** Configuration Variables **/

define ('DEVELOPMENT_ENVIRONMENT',true);


define('DB_NAME', 'hddmusic');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

define('BASE_PATH','http://localhost/HDDMusicWeb');


define('PAGINATE_LIMIT', '5');

//define urls
define('PATH_HOME', BASE_PATH . DS .'index');
define('PATH_LOG', BASE_PATH . DS . 'login' . DS . 'signin');
define('PATH_ARTIST_VIEWALL', BASE_PATH . DS . 'artist' . DS . 'viewall');
define('PATH_SONG_VIEWALL', BASE_PATH . DS . 'song' . DS . 'viewall');
define('HOME_PAGE', ROOT . DS . 'application' . DS . 'views' . DS . 'backToHomepage.php');
define('LOG_OUT', ROOT . DS . 'application' . DS . 'views' . DS . 'LOGOUT.php');
define('LOG_IN', ROOT . DS . 'application' . DS . 'views' . DS . 'LOGIN.php');