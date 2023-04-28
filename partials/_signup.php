<?php
if (!defined('const')) {
  header("Location: /ishop");
}
?>
<?php
include "_db.php";
session_start();
    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $email=$_POST['email'];
        $name=$_POST['username'];
        $password=$_POST['password'];
        $i=implode(",",$_POST['interest']);
        $name=mysqli_real_escape_string($conn,$name);
        $password=mysqli_real_escape_string($conn,$password);

        // To check whether uuser or email already exists
        $sql="SELECT * FROM `users` WHERE `user_email`='$email' or `user_name`='$name'";
        $result=mysqli_query($conn,$sql);

        if  (mysqli_num_rows($result)>0) {
            setcookie('message',true,time()+1,'/');
            header("Location: /ishop?t=danger&m=Username or Email already exists!");
            exit();
        }
        else{
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $_SESSION['username']=$name;
            $sql="INSERT INTO `users` (`user_email`, `user_name`, `user_password`, `user_fav`, `user_seller`, `dt`) VALUES ('$email', '$name', '$hash', '$i', 'false', current_timestamp());";
            $result=mysqli_query($conn,$sql);
            setcookie('fav',$i,time()+60*60*24,'/');
            setcookie('message',true,time()+1,'/');
            header("Location: /ishop?t=success&m=Signup Successfully!");
        }       
    }
?>