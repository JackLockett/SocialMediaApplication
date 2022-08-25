<?php require("../NavigationBarUser.php");
require_once("UserProfileUpdateSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['user']; 

$editError = "";

$id = $arrayResult[0][0];

if (isset($_POST['submit']))
{
    if ($_POST['description']=="") {
        $editError = "Missing Credentials";
        $error_description_css ='border: solid 1px red;';
        $allFields = "no";
    }
    if($_POST['description'] != null)
    {
        $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
        $sql = "UPDATE User SET description = :description WHERE id = '$id'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':description',$_POST['description'], SQLITE3_TEXT);
        $stmt->execute();

        //updateLog();
    
        header('Location: /User/UserProfileSelf.php?updated=true');
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<div class="container pb-5">

    <div class="row d-flex justify-content-center">
        <div style="font-size:16px;"class="col-md-8"><br>

          <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 65%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
          <br><h5>Update Your About Me</h5><br>
          
          <form method="post">

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "description" maxlength="50" value="<?php echo $arrayResult[0][7]; ?>" style="<?php echo $error_description_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <span class="text-danger"><?php echo $editError; ?></span>
            </div>

            <div class="form-group col-md-12">
                <hr>
                <input class="btn btn-success btn-block" type="submit" value="Update" name ="submit">
            </div>

            <div class="form-group col-md-12">
                <a class="btn btn-secondary btn-block" href="UserProfileSelf.php" role="button">Return To Profile</a>
            </div>
            
          </form>
        </div>
        </div>
    </div>
</div>

<?php require("../Footer.php");?>

</body>
</html>


