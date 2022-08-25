<?php require("../NavigationBarUser.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['userName']; 
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
          <br><h4 style="text-align: center;"><?php echo $timeOfDay?>, <span style = "color: blue"><?php echo "$user" ?>!</h4>
          <br><h5>What would you like to do today?</h5>
          <br><a class="btn btn-primary col-md-6" href="UserProfileSelf.php" role="button">My Profile</a><br>
          <br><a class="btn btn-primary col-md-6" href="UserFriends.php" role="button">My Friends</a><br>
          <br><a class="btn btn-primary col-md-6" href="UserRequests.php" role="button">Friend Requests</a><br>
          <br><a class="btn btn-primary col-md-6" href="UserViewDirectory.php" role="button">View Directory</a><br><br>
          
        </div>
        </div>
    </div>
</div>

<?php require("../Footer.php");?>

</body>
</html>


