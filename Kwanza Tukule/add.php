<?php 
require('config.php');
$where =$_POST['where'];
if($where == 'customer' )
{              
                 $name = $_POST['name'];
                 $location = $_POST['location'];
                 $number = $_POST['number'];
                 $deliverer = $_POST['deliverer'];
                 $row = mysqli_query($connection,"SELECT id,Name,Location,Number,Deliverer,Status,Note FROM customers WHERE Name = '".$name."' OR Number = '".$number."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                  echo "exists";
                 }
                 else{
                  echo "success";
                  mysqli_query($connection,"INSERT INTO `customers` (`Name`,`Location`,`Number`,`Deliverer`) VALUES ('$name','$location','$number','$deliverer')") or die(mysqli_error($connection));
                 }             
}
else if ($where == 'stock') {
                 $name = $_POST['name'];
                 $category = $_POST['category'];
                 $supplier = $_POST['supplier'];
                 $received = $_POST['received'];
                 $expiry = $_POST['expiry'];
                 $bp = $_POST['bp'];
                 $sp = $_POST['sp'];
                 $qty = $_POST['qty'];
                 $row = mysqli_query($connection,"SELECT `Name` FROM stock WHERE Name = '".$name."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   echo "exists";
                 }
                 else{
                  echo "success";
                  $result1 = mysqli_query($connection,"SELECT * FROM category WHERE Category_Name = '".$category."'")or die($connection->error);
                 $row1 = mysqli_fetch_array($result1);
                 $category = $row1['id'];
                 $result2 = mysqli_query($connection,"SELECT * FROM suppliers WHERE Name = '".$supplier."'")or die($connection->error);
                 $row2 = mysqli_fetch_array($result2);
                 $supplier = $row2['id'];
                  mysqli_query($connection,"INSERT INTO `stock` (`Category_id`,`Supplier_id`,`Name`,`Expiry_date`,`Buying_price`,`Price`,`Received_date`,`Quantity`) VALUES ('$category','$supplier','$name,'$expiry','$bp','$sp','$received','$qty')") or die(mysqli_error($connection));
                 }
               
}
else if ($where == 'categories') {
                 $category = $_POST['category'];
                 $row = mysqli_query($connection,"SELECT * FROM category WHERE Category_Name = '".$category."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   echo "exists";
                 }
                 else{
                  echo "success";
                  mysqli_query($connection,"INSERT INTO `category` (`Category_Name`) VALUES ('$category')") or die(mysqli_error($connection));
                 }
}
else if ($where == 'supplier') {
                 $name = $_POST['name'];
                 $contact = $_POST['contact'];
                 $row = mysqli_query($connection,"SELECT * FROM suppliers WHERE Name = '".$name."' OR Supplier_contact = '".$contact."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   echo "exists";
                 }
                 else{
                  echo "success";
                  mysqli_query($connection,"INSERT INTO `suppliers` (`Name`,`Supplier_contact`) VALUES ('$name','$contact')") or die(mysqli_error($connection));
                 }
}
 ?>
