<?php
session_start();
require_once 'db.php'; // Database connection

function login() {
    $conn = $GLOBALS['conn'];
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

    // Prepare SQL statement to check if user exists
    $stmt = $conn->prepare("SELECT id, username, password, is_admin FROM users WHERE username = ?");
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
            $_SESSION['is_admin'] = $user['is_admin']; // Store is_admin in session 
            header("Location: dashboard.php"); // Redirect to dashboard
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

login();
?>
