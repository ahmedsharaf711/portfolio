<?php 

include('inc/header.php'); ?>
<?php 
if(isset($_SESSION['user'])){ ?>
    <a href='addFormProject.php' class='btn btn-primary m-3'>Add Project</a>
    <a href='logout.php' class='btn btn-danger m-3'>LogOut</a>
    <?php } ?>
<?php 
$query = 'SELECT * FROM projects';
$run_query = mysqli_query($conn , $query);
$projects = mysqli_fetch_all($run_query , MYSQLI_ASSOC);
?>
<?php if(!isset($_SESSION['user'])) :?>
<a href='login.php' class='btn btn-primary m-3'>LogIn</a>
<?php endif;?>


<div class="container">
    <div class="row">
<?php foreach($projects as $project) { ?>

    <div class="col-md-4">
    <img src="images/<?=$project['img']?>" alt="" class='img-fluid'>
    <h1><?= $project['name'] ?></h1>
    <a href="show.php?id=<?= $project['id'] ?>" class="btn btn-primary">View-Details</a>
    
    <?php 
if(isset($_SESSION['user'])){ ?>
    <a href="edit.php?id=<?= $project['id'] ?>" class="btn btn-success">Edit</a>
    <a href="delete.php?id=<?= $project['id'] ?>" class="btn btn-danger">Delete</a>
    <?php } ?>
    </div>

<?php } ?>

    </div>
</div>