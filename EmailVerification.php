<?php require("NavigationBar.php");
include_once("EmailVerificationSQL.php");

$errorCredentials = $loginError = "";

if (isset($_POST['submit'])){

    if ($_POST['email']=="") {
        $errorCredentials = "Missing Credentials";
        $error_name_css ='border: solid 1px red;';
        $allFields = "no";
    }

    if ($_POST['code']=="") {
        $errorCredentials = "Missing Credentials";
        $error_name_css ='border: solid 1px red;';
        $allFields = "no";
    }

    if($_POST['email'] != null && $_POST['code'] != null)
    {
        $array_user = verifyCode(); 
        if ($array_user != null) 
        {
            verifyAccount();
            header("Location: User/EmailVerificationSuccess.php"); 
        }
        if ($array_user !== null)
        {
            $errorCredentials = "Invalid Code / Email";
        }
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
          <br><h5>Verify Your Email</h5><br>
          
          <form method="post">

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "email" value="<?php echo $_GET['email']?>" style="<?php echo $error_name_css; ?>" readonly>
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" type="text" name = "code" value="<?php echo $_GET['code'] ?>" style="<?php echo $error_name_css; ?>" hidden>
            </div>

            <span class="text-danger"><?php echo $errorCredentials; ?></span>

            <div class="form-group col-md-12">
                <hr>
                <input class="btn btn-success btn-block" type="submit" value="Verify" name ="submit">
            </div>
          </form>

        </div>

        </div>
    </div>
</div>
</body>
</html>

<?php require("Footer.php");?>


