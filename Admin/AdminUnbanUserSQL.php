<?php
include_once("AdminLogger.php");

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
$sql = "SELECT * FROM User WHERE id=:appid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':appid', $_GET['id'], SQLITE3_TEXT);
$result= $stmt->execute();
$arrayResult = [];

while($row=$result->fetchArray(SQLITE3_NUM)){
    $arrayResult [] = $row;
}

if (isset($_POST['submit']))
{
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = "UPDATE User SET banned = :banned WHERE id = :id";
    $stmt = $db->prepare($sql);
    $banned = "false";
    $stmt->bindParam(':id',$_GET['id'], SQLITE3_TEXT);
    $stmt->bindParam(':banned',$banned, SQLITE3_TEXT);
    $stmt->execute();

    unbanLog();
    
    header('Location: /Admin/AdminBannedUsers.php?unbanned=true');
}






