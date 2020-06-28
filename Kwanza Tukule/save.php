<?php 
require('config.php');
$where =$_POST['where'];
if ($where == 'customer' ) {
	$id = $_POST['id'];
   $name = $_POST['name'];
   $location = $_POST['location'];
   $number = $_POST['number'];
   $deliverer = $_POST['deliverer'];
   $note = $_POST['note'];
	mysqli_query($connection,"UPDATE `customers` SET `Name` = '".$name."',`Location` = '".$location."',`Number` = '".$number."',`Deliverer` = '".$deliverer."',`Note` = '".$note."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif( $where == 'stock'){
   $id = $_POST['id'];
   $category = $_POST['category'];
   $name = $_POST['name'];
   $bp = $_POST['bp'];
   $sp = $_POST['sp'];
   $qty = $_POST['qty'];
mysqli_query($connection,"UPDATE `stock` INNER JOIN `category` ON stock.Category_id = category.id SET `Name` = '".$name."',`Buying_price` = '".$bp."',category.Category_Name = '".$category."',`Price` = '".$sp."',`Quantity` = '".$qty."' WHERE stock.id = '".$id."'")or die($connection->error);
}elseif ($where == 'blacklist') {
	$id = $_POST['id'];
    $location = $_POST['location'];
    $number = $_POST['number'];
    $balance = $_POST['balance'];
mysqli_query($connection,"UPDATE `customers` INNER JOIN `orders` ON id = orders.Customer_id SET `Location` = '".$location."',`Number` = '".$number."',`Balance` = '".$balance."' WHERE customers.id = '".$id."'")or die($connection->error);
}elseif ($where == 'categories') {
	$id = $_POST['id'];
    $name = $_POST['name'];
mysqli_query($connection,"UPDATE `category` SET `Category_Name` = '".$name."' WHERE `id` = '".$id."'")or die($connection->error);
}elseif ($where == 'orders') {
	$id = $_POST['id'];
$qty = $_POST['qty'];
$mpesa = $_POST['mpesa'];
$cash = $_POST['cash'];
$date = $_POST['date'];
$banked = $_POST['banked'];
$slip = $_POST['slip'];
$banker = $_POST['banker'];
mysqli_query($connection,"UPDATE `orders`  SET `Quantity` = '".$qty."',`MPesa` = '".$mpesa."',`Cash` = '".$cash."',`Late_Order` = '".$date."',`Banked` = '".$banked."',`Slip_Number` = '".$slip."',`Banked_By` = '".$banker."' WHERE `id` = '".$id."'")or die($connection->error);
}
 ?>