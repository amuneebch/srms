

<?php
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true){
    header("location:../login.php");
    exit();
}



if ($_SERVER['REQUEST_METHOD']=='POST'){

include ('../connection_db.php');
include ('../function.php');

$name=$_POST['name'];
$email=$_POST['email'];
$id=$_POST['id'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$image = $_FILES['image']['name'] ?? null;
$Error="";

if(email_exist_ins($conn,$email)){

    if(id_exist_ins($conn,$id)){
            $qry="INSERT INTO instructor(name,email,ins_id,password,phone,img) VALUES('$name','$email','$id','$password','$phone','$image'); ";
            if(insert_db_ins($conn,$qry)){
                echo "Instructor Inserted Successfully !";
            }else{
                $Error.= "SQL Error: " . mysqli_error($conn) . "<br>";
                $Error.= "Error in Inserting instructor in DB <br>";
                perr($Error);
            }

        }else{
            
            $Error.= "Id Already Exist ! <br>";
            perr($Error);
        }

}else{
     
        $Error.= "Email Already Exist ! <br>";
        perr($Error);
}


}
?>   
   
   
   
   
   <link rel="stylesheet" href="style.css">


<form method="post" enctype="multipart/form-data">

    <label for="email">Instructor Name :</label><br>
    <input type="text" placeholder="John doe" minlength="3" name="name">
    <br><br>
     <label for="email"> Instructor Email :</label><br>
    <input type="email" placeholder="abc@nsu.edu.pk" minlength="3" name="email">
    <br><br>
     <label for="id">Instructor ID :</label><br>
    <input type="text" placeholder="NSU-I-1234" pattern="NSU-I-[0-9]{4}" name="id">
    <br><br>
     <label for="password">password :</label><br>
    <input type="password" placeholder="******" minlength="6" name="password">
    <br><br>
     
     <label for="phone">phone :</label><br>
    <input type="text" placeholder="0300*******" pattren="03[0-9]{9}" name="phone">
    <br><br>

     <label for="image">image :</label><br>
     <input type="file" name="image" accept="images/*">
    <br><br>

        <input type="submit">


</form>