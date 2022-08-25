<?php

function verifyCode () {

if (!isset($_POST['email']) or !isset($_POST['code'])) {
    return;  
}

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
$stmt = $db->prepare('SELECT emailAddress, code FROM User WHERE emailAddress=:email AND code=:code');
$stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
$stmt->bindParam(':code', $_POST['code'], SQLITE3_TEXT);

$result = $stmt->execute();

$rows_array = [];
while ($row=$result->fetchArray())
{
    $rows_array[]=$row;
}
return $rows_array;
}

function verifyAccount () {
    
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $stmt = $db->prepare('UPDATE User SET verified = :true, code = null WHERE emailAddress = :email');

    $true = "true";

    $stmt->bindParam(':true', $true, SQLITE3_TEXT);   
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    
    $result = $stmt->execute();
    
    $rows_array = [];
    while ($row=$result->fetchArray())
    {
        $rows_array[]=$row;
    }
    return $rows_array;
    }