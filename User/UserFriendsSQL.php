<?php

function getFriends (){
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = "SELECT * FROM Friends WHERE user = :appid";

    $email = $_SESSION["userId"];
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':appid', $email, SQLITE3_TEXT);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult;
}

?>

