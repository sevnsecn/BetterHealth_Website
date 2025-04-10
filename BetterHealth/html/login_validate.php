<?php
function login() {
    require_once 'db.php';
    $conn = $GLOBALS['conn'];
    session_start();

    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $errors = [];

    if (empty($username)) $errors[] = "Username is required.";
    if (empty($password)) $errors[] = "Password is required.";

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: login.php");
        exit;
    }

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    if (!$stmt) {
        $_SESSION['errors'] = ["Database error: " . $conn->error];
        header("Location: login.php");
        exit;
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php"); // change to wherever you want to go after login
            exit;
        } else {
            $errors[] = "Invalid password.";
        }
    } else {
        $errors[] = "Username not found.";
    }

    $stmt->close();
    $conn->close();

    $_SESSION['errors'] = $errors;
    header("Location: login.php");
    exit;
}
