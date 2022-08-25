<?php require("../NavigationBarAdmin.php");
include_once("AdminUpdateUserSQL.php");
include_once("AdminLogger.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['admin']; 

$editError = "";

$id = $arrayResult[0][0];

if (isset($_POST['submit']))
{
    if ($_POST['firstName']=="") {
        $editError = "Missing Credentials";
        $error_name_css ='border: solid 1px red;';
        $allFields = "no";
    }

    if ($_POST['surname']==null) {
        $editError = "Missing Credentials";
        $error_surname_css ='border: solid 1px red;';
        $allFields = "no";        
    }

    if ($_POST['email']==null) {
        $editError = "Missing Credentials";
        $error_email_css ='border: solid 1px red;';
        $allFields = "no";        
    }
    if($_POST['firstName'] != null && $_POST["surname"] !=null && $_POST['email']!=null)
    {
        $db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/SocialMedia.db');
        $sql = "UPDATE User SET firstName = :firstName, surname = :surname, emailAddress = :email, dateOfBirth = :dateofbirth, gender = :gender WHERE id = '$id'";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':firstName',$_POST['firstName'], SQLITE3_TEXT);
        $stmt->bindParam(':surname',$_POST['surname'], SQLITE3_TEXT);
        $stmt->bindParam(':email',$_POST['email'], SQLITE3_TEXT);
        $stmt->bindParam(':dateofbirth',$_POST['dateofbirth'], SQLITE3_TEXT);
        $stmt->bindParam(':gender',$_POST['gender'], SQLITE3_TEXT);
        $stmt->execute();

        updateLog();
    
        header('Location: /Admin/AdminViewUsers.php?updated=true');
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
          <br><h5>Update User</h5><br>
          
          <form method="post">

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "firstName" value="<?php echo $arrayResult[0][1]; ?>" style="<?php echo $error_name_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "surname" value="<?php echo $arrayResult[0][2]; ?>" style="<?php echo $error_surname_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "email" value="<?php echo $arrayResult[0][3]; ?>" style="<?php echo $error_email_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <label for="dob">Date Of Birth:</label>
                <input type="date" value="<?php echo $arrayResult[0][5]; ?>" name="dateofbirth">
            </div>

            <div class="form group col-md-12">
                <label class="radio-inline">
                <label>Gender:</label>
                <input type="radio" name="gender" value="Male" <?php echo ($arrayResult[0][6] == "Male" ? 'checked="checked"': ''); ?>>&nbsp;Male&nbsp;
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Female" <?php echo ($arrayResult[0][6] == "Female" ? 'checked="checked"': ''); ?>>&nbsp;Female&nbsp;
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Other" <?php echo ($arrayResult[0][6] == "Other" ? 'checked="checked"': ''); ?>>&nbsp;Other&nbsp;
                </label>
            </div>

            <div class="form-group col-md-12">
                <span class="text-danger"><?php echo $editError; ?></span>
            </div>

            <div class="form-group col-md-12">
                <hr>
                <input class="btn btn-success btn-block" type="submit" value="Update" name ="submit">
            </div>

            <div class="form-group col-md-12">
                <a class="btn btn-secondary btn-block" href="AdminViewUsers.php" role="button">Return To Users</a>
            </div>

          </form>
        </div>
        </div>
    </div>
</div>

<?php require("../Footer.php");?>

</body>
</html>


