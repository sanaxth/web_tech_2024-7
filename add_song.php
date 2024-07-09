<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $artist = $conn->real_escape_string($_POST['artist']);
    $album = $conn->real_escape_string($_POST['album']);

    $sql = "INSERT INTO songs (title, artist, album) VALUES ('$title', '$artist', '$album')";
    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color: white;'>Song added successfully</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . $conn->error . "</p>"; // Example error styling
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Song</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add Song</h1>
        <?php if (isset($message)) echo "<p>$message</p>"; ?>
        <form method="post">
            <input type="text" name="title" placeholder="Song Title" required><br>
            <input type="text" name="artist" placeholder="Artist" required><br>
            <input type="text" name="album" placeholder="Album"><br>
            <input type="submit" value="Add Song">
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>