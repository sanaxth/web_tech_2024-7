<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);

    $sql = "INSERT INTO playlists (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color: white;'>Song added successfully</p>";
    } else {
        $message = "Error: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Playlist</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Create Playlist</h1>
        <?php if (isset($message)) echo "<p>$message</p>"; ?>
        <form method="post">
            <input type="text" name="name" placeholder="Playlist Name" required><br>
            <input type="submit" value="Create Playlist">
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>