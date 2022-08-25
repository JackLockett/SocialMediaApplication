<?php require("../NavigationBarUser.php");
include_once("UserViewDirectorySQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['user']; 
$user = getUsers();
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3>Hallam Hub Directory</h3><br>

        <?php if(isset($_GET['request'])): ?>
            <div class="alert alert-success alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                You sent a friend request
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['alreadyrequested'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                You already sent a friend request to this user
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['alreadyfriends'])): ?>
            <div class="alert alert-warning alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                You are already friends with this user
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
        <thead class="table-dark">
            <td>First Name</td>
            <td>Surname</td>
            <td>Email Address</td>
            <td>Date Of Birth</td>
            <td>Gender</td>
            <td>Actions</td>
        </thead>

        <?php
            for ($i=0; $i<count($user); $i++):
        ?>
        <tr>
            <td><?php echo $user[$i]['firstName']?></td>
            <td><?php echo $user[$i]['surname']?></td>
            <td><?php echo $user[$i]['emailAddress']?></td>
            <td><?php echo $user[$i]['dateOfBirth']?></td>
            <td><?php echo $user[$i]['gender']?></td>
            <td><a href="UserProfileOther.php?id=<?php echo $user[$i]['id']; ?>"><button class="btn btn-primary">View Profile</button></a>
            <a href="UserSendRequest.php?request=true&sender=<?php echo $_SESSION["userId"]; ?>&senderName=<?php echo $_SESSION["userName"]; ?>&receiver=<?php echo $user[$i]['id']; ?>&receiverName=<?php echo $user[$i]['firstName']." ".$user[$i]['surname'] ?>"><button class="btn btn-success">Send Friend Request</button></a> </td>  
        </tr>
        <?php endfor;?>
        </table>  

        </div>
    </div>
</div>


<?php require("../Footer.php");?>

</body>
</html>


