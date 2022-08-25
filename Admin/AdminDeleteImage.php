<?php
include_once("AdminLogger.php");

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "DELETE FROM Images WHERE user = :id";
$sql = $db->prepare($stmt);
$sql->bindParam(':id', $_GET['id'], SQLITE3_TEXT);

deleteImageLog();

$sql->execute();

header("Location: /Admin/AdminVerifyImages.php?deletedimage=true");

?>