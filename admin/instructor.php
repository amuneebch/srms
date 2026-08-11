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
    
    
 
<?php
include ('../connection_db.php');
include ('../function.php');

?>

 <?php include('include/header.php'); ?>

  
   <div class="app-layout">;

        <?php include('include/sidebar.php'); ?>
        <div class="main-content">
       


<div class="table-container">
    <!-- Header Block -->
    <div class="table-header">
        <div class="table-title">
            <h3>Instructors Directory</h3>
            <p>Manage and view all registered university faculty members.</p>
        </div>
    </div>

     <?PHP   $instructors= get_instructor($conn); ?>
    
    
    
     <div class="responsive-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Instructor</th>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($instructors as $rows): ?>
                <tr>
                    <td>
                        <div class="user-info">
                            <!-- Fallback placeholder image used if no img column entry exists -->
                            <img class="user-avatar" src="<?PHP$rows[img]?>" alt="Profile">
                            <span class="user-name"><?php echo $rows['name'] ?></span>
                        </div>
                    </td>
                    <td><?php echo $rows['ins_id'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td>0<?php echo  $rows['phone'] ?></td>
                    <td> INSTRUCTOR </td>
                    <td><span class="badge "><?php echo $rows['status'] ?></span></td>
                    <td>
                        <button class="btn-action">Edit</button>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

        <a href="add_instructor.php" class="btn-action btn">Add More Instructor</a>



 
           
            <?php include('include/footer.php'); ?>
        </div>

    </div>