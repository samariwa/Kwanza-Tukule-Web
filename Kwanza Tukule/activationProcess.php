<?php
require('config.php');
require('login.php');
require('register.php');
$activation = $_SESSION['activation'];
 header("Location:activation.php"); 
exit();
?>