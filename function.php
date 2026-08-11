<?php
include ('connection_db.php');


function perr($Error){
    echo $Error;
}






// FOr ADDING NEW STUDENT

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
             if($result['stu_id']==$id_by_user){
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





// FOR ADDING NEW Instructor


function email_exist_ins($conn,$email_instructor){
        
    $sql="SELECT * FROM instructor";
    $qry=mysqli_query($conn,$sql);
    while($result=mysqli_fetch_assoc($qry)){
             if($result['email']==$email_instructor){
                return false;
                }
    }
            return true;

}

function id_exist_ins($conn,$id_by_user){
        
    $sql="SELECT * FROM instructor";
    $qry=mysqli_query($conn,$sql);
    while($result=mysqli_fetch_assoc($qry)){
             if($result['ins_id']==$id_by_user){
                return false;
                }
    }
            return true;

}

function insert_db_ins($conn,$query){
       if(mysqli_query($conn,$query)){
        return true;
       }else{
            return false;
       }

}

// FOR ADDING NEW Courses

function get_instructor($conn){
        
    $sql="SELECT * FROM instructor";
    $qry=mysqli_query($conn,$sql);
    $instructors = array(); 
    while($result=mysqli_fetch_assoc($qry)){

            $instructors[] = $result; 
    }
            return $instructors;

}

// FOR showing student

function get_student($conn){
        
    $sql="SELECT * FROM student";
    $qry=mysqli_query($conn,$sql);
    $instructors = array(); 
    while($result=mysqli_fetch_assoc($qry)){

            $student[] = $result; 
    }
            return $student;

}


function check_admin($conn, $email,$password){
        $sql="SELECT * FROM admin WHERE email='$email';";
    $qry=mysqli_query($conn,$sql);
    while($result=mysqli_fetch_assoc($qry)){
             if($result['password']==$password){
                SESSION_Start();
                $_SESSION['admin_id'] = $result['id'];
                $_SESSION['email'] = $result['email'];
                $_SESSION['admin_logged_in'] = true;
                return true;
                }
    }
            return false;
}




?>