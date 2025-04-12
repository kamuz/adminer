<?php
function adminer_object() {
    include_once "plugin.php";
    include_once "login-password-less.php";
    return new AdminerPlugin(array(
        new AdminerLoginPasswordLess(password_hash("root", PASSWORD_DEFAULT)),
    ));
}
include "adminer-4.8.1-en.php";