<?php

class Authentication {
    function login ($user_id, $access) {
        if($access === "dashboard")
            $_SESSION["admin"] = true;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["login"] = true;
        header('Location: index.php?page=' . $access);
    }

    function logout () {
        session_destroy();
        header('Location: index.php');
    }
}