<?php

if (isset($_POST['signup'])) {
    extract($_POST);

    $password = password_hash($password, PASSWORD_DEFAULT);
    $targetDir = "assets/img/";
    $fileName = basename($_FILES["picture"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {

        $userChecker = User::user_checker($email, $db);
        try {
            if ($userChecker) {
                throw new Exception("User_exist");
            } else {
                User::insertUser($username, $email, $password, $fileName, $db);
                header('Location: index.php?page=login');
            }
        } catch (Exception $e) {
            header("Location: index.php?page=register&error=" . $e->getMessage());
        }
    }
}