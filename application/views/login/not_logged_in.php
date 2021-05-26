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

<form method="post" action="../index" name="loginform" class="login-form">
    <h1>Sign In</h1>
    <div class="textb">
        <input id="login_input_username" type="text" required>
        <div class="placeholder">Username</div>
    </div>

    <div class="textb">
        <input id="" type="password" required>
        <div class="placeholder">Password</div>
    </div>

    <button type="submit" class="login-btn" disabled> Login </button>
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

    document.querySelector(".show-password").addEventListener("click", function() {
        if (this.classList[2] == "fa-eye-slash") {
            this.classList.remove("fa-eye-slash");
            this.classList.add("fa-eye");
            fields[1].type = "text";
        } else {
            this.classList.remove("fa-eye");
            this.classList.add("fa-eye-slash");
            fields[1].type = "password";
        }
    });
</script>