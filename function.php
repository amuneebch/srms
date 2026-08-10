<?php
include ('connection_db.php');







function email_exist($conn,$email_by_user){
        
    $sql="SELECT * FROM student";
    $qry=mysqli_query($conn,$sql);
    while($result=mysqli_fetch_assoc($qry)){
             if($result['email']==$email_by_user){
                return false;
                }
    }
            return true;

}

function id_exist($conn,$id_by_user){
        
    $sql="SELECT * FROM student";
    $qry=mysqli_query($conn,$sql);
    while($result=mysqli_fetch_assoc($qry)){
             if($result['id']==$id_by_user){
                return false;
                }
    }
            return true;

}

function insert_db($conn,$query){
       if(mysqli_query($conn,$query)){
        return true;
       }else{
            return false;
       }

}
function perr($Error){
    echo $Error;
}




?>