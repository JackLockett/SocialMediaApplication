<?php require("NavigationBar.php");
include_once("User/UserRegisterSQL.php");

$errorCredentials = $loginError = "";

if (isset($_POST['submit'])){

    if ($_POST['firstName']=="") {
        $errorCredentials = "Missing Credentials";
        $error_name_css ='border: solid 1px red;';
        $allFields = "no";
    }

    if ($_POST['surname']==null) {
        $errorCredentials = "Missing Credentials";
        $error_surname_css ='border: solid 1px red;';
        $allFields = "no";        
    }

    if ($_POST['email']==null) {
        $errorCredentials = "Missing Credentials";
        $error_email_css ='border: solid 1px red;';
        $allFields = "no";        
    }

    if ($_POST['password']==null) {
        $errorCredentials = "Missing Credentials";
        $error_password_css ='border: solid 1px red;';
        $allFields = "no";        
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errorCredentials = "Invalid Email Address";
    }
    else {
        if($_POST['firstName'] != null && $_POST["surname"] !=null && $_POST['email']!=null && $_POST['password']!=null)
        {
            $taken = isEmailTaken();
            if ($taken != 1) {
                $createUser = registerUser();
                header('Location: User/UserCreationSummary.php');
            }
            else {
                $errorCredentials = "Email Is Taken";
            }
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
          <br><h5>Register An Account</h5><br>
          
          <form method="post">

            <div class="form-group col-md-12">
                <input class="form-control" placeholder="First Name" type="text" name = "firstName" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" style="<?php echo $error_name_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" placeholder="Surname" type="text" name = "surname" value="<?php echo isset($_POST['surname']) ? $_POST['surname'] : '' ?>" style="<?php echo $error_surname_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" placeholder="Email Address" type="text" name = "email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" style="<?php echo $error_email_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" placeholder="Password" type="password" name = "password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" style="<?php echo $error_password_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <label for="dob">Date Of Birth:</label>
                <input type="date" name="dateofbirth">
            </div>

            <div class="form group col-md-12">
                <label class="radio-inline">
                <label>Gender:</label>
                <input type="radio" name="gender" value="Male" checked>&nbsp;Male&nbsp;
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Female">&nbsp;Female&nbsp;
                </label>
                <label class="radio-inline">
                <input type="radio" name="gender" value="Other">&nbsp;Other&nbsp;
                </label>
            </div>

            <span class="text-danger"><?php echo $errorCredentials; ?></span>

            <div class="form-group col-md-12">
                <hr>
                <input class="btn btn-success btn-block" type="submit" value="Register" name ="submit">
            </div>
          </form>

        </div>

        </div>
    </div>
</div>
</body>
</html>

<?php require("Footer.php");?>


