<?php 


session_start();
session_destroy();
echo "logout successfully";
header("location:login.php");
        exit();


?>