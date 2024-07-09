<?php
include 'db.php';

$result = $conn->query("SELECT * FROM songs ORDER BY RAND() LIMIT 1");
$suggested_song = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggest a Song</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Suggested Song</h1>
        <?php if ($suggested_song): ?>
            <p style='color: white;'>Title: <?php echo $suggested_song['title']; ?></p>
            <p style='color: white;'>Artist: <?php echo $suggested_song['artist']; ?></p>
            <p style='color: white;'>Album: <?php echo $suggested_song['album']; ?></p>
        <?php else: ?>
            <p>No songs available.</p>
        <?php endif; ?>
        <a href="suggest_song.php" class="button">Suggest Another Song</a>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>

