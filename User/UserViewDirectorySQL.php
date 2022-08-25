<?php

function getUsers (){
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = "SELECT * FROM User WHERE role = 'user' AND emailAddress IS NOT :email";

    $email = $_SESSION["user"];
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult;
}

?>

