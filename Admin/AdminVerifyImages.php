<?php require("../NavigationBarAdmin.php");
include_once("AdminVerifyImagesSQL.php");

$path = "../Index.php"; 
     
if (!isset($_SESSION['admin'])){
    session_unset();
    session_destroy();
    header("Location: ../Index.php"); 
}
$user = $_SESSION['admin']; 

$image = getImages();
?>

<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <br><h3>Verify Images</h3><br>

        <?php if(isset($_GET['deletedimage'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                The image has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['verifiedimage'])): ?>
            <div class="alert alert-success alert-dismissible fade show col-12" role="alert" style="font-weight: bold;">
                The image has been applied to the user's profile
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <table class="table table-striped">
        <thead class="table-dark">
            <td>User ID</td>
            <td>Image</td>
            <td>Actions</td>
        </thead>

        <?php
            for ($i=0; $i<count($image); $i++):
        ?>
        <tr>
            <td><?php echo $image[$i]['user']?></td>
            <td><img src="../Images/<?php echo $image[$i]['image']; ?>" alt="Image" width="75" height="75"></td> 
            <td><a href="AdminVerifyImage.php?image=<?php echo $image[$i]['image'];?>&id=<?php echo $image[$i]['user']; ?>"><button class="btn btn-success">Verify Image</button></a>                
            <a href="AdminDeleteImage.php?id=<?php echo $image[$i]['user']; ?>"><button class="btn btn-danger">Delete Image</button></a></td>
        </tr>
        <?php endfor;?>
        </table>  

        </div>
    </div>
</div>


<?php require("../Footer.php");?>

</body>
</html>


