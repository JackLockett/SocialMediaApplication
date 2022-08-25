<?php require("../NavigationBarAdmin.php");
include_once("AdminDeleteUserSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['admin']; 

?>

<!DOCTYPE html>
<html>
<body>

<div class="container pb-5">

    <div class="row d-flex justify-content-center">
        <div style="font-size:16px;"class="col-md-8"><br>

          <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 65%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
          <br><h5>Delete User</h5><br>
          
          <form method="post">

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "firstName" value="<?php echo $arrayResult[0][1]; ?>" disabled>
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "surname" value="<?php echo $arrayResult[0][2]; ?>" disabled>
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "email" value="<?php echo $arrayResult[0][3]; ?>" disabled>
            </div>

            <div class="form-group col-md-12">
                <label for="dob">Date Of Birth:</label>
                <input type="date" value="<?php echo $arrayResult[0][5]; ?>" name="dateofbirth" disabled>
            </div>

            <div class="form group col-md-12">
                <label class="radio-inline">
                <label>Gender:</label>
                <input type="radio" name="gender" value="Male" <?php echo ($arrayResult[0][6] == "Male" ? 'checked="checked"': ''); ?> disabled>&nbsp;Male&nbsp;
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Female" <?php echo ($arrayResult[0][6] == "Female" ? 'checked="checked"': ''); ?> disabled>&nbsp;Female&nbsp;
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Other" <?php echo ($arrayResult[0][6] == "Other" ? 'checked="checked"': ''); ?> disabled>&nbsp;Other&nbsp;
                </label>
            </div>

            <div class="form-group col-md-12">
                <hr>
                <input class="btn btn-danger btn-block" type="submit" value="Delete" name ="submit">
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


