<?php
include 'db.php';

$playlist_id = $_GET['id'];
$playlist = $conn->query("SELECT name FROM playlists WHERE id = $playlist_id")->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $song_id = $conn->real_escape_string($_POST['song_id']);
    $conn->query("INSERT INTO playlist_songs (playlist_id, song_id) VALUES ($playlist_id, $song_id)");
}

$songs = $conn->query("SELECT s.* FROM songs s
                       LEFT JOIN playlist_songs ps ON s.id = ps.song_id AND ps.playlist_id = $playlist_id
                       WHERE ps.song_id IS NULL");

$playlist_songs = $conn->query("SELECT s.* FROM songs s
                                JOIN playlist_songs ps ON s.id = ps.song_id
                                WHERE ps.playlist_id = $playlist_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $playlist['name']; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $playlist['name']; ?></h1>
        <h2>Songs in Playlist</h2>
        <ul>
            <?php while ($song = $playlist_songs->fetch_assoc()) {
                echo "<li>" . $song['title'] . " - " . $song['artist'] . "</li>";
            } ?>
        </ul>
        <h2>Add Song to Playlist</h2>
        <form method="post">
            <select name="song_id">
                <?php while ($song = $songs->fetch_assoc()) {
                    echo "<option value='" . $song['id'] . "'>" . $song['title'] . " - " . $song['artist'] . "</option>";
                } ?>
            </select>
            <input type="submit" value="Add to Playlist">
        </form>
        <a href="view_playlists.php">Back to Playlists</a>
    </div>
</body>
</html>