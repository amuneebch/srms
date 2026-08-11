
<?php 
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true){
    header("location:../login.php");
    exit();
}

$id =$_GET['id'];


if ($_SERVER['REQUEST_METHOD']=='POST'){

    include ('../connection_db.php');
    include ('../function.php');

    $name=$_POST['name'];
    $password=$_POST['password'];
    $semester=$_POST['semester'];
    $image = $_FILES['image']['name'] ?? null;
    $Error="";
    
    

    $qry="UPDATE student set  name='$name',password='$password',semester='$semester',img='$image' WHERE stu_id= '$id';";
                if(insert_db($conn,$qry)){
                    echo "User Inserted Successfully !";
                    header("location:student.php");
                    exit();
                }else{
                    $Error.= "SQL Error: " . mysqli_error($conn) . "<br>";
                    $Error.= "Error in Inserting Student in DB <br>";
                    perr($Error);
                }


}
?>

<link rel="stylesheet" href="style.css">
<form method="post">
    <h3> Editing  Your Id :<?php echo $id?></h3>
    <br><br>

    <label for="email">Name :</label><br>
    <input type="text" placeholder="John doe" minlength="3" name="name" required>
    <br><br>
     <label for="password">password :</label><br>
    <input type="password" placeholder="******" minlength="6" name="password" required>
    <br><br>
     
     <label for="semester">Semester :</label><br>
    <select name="semester" required>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
    </select>
    <br><br>

     <label for="image">image :</label><br>
     <input type="file" name="image" accept="images/*">
    <br><br>

        <input type="submit">


</form>