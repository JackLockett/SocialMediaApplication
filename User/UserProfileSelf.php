<?php require("../NavigationBarUser.php");
include_once("UserProfileSelfSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['user']; 
$user = getData();
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3>Your Profile</h3><br>

        </div>
    </div>
    

    <div class="row gx-8 justify-content-center">

    <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 65%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);" class="col-lg-3 col-md-6">

    <?php
        for ($i=0; $i<count($user); $i++):
    ?>
    <h4>Profile Picture</h4><br>
    <img src="../Images/<?php echo $user[$i]['userImage']?>" alt="Image" width="150" height="150"><br><br>
    <a href="UserUpdatePicture.php?id=<?php echo $user[$i]['id'] ?>" >
        <button type="button" class="btn btn-primary">Update Your Profile Picture</button>
    </a>

    </div>

    <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 40%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);" class="col-lg-7 col-md-12">

    <?php if(isset($_GET['updated'])): ?>
        <div class="alert alert-success alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
            Your details have been updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(isset($_GET['picture'])): ?>
        <div class="alert alert-warning alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
            Your profile picture will be reviewed by an administrator.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <h4>Information</h4>
    <table class="table table-striped">
        <thead class="table-light">
            <td><b>First Name</b></td>
            <td><b>Surname</b></td>
            <td><b>Email Address</b></td>
            <td><b>Date Of Birth</b></td>
            <td><b>Gender</b></td>
        </thead>

        <tr>
            <td><?php echo $user[$i]['firstName']?></td>
            <td><?php echo $user[$i]['surname']?></td>
            <td><?php echo $user[$i]['emailAddress']?></td>
            <td><?php echo $user[$i]['dateOfBirth']?></td>
            <td><?php echo $user[$i]['gender']?></td>                   
        </tr>
    </table>

    <table class="table table-striped">

        <thead class="table-light">
            <td><b>About Me</b></td>
        </thead>

        <tr>
            <td><?php echo $user[$i]['description']?></td>                
        </tr>
    </table><br>

    <a href="UserProfileUpdate.php?id=<?php echo $user[$i]['id'] ?>" >
        <button type="button" class="btn btn-primary">Update Your Details</button>
    </a> 
    <a href="UserProfileAboutUpdate.php?id=<?php echo $user[$i]['id'] ?>" >
        <button type="button" class="btn btn-secondary">Update Your About Me</button>
    </a> 
    <a href="UserProfileDelete.php?id=<?php echo $user[$i]['id'] ?>" >
        <button type="button" class="btn btn-danger">Delete Your Account</button>
    </a> 
    </div>

    
    <?php endfor;?>

</div>

</div>


<?php require("../Footer.php");?>

</body>
</html>


