<?php
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true){
    header("location:../login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Admin | Student Mangenment System</title>
</head>
<body>
    
    
 

    <?php include('include/header.php'); ?>

  
    <div class="app-layout">

        <?php include('include/sidebar.php'); ?>

        <div class="main-content">
            <?php include('include/dashboard.php'); ?>
            <?php include('include/footer.php'); ?>
        </div>

    </div>

</body>
</html>