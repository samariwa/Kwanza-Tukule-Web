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
$result2 = mysqli_query($connection,"select orders.Debt as Debt,orders.Fine as Fine,orders.Quantity as Qty,stock_flow.Selling_price as Price from stock INNER JOIN orders ON stock.id=orders.Stock_id INNER JOIN stock_flow on stock.id = stock_flow.Stock_id where orders.id='".$id."';")or die($connection->error);
   $row2 = mysqli_fetch_array($result2);
    $Price = $row2['Price'];
    $old_Qty =  $row2['Qty'];
    $Fine = $row2['Fine'];
    $Debt =  $row2['Debt'];
     $cost = $Price * $qty;
     $newBalance = $Debt-$cost+$mpesa+$cash+$Fine;
$result1 = mysqli_query($connection,"SELECT Customer_id,Quantity,Balance FROM orders where `id` = '".$id."'")or die($connection->error);
    $row = mysqli_fetch_array($result1);
    $Quantity = $row['Quantity'];
    $oldBalance = $row['Balance'];
    $customer = $row['Customer_id'];
      $Returned = $Quantity - $qty;
      mysqli_query($connection,"UPDATE `orders`  SET `Quantity` = '".$qty."',`Balance` = '".$newBalance."',`MPesa` = '".$mpesa."',`Cash` = '".$cash."',`Late_Order` = '".$date."',`Returned` = '".$Returned."',`Banked` = '".$banked."',`Slip_Number` = '".$slip."',`Banked_By` = '".$banker."' WHERE `id` = '".$id."'")or die($connection->error);
      mysqli_query($connection," update stock set Quantity= Quantity +".$Returned."  `id` = '".$id."'")or die($connection->error);
      $difference = $oldBalance - $newBalance;
      mysqli_query($connection," update orders set Debt= Debt-".$difference.", Balance= Balance-".$difference." where Customer_id='".$customer."' and id >'".$id."'")or die($connection->error);
     $result3 = mysqli_query($connection,"select orders.Balance as newBalance from orders INNER JOIN customers ON orders.Customer_id=customers.id  WHERE orders.id IN (SELECT MAX(orders.id)FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.id='".$customer."' ); ")or die($connection->error);
    $row3 = mysqli_fetch_array($result3);
    $lastBalance = $row3['newBalance'];
    if ($lastBalance == 0) {
      mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'clean' WHERE `id` = '".$customer."'")or die($connection->error);
    }else if ($lastBalance > 0) {
      mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'credit' WHERE `id` = '".$customer."'")or die($connection->error);
    }else if ($lastBalance < 0 && $newBalance >= -100) {
      mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'fined' WHERE `id` = '".$customer."'")or die($connection->error);
    }else if ($lastBalance < -100) {
     mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'no delivery' WHERE `id` = '".$customer."'")or die($connection->error);
 }
    }
elseif ($where == 'fine') {
  $id = $_POST['id'];
$result1 = mysqli_query($connection,"SELECT Name,Balance,orders.Created_at as date,Customer_id FROM orders inner join customers on orders.Customer_id = customers.id where orders.id = '".$id."'")or die($connection->error);
    $row = mysqli_fetch_array($result1);
    $Balance = $row['Balance'];
    $date = $row['date'];
    $name = $row['Name'];
    $customer = $row['Customer_id'];
     $row2 = mysqli_query($connection,"SELECT * FROM orders INNER JOIN customers ON orders.Customer_id = customers.id where customers.Name='".$name."' && orders.Fine<'0' && DATE(orders.Created_at) = '".$date."' ")or die($connection->error);
      $result2 = mysqli_fetch_array($row2);
      if ( $result2 != TRUE) {
    if ($Balance <= -500) {
      $Fine = -100;
      $new_balance = $Balance + $Fine;
      mysqli_query($connection,"UPDATE `orders`  SET `Fine` = '".$Fine."',`Balance` = '".$new_balance."' WHERE `id` = '".$id."'")or die($connection->error);
      mysqli_query($connection,"update orders set Debt= Debt+'".$Fine."', Balance= Balance+'".$Fine."' where Customer_id='".$customer."' and id >'".$id."' ;")or die($connection->error);
    }
    else if ($Balance > -500 && $Balance < 0){
      $Fine = 0.10 * $Balance;
      $new_balance = $Balance + $Fine;
mysqli_query($connection,"UPDATE `orders`  SET `Fine` = '".$Fine."',`Balance` = '".$new_balance."' WHERE `id` = '".$id."'")or die($connection->error);
mysqli_query($connection,"update orders set Debt= Debt+'".$Fine."', Balance= Balance+'".$Fine."' where Customer_id='".$customer."' and id >'".$id."' ;")or die($connection->error);
}
   else if ($Balance >= 0){
    echo "0";
   }
    $result2 = mysqli_query($connection,"select orders.Balance as newBalance from orders INNER JOIN customers ON orders.Customer_id=customers.id  WHERE orders.id IN (SELECT MAX(orders.id)FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.id='".$customer."' ); ")or die($connection->error);
    $row2 = mysqli_fetch_array($result2);
    $newBalance = $row2['newBalance'];
    if ($newBalance == 0) {
      mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'clean' WHERE `id` = '".$customer."'")or die($connection->error);
    }else if ($newBalance > 0) {
      mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'credit' WHERE `id` = '".$customer."'")or die($connection->error);
    }else if ($newBalance < 0 && $newBalance >= -100) {
      mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'fined' WHERE `id` = '".$customer."'")or die($connection->error);
    }else if ($newBalance < -100) {
     mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'no delivery' WHERE `id` = '".$customer."'")or die($connection->error);
 }
 }
 else{
  echo "exists";
 }
}
elseif ($where == 'suppliers') {
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

 ?>