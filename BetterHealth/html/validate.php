<?php
function validate() {
    require_once 'db.php';
    $conn = $GLOBALS['conn'];
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
        header("Location: signup.php");
        exit;
    }
    if (!$conn) {
        die("Database jelek");
    }

    //hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Signup successful! You can now log in.";
    } else {
        $_SESSION['errors'] = ["Error: " . $stmt->error];
    }

    $stmt->close();
    $conn->close();

    header("Location: login.php");
    exit;
}

