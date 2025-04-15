<?php
// Start the session to track the admin user
session_start();

//start connection with db
require_once 'db.php';

// Check if user is logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 1) {
    header("Location: login.php"); // Redirect to login if not admin
    exit;
}

// On form submit, process article creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    //Glenn pls add SQL code here

    // Redirect to the article gallery page after creating the article
    header("Location: article_gallery.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
</head>
<body>
    <h1>Create New Article</h1>

    <form method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Author:</label><br>
        <input type="text" name="author" required><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="10" cols="60" required></textarea><br><br>

        <button type="submit">Create Article</button>
    </form>
</body>
</html>
