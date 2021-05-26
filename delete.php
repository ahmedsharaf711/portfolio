<?php 
//session_start();
require_once("inc/conn.php");
if(isset($_GET['id']))
{
    $ID = $_GET['id'];
   // echo $ID;


   $query ="SELECT img FROM `projects` WHERE id = $ID";
   $run_query = mysqli_query($conn , $query);
   $result = mysqli_fetch_assoc($run_query);
   $img=$result['img'];
   
       unlink("images/$img");
       echo "amora";
       $query ="DELETE from projects WHERE id = $ID";
   
       $run_query = mysqli_query($conn , $query);
       header('location:index.php');
   
}


   








   /* $query ="DELETE from projects WHERE id = $ID";
   
    $run_query = mysqli_query($conn , $query);
    header('location:index.php');
    */
?>