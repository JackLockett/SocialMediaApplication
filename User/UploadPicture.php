<?php

if (($_FILES['my_file']['name']!="")){
	$target_dir = "../Images/";
	$file = $_FILES['my_file']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['my_file']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;
 
 move_uploaded_file($temp_name,$path_filename_ext);

 if (isset($_POST['submit']))
{
    $id = $_GET['id'];
    $picture = $filename.".".$ext;

    $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
    $sql = "INSERT INTO Images(user, image) VALUES (:user, :image)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user',$id, SQLITE3_TEXT);
    $stmt->bindParam(':image',$picture, SQLITE3_TEXT);
    $stmt->execute();
    //updateLog(); 
}

 header('Location: /User/UserProfileSelf.php?picture=true');

}