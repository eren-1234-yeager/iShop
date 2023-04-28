<?php
include "_db.php";
if (!defined('const')) {
  header("Location: /ishop");
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
  session_start();
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  
  $sql="SELECT * FROM `users` WHERE `user_name`='$username' and `user_email`='$email'";
  $result=mysqli_query($conn,$sql);

  if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);

    $verify=password_verify($password,$row['user_password']);
    
    if ($verify) {
      // echo "1";
      $_SESSION['username']=$username;
      $_SESSION['loggedin']=true;
      setcookie('fav',$row['user_fav'],time()+60*60*24,'/');
      setcookie('message',true,time()+1,'/');
      header("Location: /ishop?t=success&m=Login Successfully!");
    }else{
      // echo '0 from password';
      setcookie('message',true,time()+1,'/');
      header("Location: /ishop?t=danger&m=Invalid Credentials!");
    }
  }else{
    // echo '0';
    setcookie('message',true,time()+1,'/');
    header("Location: /ishop?t=danger&m=Invalid Credentials!");
  }
}
