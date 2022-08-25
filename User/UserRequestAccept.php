<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "INSERT INTO Friends(user, userName, friend, friendName) VALUES (:sender, :senderName, :receiver, :receiverName)";
$sql = $db->prepare($stmt); 
$sql->bindParam(':sender', $_GET['sender'], SQLITE3_TEXT);
$sql->bindParam(':senderName', $_GET['senderName'], SQLITE3_TEXT);
$sql->bindParam(':receiver', $_GET['receiver'], SQLITE3_TEXT);
$sql->bindParam(':receiverName', $_GET['receiverName'], SQLITE3_TEXT);

$sql->execute();

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "INSERT INTO Friends(friend, friendName, user, userName) VALUES (:sender, :senderName, :receiver, :receiverName)";
$sql = $db->prepare($stmt); 
$sql->bindParam(':sender', $_GET['sender'], SQLITE3_TEXT);
$sql->bindParam(':senderName', $_GET['senderName'], SQLITE3_TEXT);
$sql->bindParam(':receiver', $_GET['receiver'], SQLITE3_TEXT);
$sql->bindParam(':receiverName', $_GET['receiverName'], SQLITE3_TEXT);

$sql->execute();

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "DELETE FROM Requests WHERE sender = :sender AND receiver = :receiver";
$sql = $db->prepare($stmt);
$sql->bindParam(':sender', $_GET['sender'], SQLITE3_TEXT);
$sql->bindParam(':receiver', $_GET['receiver'], SQLITE3_TEXT);

$sql->execute();

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');

$stmt = "DELETE FROM Requests WHERE sender = :receiver AND receiver = :sender";
$sql = $db->prepare($stmt);
$sql->bindParam(':sender', $_GET['sender'], SQLITE3_TEXT);
$sql->bindParam(':receiver', $_GET['receiver'], SQLITE3_TEXT);

$sql->execute();

header("Location: UserRequests.php?accept=true");

?>