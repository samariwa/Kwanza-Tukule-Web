<?php 
require('config.php');
$id = $_POST['id'];
$name = $_POST['name'];
$location = $_POST['location'];
$number = $_POST['number'];
$balance = $_POST['balance'];
mysqli_query($connection,"UPDATE `customers` INNER JOIN `orders` ON id = orders.Customer_id SET `Name` = '$name',`Location` = '$location',`Number` = '$number',`Balance` = '$balance' WHERE `id` = '$id'")or die($connection->error);
 ?>