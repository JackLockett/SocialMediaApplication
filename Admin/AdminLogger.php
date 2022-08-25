<?php

function updateLog() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = 'INSERT INTO Logs(logs) VALUES (:log)';
    $stmt = $db->prepare($sql);
    
    $admin = $_SESSION['adminName'];
    $id = $_GET['id'];
    $audit = "$admin (Admin) | <b>Updated User</b> | User ID - $id";
    $stmt->bindParam(':log', $audit, SQLITE3_TEXT); 
    $stmt->execute();   
}

function banLog() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = 'INSERT INTO Logs(logs) VALUES (:log)';
    $stmt = $db->prepare($sql);
    
    $admin = $_SESSION['adminName'];
    $id = $_GET['id'];
    $audit = "$admin (Admin) | <b>Banned User</b> | User ID - $id";
    $stmt->bindParam(':log', $audit, SQLITE3_TEXT); 
    $stmt->execute();   
}

function unbanLog() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = 'INSERT INTO Logs(logs) VALUES (:log)';
    $stmt = $db->prepare($sql);
    
    $admin = $_SESSION['adminName'];
    $id = $_GET['id'];
    $audit = "$admin (Admin) | <b>Unbanned User</b> | User ID - $id";
    $stmt->bindParam(':log', $audit, SQLITE3_TEXT); 
    $stmt->execute();   
}

function deleteLog() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = 'INSERT INTO Logs(logs) VALUES (:log)';
    $stmt = $db->prepare($sql);
    
    $admin = $_SESSION['adminName'];
    $id = $_GET['id'];
    $audit = "$admin (Admin) | <b>Deleted User</b> | User ID - $id";
    $stmt->bindParam(':log', $audit, SQLITE3_TEXT); 
    $stmt->execute();   
}

function verifiyImageLog() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = 'INSERT INTO Logs(logs) VALUES (:log)';
    $stmt = $db->prepare($sql);
    
    $admin = $_SESSION['adminName'];
    $id = $_GET['id'];
    $audit = "$admin (Admin) | <b>Verified Profile Picture</b> | User ID - $id";
    $stmt->bindParam(':log', $audit, SQLITE3_TEXT); 
    $stmt->execute();   
}

function deleteImageLog() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = 'INSERT INTO Logs(logs) VALUES (:log)';
    $stmt = $db->prepare($sql);
    
    $admin = $_SESSION['adminName'];
    $id = $_GET['id'];
    $audit = "$admin (Admin) | <b>Deleted Profile Picture</b> | User ID - $id";
    $stmt->bindParam(':log', $audit, SQLITE3_TEXT); 
    $stmt->execute();   
}
?>