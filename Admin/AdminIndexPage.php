<?php require("../NavigationBarAdmin.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['adminName']; 
?>

<!DOCTYPE html>
<html>
<body>

<div class="container pb-5">

    <div class="row d-flex justify-content-center">
        <div style="font-size:16px;"class="col-md-8"><br>

            <?php 
				date_default_timezone_set('Europe/London');

				$hour = date('G');
				$timeOfDay = "";

				if ( $hour >= 5 && $hour <= 11 ) {
					$timeOfDay .= "Good Morning";
				} else if ( $hour >= 12 && $hour <= 18 ) {
					$timeOfDay .= "Good Afternoon";
				} else if ( $hour >= 19 || $hour <= 4 ) {
					$timeOfDay .= "Good Evening";
				}
			?>

          <div style="border-radius: 30px; background-color: #ebebeb; padding: 10px; margin: auto; width: 65%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
          <h4 style="color: darkred"><b>(Administrator Panel)</b></h4>
          <br><h4 style="text-align: center;"><?php echo $timeOfDay?>, <span style = "color: darkred"><?php echo "$user" ?>!</h4>
          <br><h5>What would you like to do today?</h5>
          <br><a class="btn btn-danger col-md-6" href="AdminViewUsers.php" role="button">View Users</a><br>
          <br><a class="btn btn-danger col-md-6" href="AdminBannedUsers.php" role="button">Banned Users</a><br>
          <br><a class="btn btn-danger col-md-6" href="AdminVerifyImages.php" role="button">Verify Images</a><br>
          <br><a class="btn btn-danger col-md-6" href="AdminAuditLogs.php" role="button">Audit Logs</a><br><br>
          
        </div>
        </div>
    </div>
</div>

<?php require("../Footer.php");?>

</body>
</html>


