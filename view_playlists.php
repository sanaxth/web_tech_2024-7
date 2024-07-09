
<?php
// Corrected include path
include 'db.php';

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute the query
$result = $conn->query("SELECT * FROM playlists");

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Playlists</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>Playlists</h1>
        <ul>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<li><a href='playlist.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></li>";
            }
            ?>
        </ul>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
