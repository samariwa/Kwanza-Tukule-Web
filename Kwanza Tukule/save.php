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
   $result1 = mysqli_query($connection,"SELECT id,MAX(Created_at) FROM stock_flow where Stock_id='$id';")or die($connection->error);
        $row = mysqli_fetch_array($result1);
        $flowId = $row['id'];
mysqli_query($connection,"UPDATE `stock` INNER JOIN `category` ON stock.Category_id = category.id INNER JOIN `stock_flow` ON stock.id = stock_flow.Stock_id SET `Name` = '".$name."',`stock_flow.Buying_price` = '".$bp."',category.Category_Name = '".$category."',`stock_flow.Selling_price` = '".$sp."' WHERE  stock_flow.id = '".$flowId."'")or die($connection->error);
}elseif ($where == 'blacklist') {
	$id = $_POST['id'];
    $location = $_POST['location'];
    $number = $_POST['number'];
    $balance = $_POST['balance'];
mysqli_query($connection,"UPDATE `customers` INNER JOIN `orders` ON customers.id = orders.Customer_id SET `Location` = '".$location."',`Number` = '".$number."',`Balance` = '".$balance."' WHERE customers.id = '".$id."'")or die($connection->error);
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
}elseif ($where == 'suppliers') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
mysqli_query($connection,"UPDATE `suppliers` SET `Supplier_contact` = '".$contact."' WHERE `id` = '".$id."'")or die($connection->error);
}elseif ($where == 'vehicles') {
  $id = $_POST['id'];
    $route = $_POST['route'];
mysqli_query($connection,"UPDATE `vehicles` SET `Route` = '".$route."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'deliverer') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
    $staffId = $_POST['staffId'];
    $nationalId = $_POST['nationalId'];
    $salary = $_POST['salary'];
    $figure = str_replace("Ksh. ","",$salary);
mysqli_query($connection,"UPDATE `users` SET `number` = '".$contact."',`staffID` = '".$staffId."',`nationalID` = '".$nationalId."',`salary` = '".$figure."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'cook') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
    $staffId = $_POST['staffId'];
    $nationalId = $_POST['nationalId'];
    $salary = $_POST['salary'];
    $figure = str_replace("Ksh. ","",$salary);
mysqli_query($connection,"UPDATE `users` SET `number` = '".$contact."',`staffID` = '".$staffId."',`nationalID` = '".$nationalId."',`salary` = '".$figure."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'office') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
    $staffId = $_POST['staffId'];
    $nationalId = $_POST['nationalId'];
    $salary = $_POST['salary'];
    $role = $_POST['role'];
    $result1 = mysqli_query($connection,"SELECT id FROM jobs where Name like '%$role%';")or die($connection->error);
    $row = mysqli_fetch_array($result1);
    $position = $row['id'];
    $figure = str_replace("Ksh. ","",$salary);
mysqli_query($connection,"UPDATE `users` SET `number` = '".$contact."',`staffID` = '".$staffId."',`nationalID` = '".$nationalId."',`salary` = '".$figure."' ,`Job_id` = '".$position."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'publicNote') {
  $id = $_POST['id'];
    $title = $_POST['title'];
     $body = $_POST['body'];
mysqli_query($connection,"UPDATE `notes` SET `Title` = '".$title."',`Note` = '".$body."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'privateNote') {
  $id = $_POST['id'];
    $title = $_POST['title'];
     $body = $_POST['body'];
mysqli_query($connection,"UPDATE `notes` SET `Title` = '".$title."',`Note` = '".$body."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'purchase') {
  $id = $_POST['id'];
    $received = $_POST['received'];
     $qty = $_POST['qty'];
     $bp = $_POST['bp'];
     $sp = $_POST['sp'];
     $expiry = $_POST['expiry'];
mysqli_query($connection,"UPDATE `notes` SET `Title` = '".$title."',`Note` = '".$body."' WHERE `id` = '".$id."'")or die($connection->error);
}
 ?>