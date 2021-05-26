<?php 
session_start();
require_once("inc/conn.php");
?>
<?php
if(isset($_POST['submit']))
{
$errors = [];
 $name = htmlspecialchars(trim($_POST['name']));
 $desc = htmlspecialchars(trim($_POST['desc']));
 $file = $_FILES['file'];
 $filetmpname = $file['tmp_name'];
 $filename = $file['name'];
 $filenewname = rand(1,1000).time().$filename;
 $filesize = $file['size'];;
 $fileerror = $file['error'];;

 $url = htmlspecialchars(trim($_POST['url']));
 $repo = htmlspecialchars(trim($_POST['repo']));
 
  if(empty($name))
  {
      $errors[] = 'please !! insert your name';
  }
  else if(strlen($name) > 100)
  {
      $errors[] = 'name must be characters';
  }
  else if(!is_string($name))
  {
      $errors[] = 'email must be write with caracters';
  }




  if(empty($desc))
  {
      $errors[] = 'please !! insert description here';
  }
 
  else if(!is_string($desc))
  {
      $errors[] = 'you must right in text';
  }





//if($fileerror !=0)
//{
  //  $errors[] = 'this in invalid file';
//}























  if(empty($url))
  {
      $errors[] = 'please !! insert link';
  }
  else if(!filter_var($url , FILTER_VALIDATE_URL))
  {
      $errors[] = 'this link is not a valid url link';
  }









  if(empty($repo))
  {
      $errors[] = 'please !! insert your repo';
  }
  else if(!filter_var($repo , FILTER_VALIDATE_URL))
  {
      $errors[] = 'this link is not a valid url link';
  }

 
 //echo mysqli_num_rows($run_query);
 if(empty($errors))
 {
    $query = "INSERT INTO projects (name , description, img , url , repo) VALUES ('$name' , '$desc' , '$filenewname' ,'$url' , '$repo')";
    $run_query = mysqli_query($conn , $query);
    move_uploaded_file($filetmpname , "images/$filenewname");
    header('location:index.php');
  // $_SESSION['wrong'] = $errors;
     
 }
else
{
    $_SESSION['wrong'] = $errors;
    header('location:edit.php');
}



}
?>
