<?php 
require('config.php');
$id = $_POST['id'];
$name = $_POST['name'];
$location = $_POST['location'];
$number = $_POST['number'];
$deliverer = $_POST['deliverer'];
$note = $_POST['note'];
mysqli_query($connection,"UPDATE `customers` SET `Name` = '$name',`Location` = '$location',`Number` = '$number',`Deliverer` = '$deliverer',`Note` = '$note' WHERE `id` = '$id'")or die($connection->error);
 ?>