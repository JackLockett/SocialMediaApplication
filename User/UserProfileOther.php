<?php require("../NavigationBarUser.php");
include_once("UserProfileOtherSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['user']; 

$id = $arrayResult[0][0];
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3><?php echo $arrayResult[0][1]?> <?php echo $arrayResult[0][2]?>'s Profile</h3><br>

        </div>
    </div>

    <div class="row gx-8 justify-content-center">

    <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 65%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);" class="col-lg-3 col-md-6">

    <h4>Profile Picture</h4><br>
    <img src="../Images/<?php echo $arrayResult[0][8]?>" alt="Image" width="150" height="150"><br><br>

    </div>

    <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 40%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);" class="col-lg-7 col-md-12">

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
            <td><?php echo $arrayResult[0][1]?></td>
            <td><?php echo $arrayResult[0][2]?></td>
            <td><?php echo $arrayResult[0][3]?></td>
            <td><?php echo $arrayResult[0][5]?></td>
            <td><?php echo $arrayResult[0][6]?></td>                   
        </tr>
    </table>


    <table class="table table-striped">
        <thead class="table-light">
            <td><b>About Me</b></td>
        </thead>

        <tr>
            <td><?php echo $arrayResult[0][7]?></td>                
        </tr>
    </table>
    </div>

</div>

</div>


<?php require("../Footer.php");?>

</body>
</html>


