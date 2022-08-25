<!doctype html>
<html lang="en">

<head>
<title>Hallam Hub</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="../Style.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
</head>

<?php 
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="UserIndexPage.php">Hallam Hub</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="UserProfileSelf.php">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="UserFriends.php">My Friends</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="UserRequests.php">Friend Requests</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="UserViewDirectory.php">View Directory</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a class="nav-link disabled">Signed In: <span style = "color: lightgreen"><?php echo $_SESSION["userName"]; ?></span><span style = "color: orange"><b> (User)</b></span></a>
      </form>
      <form class="form-inline my-2 my-lg-0">
        <a class="btn btn-danger" href="UserLogout.php" role="button">Log Out</a>
      </form>
  </div>
</nav>
