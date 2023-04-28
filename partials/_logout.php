<?php

session_start();
session_unset();
session_destroy();
setcookie('message',true,time()+1,'/');
header("Location: /ishop?t=success&m=Logout Successfully!");

?>