<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- <form method="post" action="../index" name="loginform">

    <label for="login_input_username">Username</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required />

    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />

    <input type="submit"  name="login" value="Log in" />

</form> -->
<form method="post" action="../index" name="loginform" class="login-form">
    <h1>Sign In</h1>
    <div class="textb">
        <input id="login_input_username" name="user_name" type="text" required>
        <div class="placeholder">Username</div>
    </div>

    <div class="textb">
        <input id="login_input_password" name="user_password" type="password" required>
        <div class="placeholder">Password</div>
    </div>
    <a class="register-suggest" href=<?php echo PATH_REG?> >Don't have an account? Register now.</a>
    <button type="submit" name="login" value="Log in" class="login-btn" disabled> Login </button>
</form>

<script>
    var fields = document.querySelectorAll(".textb input");
    var btn = document.querySelector(".login-btn");

    function check() {
        if (fields[0].value != "" && fields[1].value != "")
            btn.disabled = false;
        else
            btn.disabled = true;
    }

    fields[0].addEventListener("keyup", check);
    fields[1].addEventListener("keyup", check);

</script>