<?php 
session_start();
require_once("inc/conn.php");
if(isset($_POST['submit']))
{
$errors = [];
 $email = $_POST['email'];
 $pass = $_POST['password'];
  if(empty($email))
  {
      $errors[] = 'please !! insert your email';
  }
  else if(strlen($email) > 25)
  {
      $errors[] = 'email must be < 25 characters';
  }
  else if(!is_string($email))
  {
      $errors[] = 'email must be write with caracters';
  }

  else if(!filter_var($email , FILTER_VALIDATE_EMAIL))
  {
      $errors[] = 'this mail is not a valid email address';
  }


  if(empty($pass))
  {
      $errors[] = 'please !! insert your password';
  }
  else if(strlen($pass) > 15)
  {
      $errors[] = 'password must be < 15';
  }
  else if(!is_numeric($pass))
  {
      $errors[] = 'password must to be numbers';
  }
 
 //echo $email.$pass;
 
 //echo mysqli_num_rows($run_query);
 if(!empty($errors))
 {
    $_SESSION['wrong'] = $errors;
   header('location:login.php');  
 }
else
{
    $query = "SELECT * FROM users WHERE email = '$email'";
 $run_query = mysqli_query($conn , $query);
 $result=mysqli_fetch_assoc($run_query);
  if(mysqli_num_rows($run_query)>0)
  {    
    if($pass ==$result['password']) {
    $_SESSION['user'] = $email;
     header('location:index.php');
    } else {
        $_SESSION['wrong'] = ["In Correct Passowrd"];
        header('location:login.php');  
    } 
       
  }
    
}



}
?>