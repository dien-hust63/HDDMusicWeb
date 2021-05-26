<?php
// show potential errors / feedback (from registration object)
if (isset($register)) {
    if ($register->errors) {
        foreach ($register->errors as $error) {
            echo $error;
        }
    }
    if ($register->messages) {
        foreach ($register->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- register form -->
<form method="post" action="signup" name="registerform" class="login-form">
    <h1>Sign up</h1>
    <div class="textb">
        <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required >
        <div class="placeholder">Username (2-64 characters)</div>
    </div>

    <!-- the email input field uses a HTML5 email type check -->
    <div class="textb">
        <input id="login_input_email" class="login_input" type="text" name="user_email" required />
        <div class="placeholder">Email</div>
    </div>

    <div class="textb">
        <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
        <div class="placeholder">Password (min 6 characters)</div>
    </div>

    <div class="textb">
        <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
        <div class="placeholder">Retype your password</div>
    </div>

    <a class="register-suggest" href=<?php echo PATH_LOG?> >Already had an account? Log in</a>
    <button class="login-btn" type="submit"  name="register">Register</button>
</form>
<!-- backlink -->

