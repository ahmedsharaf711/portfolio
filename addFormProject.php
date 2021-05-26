<?php include('inc/header.php') ; ?>
<?php 
if(!isset($_SESSION['user']))
{ 
    header('location:index.php');
}

if(isset($_SESSION['wrong']))
{
    foreach($_SESSION['wrong'] as $error)
    {
        echo "<h5>" . $error ."</h5>";
    }
}
?>

<div class="container">
<form  action="handle-add.php" method="post" enctype="multipart/form-data">
<label class="mt-2">Name :</label>
<input class="form-control" name="name" type="text" placeholder="Enter project Name">
<label class="mt-2">Description :</label>
<textarea class="form-control" name="desc" id="" placeholder="Please Enter Description" ></textarea>
 <label class="mt-2">Img :</label>
 <input type="file" name="file" class="form-control">
 <label class="mt-2">Website-URL :</label>
<input class="form-control" name="url" type="text" placeholder="Enter webtsite url">
<label class="mt-2">Repo-URL :</label>
<input class="form-control" name="repo" type="text" placeholder="Enter github url">

<button class="btn btn-success mt-4" type="submit" name="submit">Add</button>
</form>

</div>
<?php include('inc/footer.php') ; ?>