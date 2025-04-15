<?php
// Start the session to track the admin user
session_start();

//start db connection 
require_once 'db.php';

// Check if user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php"); // Redirect to login if not admin
    exit;
}

// Check if article ID is provided in the URL
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    // Call a function to delete the article (no SQL here, just PHP processing)
    // Example: delete_article($articleId);

    // Redirect to the article gallery page after deleting the article
    header("Location: article_gallery.php");
    exit;
}
?>
