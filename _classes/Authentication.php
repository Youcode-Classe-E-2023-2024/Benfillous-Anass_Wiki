<?php

class Authentication {
    static function login ($user_id, $access) {
        if($access === "dashboard")
            $_SESSION["admin"] = true;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["login"] = true;
    }

    function logout () {
        session_destroy();
        header('Location: index.php');
    }
}