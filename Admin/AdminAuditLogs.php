<?php require("../NavigationBarAdmin.php");
include_once("AdminAuditLogsSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['admin']; 

$log = getLogs();
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3>Audit Logs</h3><br>

        <?php if(isset($_GET['deletedaudit'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                The log has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
        <thead class="table-dark">
            <td>ID</td>
            <td>Log</td>
            <td>Actions</td>
        </thead>

        <?php
            for ($i=0; $i<count($log); $i++):
        ?>
        <tr>
            <td><?php echo $log[$i]['id']?></td>
            <td><?php echo $log[$i]['logs']?></td>                     
            <td><a href="AdminDeleteAuditLog.php?id=<?php echo $log[$i]['id']; ?>"><button class="btn btn-danger">Delete Log</button></a></td>
        </tr>
        <?php endfor;?>
        </table>  

        </div>
    </div>
</div>


<?php require("../Footer.php");?>

</body>
</html>


