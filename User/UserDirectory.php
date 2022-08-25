<?php require("../NavigationBarUser.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['user']; 
?>

<!DOCTYPE html>
<html>
<body>


<?php require("../Footer.php");?>

</body>
</html>


