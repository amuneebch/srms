<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    include ('connection_db.php');
include ('function.php');

$email=$_POST['email'];
$password=$_POST['password'];
    if (check_admin($conn,$email,$password)){

        echo "You login As admin Successfully";
        header("location:admin/index.php");
        exit();
        
    }else{
        echo "enter Correct Login Creditionals";

    }

}
   
   
 ?>
<link rel="stylesheet" href="admin/style.css">


<form method="post" >
        <h3>Login AS Admin</h3>
    
     <label for="email">Email :</label><br>
    <input type="email" placeholder="abc@nsu.edu.pk" minlength="3" name="email">
    <br><br>
    
     <label for="password">password :</label><br>
    <input type="password" placeholder="******" minlength="6" name="password">
    <br><br>
    

        <input type="submit">


</form>