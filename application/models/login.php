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
    
    public function __construct()
    {
    // create/read session, absolutely necessary
        session_start();
        // check the possible login actions:
        // if user tried to log out (happen when user clicks logout button)
        if (isset($_POST["logout"])) {
            $this->doLogout();
        }
        // login via post data (if user just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    public function dologinWithPostData()
    {
        $admin = 0;
        // check login form contents
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['user_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['user_name']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql_user = "SELECT user_id, user_name, user_email, user_password_hash
                        FROM user
                        WHERE user_name = '" . $user_name . "' OR user_email = '" . $user_name . "';";
                $result_of_login_user_check = $this->db_connection->query($sql_user);
                $sql_admin = "SELECT admin_name, admin_email, admin_password_hash 
                             FROM admin
                             WHERE admin_name = '" . $user_name . "' OR admin_email = '". $user_name . "';";
                $result_of_login_admin_check = $this->db_connection->query($sql_admin);
                // if this user exists
                if ($result_of_login_user_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_user_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if (password_verify($_POST['user_password'], $result_row->user_password_hash)) {

                        // write user data into PHP SESSION (a file on your server)
                        $_SESSION['user_id'] = $result_row->user_id;
                        $_SESSION['user_name'] = $result_row->user_name;
                        $_SESSION['user_email'] = $result_row->user_email;
                        $_SESSION['user_login_status'] = 1;
                        $_SESSION['admin_login_status'] = 0;

                    } else {
                        $this->errors[] = "Wrong password. Try again.";
                    }
                } else {
                    // if this admin exists
                    if ($result_of_login_admin_check->num_rows == 1) {
                        $admin = 1;
                            // get result row (as an object)
                        $result_row = $result_of_login_admin_check->fetch_object();

                        // using PHP 5.5's password_verify() function to check if the provided password fits
                        // the hash of that user's password
                        if (password_verify($_POST['user_password'], $result_row->admin_password_hash)) {

                            // write user data into PHP SESSION (a file on your server)
                            $_SESSION['admin_name'] = $result_row->admin_name;
                            $_SESSION['admin_email'] = $result_row->admin_email;
                            $_SESSION['admin_login_status'] = 1;
                            $_SESSION['user_login_status'] = 0;
                        } else {
                            $this->errors[] = "Wrong password. Try again.";
                        }
                    }
                    if ($admin == 0)
                    $this->errors[] = "This user does not exist.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the user's login
     * @return boolean user's login status
     */
    public function isUserLoggedIn()
    {
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
    public function isAdminLoggedIn() {
        if (isset($_SESSION['admin_login_status']) AND $_SESSION['admin_login_status'] == 1) {
            return true;
        }
        // default return
        return false;

    }
    public function userName() {
        if (isset($_SESSION['user_name']) AND $_SESSION['user_name'] != ""){
            return $_SESSION['user_name'];
        }
        return "";
    }
    public function adminName() {
        if (isset($_SESSION['admin_name']) AND $_SESSION['admin_name'] != ""){
            return $_SESSION['admin_name'];
        }
        return "";
    }
}
