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
            <h3>Students Directory </h3>
            <p>Manage and view all registered university Students members.</p>
        </div>
    </div>

     <?PHP   $students= get_student($conn); ?>
    
    
    
     <div class="responsive-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Instructor</th>
                    <th>ID</th>
                    <th>Email</th>
                    <th>semester</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    <?php foreach($students as $rows): ?>
                <tr>
                    <td>
                        <div class="user-info">
                            <!-- Fallback placeholder image used if no img column entry exists -->
                            <img class="user-avatar" src="<?PHP$rows[img]?>" alt="Profile">
                            <span class="user-name"><?php echo $rows['name'] ?></span>
                        </div>
                    </td>
                    <td><?php echo $rows['stu_id'] ?></td>
                    <td><?php echo $rows['email'] ?></td>
                    <td>0<?php echo  $rows['semester'] ?></td>
                    <td><span class="badge "><?php echo $rows['role'] ?></span></td>
                    <td>
                        <a href="edit_student.php?id=<?php echo $rows['stu_id'] ?>" class="btn-action">Edit</a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>

        <a href="add_instructor.php" class="btn-action btn">Add More Student</a>



 
           
            <?php include('include/footer.php'); ?>
        </div>

    </div>