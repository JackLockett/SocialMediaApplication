<?php require("NavigationBar.php");
require_once("LoginCheck.php");

$errorCredentials = $loginError = "";
$error_css = "";

if (isset($_POST['submit'])){

    $array_user = verifyUser(); 

    if ($_POST['email']==""){
        $errorCredentials = "Missing Credentials";
        $error_email_css ='border: solid 1px red;';
        $allFields = "no";
    }
    if ($_POST['password']==null){
        $errorCredentials = "Missing Credentials";
        $error_password_css ='border: solid 1px red;';
        $allFields = "no";
    }

    if($_POST['email'] != null && $_POST["password"] !=null)
    {
        error_reporting(E_ERROR);
        if ($array_user[0]['verified']=="false") {
            $errorCredentials = "Account Not Verified";           
        }
        if ($array_user[0]['banned']=="true") {
            $errorCredentials = "Account Is Banned";           
        }
        else {
            if ($array_user != null) {

                if ($array_user[0]['role']=="user")
                {
                    session_start();
        
                    $helper = array_keys($_SESSION);
                    foreach ($helper as $key){
                        unset($_SESSION[$key]);
                    }
            
                    session_start();
                    $_SESSION['user'] = $array_user[0]['emailAddress'];
                    $_SESSION['userName'] = $array_user[0]['firstName']." ".$array_user[0]['surname'];
                    $_SESSION['userId'] = $array_user[0]['id'];
                    
                    header("Location: User/UserIndexPage.php"); 
                    exit();  
                } 
                if ($array_user[0]['role']=="admin")
                {
                    session_start();
        
                    $helper = array_keys($_SESSION);
                    foreach ($helper as $key){
                        unset($_SESSION[$key]);
                    }
            
                    session_start();
                    $_SESSION['admin'] = $array_user[0]['emailAddress'];
                    $_SESSION['adminName'] = $array_user[0]['firstName']." ".$array_user[0]['surname'];
                    
                    header("Location: Admin/AdminIndexPage.php"); 
                    exit();  
                } 
             }
             if ($array_user !== null)
             {
                 $errorCredentials = "Invalid Credentials";
             }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">

    <div class="row">
        <div style="font-size:18px; white-space: pre" class="col-md-6">


        Hallam Hub is a online directory application to connect
        students at Sheffield Hallam University.

    You can use Hallam Hub to:
        <li>Search for people at Sheffield Hallam</li><li>Find out who is in your classes</li><li>Make new friends on campus</li><li>Start your own online profile</li>
        </div>
        <div style="font-size:16px;"class="col-md-6"><br><br><br>

          <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 65%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
          <br><h5>Login</h5><br>

          <form method="post">

            <div class="form-group col-md-12">
                <input class="form-control" placeholder="Email Address" type="text" name = "email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" style="<?php echo $error_email_css; ?>">
            </div>

            <div class="form-group col-md-12">
                <input class="form-control" placeholder="Password" type="password" name = "password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>" style="<?php echo $error_password_css; ?>">
            </div>

            <span class="text-danger"><?php echo $errorCredentials; ?></span>

            <div class="form-group col-md-12">
                <b><span class="text-danger"><?php echo $loginError; ?></span></b>
            </div>

            <div class="form-group col-md-12">
                <input class="btn btn-primary btn-block" type="submit" value="Login" name ="submit">
                <hr>
                <a href="./Register.php" >
                    <button type="button" class="btn btn-success">Create New Account</button>
                </a> 
            </div>
          </form>

        </div>

        </div>
    </div>
</div>


<?php require("Footer.php");?>

</body>
</html>


