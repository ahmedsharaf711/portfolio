<?php  

    include('inc/header.php') ; 

    if(isset($_SESSION['wrong']))
    {
    foreach($_SESSION['wrong'] as $error)
    { 
        echo "<h6> $error </h6>";
    } 
    }

?>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>

<div class="login-form">
    <form action="handle-login.php" method="post">
        <h2 class="text-center">Log in</h2>   
        <br>    
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" >
        </div>
        <br>
        <div class="form-group">
            <input name="password" type="password" class="form-control" placeholder="Password" >
        </div>
        <br>
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
               
    </form>
</div>

<?php include('inc/footer.php') ; ?>
