<?php

global $db;

if (isset($_POST["req"]) && $_POST["req"] == "login") {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $userChecker = User::user_checker($email, $db);

    if (!$userChecker) {
        echo json_encode(["error" => "User does not exist."]);
    } elseif (!password_verify($password, $userChecker["password"])) {
        echo json_encode(["error" => "Password is incorrect."]);
    } else {
        $checkLogin = new User($userChecker["user_id"]);
        $access = "home";
        if ($userChecker["role"] == "admin") {
            $access = "dashboard";
        }
        Authentication::login($userChecker["user_id"], $access);
        echo json_encode(["success" => $access]);
    }
    exit;
}