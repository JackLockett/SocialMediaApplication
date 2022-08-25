<?php require("../NavigationBarUser.php");
include_once("UserFriendsSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['user']; 
$friend = getFriends();
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3>Your Friends</h3><br>

        <?php if(isset($_GET['remove'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                You removed a friend
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
        <thead class="table-dark">
            <td>Friend</td>
            <td>Actions</td>
        </thead>

        <?php
            for ($i=0; $i<count($friend); $i++):
        ?>
        <tr>
            <td><?php echo $friend[$i]['friendName']?></td>
            <td><a href="UserProfileOther.php?id=<?php echo $friend[$i]['friend']; ?>"><button class="btn btn-primary">View Profile</button></a>
            <a href="UserFriendsRemove.php?user=<?php echo $_SESSION['userId']?>&friend=<?php echo $friend[$i]['friend']; ?>"><button class="btn btn-danger">Remove Friend</button></a> </td>  
        </tr>
        <?php endfor;?>
        </table>  

        </div>
    </div>
</div>


<?php require("../Footer.php");?>

</body>
</html>


