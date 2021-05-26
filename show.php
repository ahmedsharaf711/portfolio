<?php include('inc/header.php'); 
if(isset($_GET['id']))
{
    $id = $_GET['id']; 
    //echo $id;
}
elseif(!isset($_GET['id']))
{
header("location:index.php");
}
$query = "SELECT * FROM projects WHERE id=$id";
$runquery = mysqli_query($conn , $query);
$project = mysqli_fetch_assoc($runquery);
?>
<div class="container">
    <div class="row">


    <div class="col-md-6">
    <img src="images/<?= $project['img'] ?>" alt="" class="img-fluid">
    </div> 



        <div class="col-md-6">
        <h1><?= $project['name']?></h1>

        <p><?= $project['description'] ?></p>
        </div>
        
    </div>
</div>