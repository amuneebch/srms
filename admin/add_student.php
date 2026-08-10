<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){

include ('../connection_db.php');
include ('../function.php');

$name=$_POST['name'];
$email=$_POST['email'];
$id=$_POST['id'];
$password=$_POST['password'];
$semester=$_POST['semester'];
$image = $_FILES['image'] ?? null;
$Error="";

if(email_exist($conn,$email)){

    if(id_exist($conn,$id)){
            $qry='INSERT INTO student(name,email,id,password,semester,image) VALUES("$name","$email","$id","$password","$semester","$_FILES[image][name]"); ';
            if(insert_db($conn,$qry)){
                echo "User Inserted Successfully !";
            }else{
                $Error.= "Error in Inserting Student in DB <br>";
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

    <label for="email">Name :</label><br>
    <input type="text" placeholder="John doe" minlength="3" name="name">
    <br><br>
     <label for="email">Email :</label><br>
    <input type="email" placeholder="abc@nsu.edu.pk" minlength="3" name="email">
    <br><br>
     <label for="id">Student ID :</label><br>
    <input type="text" placeholder="NSU-1234" pattern="NSU-[0-9]{4}" name="id">
    <br><br>
     <label for="password">password :</label><br>
    <input type="password" placeholder="******" minlength="6" name="password">
    <br><br>
     
     <label for="semester">Semester :</label><br>
    <select name="semester">
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