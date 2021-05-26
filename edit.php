<?php include('inc/header.php') ; ?>
<?php
if(!isset($_SESSION['user']))
{ 
    header('location:index.php');
}
if(isset($_GET['id']))
{
    
    $ID = $_GET['id'];
    $query = "SELECT * FROM projects where id = $ID";
    $run_query = mysqli_query($conn , $query);
    $data = mysqli_fetch_assoc($run_query);
    
}
if(isset($_SESSION['wrong']))
{
foreach($_SESSION['wrong'] as $error)
{
    echo "<h5>" . $error . "</h5>";
}
unset($_SESSION['wrong']);
}
?>
<div class="container">
<form  action="handle-edit.php?id=<?=$data['id'] ?>" method="post" enctype="multipart/form-data">
<label class="mt-2">Name :</label>
<input class="form-control" name="name" type="text" placeholder="Enter project Name" value="<?= $data['name'] ?>">
<label class="mt-2">Description :</label>
<textarea class="form-control" name="desc" id="" placeholder="Please Enter Description" ><?= $data['description'] ?></textarea>
 <label class="mt-2">Img :</label>
 <input type="file" name="file" class="form-control">
 <label class="mt-2">Website-URL :</label>
<input class="form-control" name="url" type="text" placeholder="Enter webtsite url" value="<?= $data['url'] ?>">
<label class="mt-2">Repo-URL :</label>
<input class="form-control" name="repo" type="text" placeholder="Enter github repo" value="<?= $data['repo'] ?>">

<button class="btn btn-success mt-4" type="submit" name="submit">Edit</button>
</form>

</div>
<?php include('inc/footer.php') ; ?>