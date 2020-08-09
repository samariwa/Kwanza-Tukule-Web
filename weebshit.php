<?php
$id = $_POST['id'];
$Balance = $_POST['balance'];
$result1 = mysqli_query($connection,"SELECT Name,Balance,orders.Created_at as date,Customer_id FROM orders inner join customers on orders.Customer_id = customers.id where orders.id = '".$id."'")or die($connection->error);
  $row = mysqli_fetch_array($result1);
  $date = $row['date'];
  $name = $row['Name'];
  $customer = $row['Customer_id'];

   $row2 = mysqli_query($connection,"SELECT * FROM orders INNER JOIN customers ON orders.Customer_id = customers.id where customers.Name='".$name."' && orders.Fine<'0' && DATE(orders.Created_at) = '".$date."' ")or die($connection->error);
    $result2 = mysqli_fetch_array($row2);
    if ( $result2 == FALSE) {
  if ($Balance <= -500) {

    $Fine = -100;
    mysqli_query($connection,"UPDATE `orders`  SET `Fine` = '".$Fine."',`Balance` = Balance + ".$Fine." WHERE `id` = '".$id."'")or die($connection->error);
    mysqli_query($connection,"update orders set Debt= Debt+'".$Fine."', `Balance`= Balance+".$Fine." where Customer_id='".$customer."' and id >'".$id."' ;")or die($connection->error);
  }
  else if ($Balance > -500 && $Balance < 0){
    $Fine = 0.10 * $Balance;
mysqli_query($connection,"UPDATE `orders`  SET `Fine` = '".$Fine."',`Balance` = Balance + ".$Fine." WHERE `id` = '".$id."'")or die($connection->error);
mysqli_query($connection,"update orders set Debt= Debt+'".$Fine."', `Balance` = Balance +".$Fine." where Customer_id='".$customer."' and id >'".$id."' ;")or die($connection->error);

}
 else if ($Balance >= 0){
  echo "positive";
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
if ( $result2 == TRUE){
echo "exists";
}
 ?>
