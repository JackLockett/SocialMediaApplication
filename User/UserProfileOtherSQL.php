<?php

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
$sql = "SELECT * FROM User WHERE id=:appid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':appid', $_GET['id'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}