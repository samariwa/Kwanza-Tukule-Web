<?php 
require('config.php');
$id = $_POST['id'];
$qty = $_POST['qty'];
$mpesa = $_POST['mpesa'];
$cash = $_POST['cash'];
$date = $_POST['date'];
$banked = $_POST['banked'];
$slip = $_POST['slip'];
$banker = $_POST['banker'];
mysqli_query($connection,"UPDATE `orders`  SET `Quantity` = '$qty',`MPesa` = '$mpesa',`Cash` = '$cash',`Late_Order` = '$date',`Banked` = '$banked',`Slip_Number` = '$slip',`Banked_By` = '$banker' WHERE `id` = '$id'")or die($connection->error);
 ?>