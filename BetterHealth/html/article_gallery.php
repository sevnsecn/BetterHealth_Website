<?php
// article_gallery.php - Public access to the articles

//start db connection
require_once 'db.php';
$conn = $GLOBALS['conn'];

$stmt = $conn->prepare("SELECT * FROM articles");  // No status filter anymore
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles Gallery</title>
</head>
<body>
    <h1>Article Gallery</h1>
    <?php while ($row = $result->fetch_assoc()) : ?>
        <div>
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p><?php echo htmlspecialchars($row['content']); ?></p>
            <p><strong>Published on:</strong> <?php echo htmlspecialchars($row['published_at']); ?></p>
        </div>
    <?php endwhile; ?>
</body>
</html>
