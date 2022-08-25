<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "DELETE FROM Friends WHERE user = :user AND friend = :friend";
$sql = $db->prepare($stmt);

$sql->bindParam(':user', $_GET['user'], SQLITE3_TEXT);
$sql->bindParam(':friend', $_GET['friend'], SQLITE3_TEXT);

$sql->execute();

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "DELETE FROM Friends WHERE user = :friend AND user = :friend";
$sql = $db->prepare($stmt);

$sql->bindParam(':user', $_GET['user'], SQLITE3_TEXT);
$sql->bindParam(':friend', $_GET['friend'], SQLITE3_TEXT);

$sql->execute();

header("Location: UserFriends.php?remove=true");

?>