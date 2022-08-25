<?php

function getImages (){
    $db = new SQLITE3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = "SELECT * FROM Images";
    
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row;
    }
    return $arrayResult;
}

?>

