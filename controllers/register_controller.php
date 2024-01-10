<?php
global $db;

if (isset($_POST["req"]) && $_POST["req"] == "signup") {
    // Sanitize and validate input!
    $username = $_POST["username"];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $fileName = Validation::handleFileUpload();
    // Validate user input
    $errors = [
        "username_err" => Validation::validateUsername($username),
        "email_err" => Validation::validateEmail($email),
        "password_err" => Validation::validatePassword($password),
        "userexists_err" => Validation::userChecker($email, $db),
        "picture_err" => Validation::pictureValidation($fileName)
    ];


    if (array_filter($errors)) {
        // Handle errors
        echo json_encode(["errors" => $errors]);
        exit;
    }

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Register user
    User::insertUser($username, $email, $passwordHash, $fileName, $db);
    echo json_encode(["success" => "User registered successfully"]);
    exit;
}