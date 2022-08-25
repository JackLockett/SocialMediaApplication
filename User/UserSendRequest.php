<?php

function requestDuplicates() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sender = $_GET['sender'];
    $receiver = $_GET['receiver'];
    $rows = $db->query("SELECT COUNT(*) as count FROM Requests WHERE sender = '$sender' and receiver = '$receiver'");
    $row = $rows->fetchArray();
    $numRows = $row['count'];

    return $numRows;
}

function alreadyFriends() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sender = $_GET['sender'];
    $receiver = $_GET['receiver'];
    $rows = $db->query("SELECT COUNT(*) as count FROM Friends WHERE user = '$sender' and friend = '$receiver'");
    $row = $rows->fetchArray();
    $numRows = $row['count'];

    return $numRows;
}

$alreadyFriends = alreadyFriends();
$requestDuplicates = requestDuplicates();

if ($alreadyFriends == 1) {
    header("Location: UserViewDirectory.php?alreadyfriends=true");   
}
else if ($requestDuplicates != 1) 
{
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $stmt = "INSERT INTO Requests(sender, senderName, receiver, receiverName) VALUES (:sender, :senderName, :receiver, :receiverName)";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':sender', $_GET['sender'], SQLITE3_TEXT);
    $sql->bindParam(':senderName', $_GET['senderName'], SQLITE3_TEXT);
    $sql->bindParam(':receiver', $_GET['receiver'], SQLITE3_TEXT);
    $sql->bindParam(':receiverName', $_GET['receiverName'], SQLITE3_TEXT);
    
    $sql->execute();
    
    header("Location: UserViewDirectory.php?request=true");
}
else {
    header("Location: UserViewDirectory.php?alreadyrequested=true");  
}
