<?php 
require('config.php');
$id = $_POST['id'];
$category = $_POST['category'];
$name = $_POST['name'];
$bp = $_POST['bp'];
$sp = $_POST['sp'];
mysqli_query($connection,"UPDATE `stock` INNER JOIN `category` ON stock.Category_id = category.id SET `Name` = '".$name."',`Buying_price` = '".$bp."',category.Category_Name = '".$category."',`Price` = '".$bp."' WHERE `id` = '".$id."'")or die($connection->error);
 ?>