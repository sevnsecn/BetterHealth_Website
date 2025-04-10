<?php
session_start();
// add the files u want to store here
require_once 'validate.php'; 

$action = $_POST['action'] ?? '';

//using cases we can put multiple functions here
switch ($action) {
    case 'signup':
        validate(); // this handles validation and redirection
        break;

        case 'login':
            login();  // FOR ARTHUR: bikin login_validate.php
        break;

    default:
        // Optional: Handle unknown or empty actions
        $_SESSION['errors'] = ["Unknown action or no action provided."];
        header("Location: signup.php"); // or any fallback page
        exit;
}
