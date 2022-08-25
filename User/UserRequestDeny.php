<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "DELETE FROM Requests WHERE sender = :sender AND receiver = :receiver";
$sql = $db->prepare($stmt);
$sql->bindParam(':sender', $_GET['sender'], SQLITE3_TEXT);
$sql->bindParam(':receiver', $_GET['receiver'], SQLITE3_TEXT);

$sql->execute();

header("Location: UserRequests.php?deny=true");

?>