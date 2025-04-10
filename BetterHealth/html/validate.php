<?php
function validate() {
    // Do NOT start session again—already started in signup.php

    //Sticky
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $errors = [];
    //validation
    if (empty($username)) $errors[] = "Username is required.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = [
            'username' => $username,
            'email' => $email,
        ];
        header("Location: login.php");
        exit;
    }
    $_SESSION['success'] = "Signup successful! You can now log in.";
    header("Location: login.php");
    exit;
}


