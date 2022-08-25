<?php

function isEmailTaken() {
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $email = $_POST['email'];
    $rows = $db->query("SELECT COUNT(*) as count FROM User WHERE emailAddress = '$email'");
    $row = $rows->fetchArray();
    $numRows = $row['count'];

    return $numRows;
}

function registerUser(){

    $created = false;
    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db'); 
    $sql = 'INSERT INTO User(firstName, surname, emailAddress, password, dateOfBirth, gender, description, userImage, role, verified, banned, code) VALUES (:firstName, :surname, :emailAddress, :password, :dateOfBirth, :gender, :description, :userImage, :role, :verified, :banned, :code)';
    $stmt = $db->prepare($sql); 

    $originalDate = $_POST['dateofbirth'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    $defaultDescription = 'I am a student at Sheffield Hallam University!';
    $defaultImage = 'default.png';
    $userRole = 'user';
    $verified = 'false';
    $banned = 'false';
    $code=md5(time());

    require("PHPMailer.php");
    require("SMTP.php");
    require("Exception.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); 

    $mail->SMTPDebug = 1; 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = 'ssl'; 
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465; 
    $mail->IsHTML(true);
    $mail->Username = "hallamhub@gmail.com";
    $mail->Password = "ndu!fyv6wpy2GVU3zhx";
    $mail->SetFrom("hallamhub@gmail.com");
    $mail->Subject = "Hallam Hub - Code";
    $mail->Body = "<h2>Welcome to Hallam Hub!</h2><br>You can activate your account by heading to the following link: <br> http://localhost/EmailVerification.php?email=".$_POST['email']."&code=$code";
    $mail->AddAddress($_POST['email']);
    $mail->Send();

    $stmt->bindParam(':firstName', $_POST['firstName'], SQLITE3_TEXT); 
    $stmt->bindParam(':surname', $_POST['surname'], SQLITE3_TEXT);
    $stmt->bindParam(':emailAddress', $_POST['email'], SQLITE3_TEXT);   
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);
    $stmt->bindParam(':dateOfBirth', $newDate, SQLITE3_TEXT);
    $stmt->bindParam(':gender', $_POST['gender'], SQLITE3_TEXT);
    $stmt->bindParam(':description', $defaultDescription, SQLITE3_TEXT);
    $stmt->bindParam(':userImage', $defaultImage, SQLITE3_TEXT);
    $stmt->bindParam(':role', $userRole, SQLITE3_TEXT);
    $stmt->bindParam(':verified', $verified, SQLITE3_TEXT);
    $stmt->bindParam(':banned', $banned, SQLITE3_TEXT);
    $stmt->bindParam(':code', $code, SQLITE3_TEXT);
    $stmt->execute();
}

