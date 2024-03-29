<?php

function verifyUser () {

if (!isset($_POST['email']) or !isset($_POST['password'])) {
    return;  
}

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
$stmt = $db->prepare('SELECT id, firstName, surname, emailAddress, password, role, verified, banned FROM User WHERE emailAddress=:email AND password=:password');
$stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
$stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

$result = $stmt->execute();

$rows_array = [];
while ($row=$result->fetchArray())
{
    $rows_array[]=$row;
}
return $rows_array;
}



