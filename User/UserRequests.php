<?php require("../NavigationBarUser.php");
include_once("UserRequestsSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['user']; 
$request = getRequests();
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3>Friend Requests</h3><br>

        <?php if(isset($_GET['accept'])): ?>
            <div class="alert alert-success alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                You accepted a friend request
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['deny'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                You denied a friend request
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
        <thead class="table-dark">
            <td>Requester</td>
            <td>Actions</td>
        </thead>

        <?php
            for ($i=0; $i<count($request); $i++):
        ?>
        <tr>
            <td><?php echo $request[$i]['senderName']?></td>
            <td><a href="UserRequestAccept.php?sender=<?php echo $request[$i]['sender']; ?>&senderName=<?php echo $request[$i]['senderName']; ?>&receiver=<?php echo $request[$i]['receiver']; ?>&receiverName=<?php echo $request[$i]['receiverName']; ?>"><button class="btn btn-success">Accept</button></a> 
            <a href="UserRequestDeny.php?sender=<?php echo $request[$i]['sender']; ?>&receiver=<?php echo $request[$i]['receiver']; ?>"><button class="btn btn-danger">Deny</button></a> </td>  
        </tr>
        <?php endfor;?>
        </table>  

        </div>
    </div>
</div>


<?php require("../Footer.php");?>

</body>
</html>


