<?php
session_start();
// add the files u want to store here
require_once 'signup_validate.php'; 
require_once 'login_validate.php'; 

$action = $_POST['action'] ?? '';

//using cases we can put multiple functions here
switch ($action) {
    case 'signup':
        validate(); // this handles signup validation and redirection
        break;

    case 'login':
        login(); // handles login_validation
    break;

    default:
        // Optional: Handle unknown or empty actions
        $_SESSION['errors'] = ["There is was no action provided."];
        header("Location: signup.php"); // or any fallback page
        exit;
}
