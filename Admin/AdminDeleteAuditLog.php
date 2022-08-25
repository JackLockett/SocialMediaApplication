<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "DELETE FROM Logs WHERE id = :id";
$sql = $db->prepare($stmt);
$sql->bindParam(':id', $_GET['id'], SQLITE3_TEXT);

$sql->execute();

header("Location: /Admin/AdminAuditLogs.php?deletedaudit=true");

?>