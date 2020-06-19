<?php 
require('config.php');
$id = $_POST['id'];
$name = $_POST['name'];
mysqli_query($connection,"UPDATE `category` SET `Category_Name` = '$name' WHERE `id` = '$id'")or die($connection->error);
 ?>