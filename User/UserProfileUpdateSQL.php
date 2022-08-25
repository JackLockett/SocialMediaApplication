<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
$sql = "SELECT * FROM User WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_GET['id'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}