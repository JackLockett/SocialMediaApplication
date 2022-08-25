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
    $stmt = "DELETE FROM User WHERE id = :appid";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':appid', $_GET['id'], SQLITE3_TEXT);
    $sql->execute();

    deleteLog();

    header("Location: /Admin/AdminViewUsers.php?deleted=true");
}

