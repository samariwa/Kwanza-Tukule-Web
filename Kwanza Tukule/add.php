<?php
require('config.php');
$where =$_POST['where'];
session_start();
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
                 $raw_name = $_POST['name'];
                 $raw_name2 = str_replace('  ',' ',$raw_name);
                 $raw_name3 = ltrim($raw_name2,' ');
                 $name = rtrim($raw_name3,' ');
                 $category = $_POST['category'];
                 $supplier = $_POST['supplier'];
                 $received = $_POST['received'];
                 $expiry = $_POST['expiry'];
                 $bp = $_POST['bp'];
                 $sp = $_POST['sp'];
                 $qty = $_POST['qty'];
                 $restock = $_POST['restock'];
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
                  mysqli_query($connection,"INSERT INTO `stock` (`Category_id`,`Supplier_id`,`Name`,`Restock_Level`,`Buying_price`,`Price`,`Quantity`) VALUES ('$category','$supplier','$name','$restock','$bp','$sp','$qty');") or die(mysqli_error($connection));
                  $result3 = mysqli_query($connection,"SELECT * FROM stock WHERE Name = '".$name."';")or die($connection->error);
                 $row3 = mysqli_fetch_array($result3);
                 $Stock_id = $row3['id'];
                  mysqli_query($connection,"INSERT INTO `stock_flow` (`Stock_id`,`Expiry_date`,`Buying_price`,`Selling_Price`,`Received_date`,`Purchased`) VALUES ('$Stock_id','$expiry','$bp','$sp','$received','$qty')") or die(mysqli_error($connection));
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
else if ($where == 'vehicles') {
                 $type = $_POST['type'];
                 $driver = $_POST['driver'];
                 $reg = $_POST['reg'];
                 $route = $_POST['route'];
                 $row0 = mysqli_query($connection,"SELECT `id` FROM users WHERE firstname = '".$driver."'")or die($connection->error);
                 $result0 = mysqli_fetch_array($row0);
                 $id = $result0['id'];
                 $row = mysqli_query($connection,"SELECT * FROM vehicles WHERE Reg_Number = '".$reg."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   echo "exists";
                 }
                 else{
                   echo "success";
                  mysqli_query($connection,"INSERT INTO `vehicles` (`Driver_id`,`Type`,`Reg_Number`,`Route`) VALUES ('$id','$type','$reg','$route')") or die(mysqli_error($connection));
                 }
}
else if ($where == 'deliverer') {
                 $fname = $_POST['fname'];
                 $lname = $_POST['lname'];
                 $contact = $_POST['contact'];
                 $staffId = $_POST['staffId'];
                 $nationalId = $_POST['nationalId'];
                 $yob = $_POST['yob'];
                 $gender = $_POST['gender'];
                 $salary = $_POST['salary'];
                 $role = '5';
                 $row = mysqli_query($connection,"SELECT * FROM users WHERE nationalID = '".$nationalId."' or staffID = '".$staffId."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   echo "exists";
                 }
                 else{
                  echo "success";
                  mysqli_query($connection,"INSERT INTO `users` (`firstname`,`lastname`,`number`,`Job_Id`,`staffID`,`nationalID`,`yob`,`gender`,`salary`) VALUES ('$fname','$lname','$contact','$role','$staffId','$nationalId','$yob','$gender','$salary')") or die(mysqli_error($connection));
                 }
}
else if ($where == 'cook') {
                 $fname = $_POST['fname'];
                 $lname = $_POST['lname'];
                 $contact = $_POST['contact'];
                 $staffId = $_POST['staffId'];
                 $nationalId = $_POST['nationalId'];
                 $yob = $_POST['yob'];
                 $gender = $_POST['gender'];
                 $salary = $_POST['salary'];
                 $role = '6';
                 $row = mysqli_query($connection,"SELECT * FROM users WHERE nationalID = '".$nationalId."' or staffID = '".$staffId."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   echo "exists";
                 }
                 else{
                  echo "success";
                  mysqli_query($connection,"INSERT INTO `users` (`firstname`,`lastname`,`number`,`Job_Id`,`staffID`,`nationalID`,`yob`,`gender`,`salary`) VALUES ('$fname','$lname','$contact','$role','$staffId','$nationalId','$yob','$gender','$salary')") or die(mysqli_error($connection));
                 }
}
else if ($where == 'office') {
                 $fname = $_POST['fname'];
                 $lname = $_POST['lname'];
                 $contact = $_POST['contact'];
                 $staffId = $_POST['staffId'];
                 $nationalId = $_POST['nationalId'];
                 $yob = $_POST['yob'];
                 $gender = $_POST['gender'];
                 $salary = $_POST['salary'];
                 $roleNo = $_POST['role'];
                 $row = mysqli_query($connection,"SELECT * FROM users WHERE nationalID = '".$nationalId."' or staffID = '".$staffId."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   echo "exists";
                 }
                 else{
                  echo "success";
                  $row0 = mysqli_query($connection,"SELECT `id` FROM jobs WHERE Name = '".$roleNo."'")or die($connection->error);
                 $result0 = mysqli_fetch_array($row0);
                 $id = $result0['id'];
                  mysqli_query($connection,"INSERT INTO `users` (`firstname`,`lastname`,`number`,`Job_Id`,`staffID`,`nationalID`,`yob`,`gender`,`salary`) VALUES ('$fname','$lname','$contact','$id','$staffId','$nationalId','$yob','$gender','$salary')") or die(mysqli_error($connection));
                 }
}
else if ($where == 'note') {
                 $title = $_POST['title'];
                 $message = $_POST['message'];
                 $access = $_POST['access'];
                 $user = $_SESSION['user'];
                  echo "success";
                 $row = mysqli_query($connection,"SELECT id FROM users WHERE username = '".$user."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 $id = $result['id'];
                  mysqli_query($connection,"INSERT INTO `notes` (`User_id`,`Title`,`Note`,`Public`) VALUES ('$id','$title','$message','$access')") or die(mysqli_error($connection));
}
elseif ($where == 'purchase') {
  $id = $_POST['id'];
    $received = $_POST['received'];
     $qty = $_POST['qty'];
     $bp = $_POST['bp'];
     $sp = $_POST['sp'];
     $expiry = $_POST['expiry'];
     mysqli_query($connection,"INSERT INTO `stock_flow` (`Stock_id`,`Buying_price`,`Selling_Price`,`Received_date`,`Purchased`,`Expiry_date`) VALUES ('$id','$bp','$sp','$received','$qty','$expiry')") or die(mysqli_error($connection));
mysqli_query($connection,"UPDATE `stock` SET `Quantity` = Quantity + '".$qty."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'calendar') {
  if(isset($_POST["title"]))
{
  $title = $_POST["title"];
  $start_event = $_POST["start"];
  $end_event = $_POST["end"];
  $user = $_SESSION['user'];
   $userId = mysqli_query($connection,"SELECT id  FROM `users` WHERE username = '$user'")or die($connection->error);
   $value = mysqli_fetch_array($userId);
   $userID = $value['id'];
  mysqli_query($connection,"INSERT INTO event (title,User_id, start_event, end_event) VALUES ('$title','$userID', '$start_event', '$end_event')") or die(mysqli_error($connection));
}
}
elseif ($where == 'expense') {
  $name = $_POST['heading'];
    $party = $_POST['party'];
     $total = $_POST['total'];
     $paid = $_POST['paid'];
     $due = $_POST['due'];
     $date = $_POST['date'];
     $expenseId = mysqli_query($connection,"SELECT id  FROM `expenses` WHERE Name = '$name'")or die($connection->error);
   $value = mysqli_fetch_array($expenseId);
   $id = $value['id'];
   echo "success";
     mysqli_query($connection,"INSERT INTO `expense_details` (`Expense_id`,`Party`,`Total_amount`,`Paid_amount`,`Due_amount`,`Payment_date`) VALUES ('$id','$party','$total','$paid','$due','$date')") or die(mysqli_error($connection));
}
elseif ($where == 'expenseHeading') {
  $name = $_POST['heading'];
  echo "success";
     mysqli_query($connection,"INSERT INTO `expenses` (`Name`) VALUES ('$name')") or die(mysqli_error($connection));
}
elseif ($where=='order') {
  $balance = "";
  $category="";
  $price = $_POST['price'];
  $discount = $_POST['discount'];
  $quantity = $_POST['quantity'];
  $customer = $_POST['customer'];
  $stockIDx = $_POST['stockid'];
  $lateOrder = $_POST['lateOrder'];
  $cost = $price - $discount;
  $resx = mysqli_query($connection, "SELECT Category_id,Quantity FROM `stock` WHERE id='$stockIDx'");
  while ($rowx = mysqli_fetch_array($resx)) {
    $category = $rowx['Category_id'];
    $qty = $rowx['Quantity'];
  }
  if($qty < $quantity){
     echo 'unavailable';
     exit();
  }
  $result  = mysqli_query($connection, "SELECT Balance FROM `orders` WHERE Customer_id='$customer' ORDER BY id DESC");
  $count = 0;
  while($row = mysqli_fetch_array($result)) {
    if ($count==0) {
      $balance = $row['Balance'];
    }
      $count++;
  }
  $newDebt = $balance;
  $newBalance = (int)$newDebt - ((int)$cost*(int)$quantity);
  $sql = "INSERT INTO `orders`(`Customer_id`,`Category_id`,`Quantity`,`Debt`,`Discount`,`Balance`,`Stock_id`,`Late_Order`) VALUES('$customer','$category','$quantity','$newDebt','$discount','$newBalance','$stockIDx','$lateOrder')";
  $product = mysqli_query($connection,"SELECT Name,Category_Name  FROM `stock` inner join category on stock.Category_id = category.id WHERE stock.id = '".$stockIDx."'")or die($connection->error);
   $Product = mysqli_fetch_array($product);
  $Category_Name = $Product['Category_Name'];
  $Stock_Name = $Product['Name'];
  if( $Category_Name != 'Cereals'){
  mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity - '".$quantity."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
  }
  if( $Category_Name == 'Cereals'){
  $cereal_qty = '';
  $wairimu_qty = '';
  $maize_qty = '';
  $githeri_qty = '';
  if( strpos($Stock_Name, 'Yellow Beans') !== false ){
  $yellow_qty = $quantity * 0.9682;
  $cereal_qty = round($yellow_qty, 2);
  }
  if( strpos($Stock_Name, 'Nyayo Beans') !== false ){
  $nyayo_qty = $quantity * 0.76;
  $cereal_qty = round($nyayo_qty, 2);
  }
  if( strpos($Stock_Name, 'Njahe') !== false ){
  $njahe_qty = $quantity * 0.75;
  $cereal_qty = round($njahe_qty, 2);
  }
  if( strpos($Stock_Name, 'Mbaazi') !== false ){
  $mbaazi_qty = $quantity * 0.92;
  $cereal_qty = round($mbaazi_qty, 2);
  }
  if( strpos($Stock_Name, 'Githeri') !== false ){
  $wairimu_qty = $quantity * 0.55;
  $maize_qty = $quantity * 0.3;
  $wairimu_maize_qty = $wairimu_qty + $maize_qty;
  $githeri_qty = round($wairimu_maize_qty, 2);
  }
  if( strpos($Stock_Name, 'Dengu') !== false ){
   $dengu_qty = $quantity * 0.6667;
   $cereal_qty = round($dengu_qty, 2);
  }
  if( strpos($Stock_Name, 'Minji') !== false ){
  $minji_qty = $quantity * 0.8155;
  $cereal_qty = round($minji_qty, 2);
  }
  $cereals_check = mysqli_query($connection,"SELECT *  FROM `cooked_cereals` WHERE Stock_id = '".$stockIDx."' AND DATE(Delivery_date) = CURRENT_DATE() ")or die($connection->error);
  $check_result = mysqli_fetch_array($cereals_check);
  if ( $check_result != TRUE) {
      mysqli_query($connection,"INSERT INTO `cooked_cereals` (`Stock_id`,`Quantity_Ordered`,`Quantity_Prepared`,`Returned`,`Quantity_Difference`,`Delivery_date`) VALUES ('$stockIDx','$quantity','$quantity','0','0','$lateOrder')") or die(mysqli_error($connection));
   }
   else{
       mysqli_query($connection,"UPDATE `cooked_cereals`  SET `Quantity_Ordered` = Quantity_Ordered + '".$quantity."',`Quantity_Prepared` = Quantity_Prepared + '".$quantity."' WHERE `Stock_id` = '".$stockIDx."' AND `Delivery_date` = '$lateOrder'") or die(mysqli_error($connection));
   }
   if ($cereal_qty != '') {
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity - '".$cereal_qty."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }
   if ($githeri_qty != '' ) {
    mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity - '".$githeri_qty."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
    mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity - '".$wairimu_qty."' WHERE `Name` LIKE '%Wairimu Beans%'")or die($connection->error);
    mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity - '".$maize_qty."' WHERE `Name` LIKE '%Maize%'")or die($connection->error);
   }
  }
  $Category = mysqli_query($connection,"SELECT Quantity,Restock_Level  FROM `stock` inner join category on stock.Category_id = category.id WHERE stock.id = '".$stockIDx."'")or die($connection->error);
   $Name = mysqli_fetch_array($Category);
   $Restock_Level = $Name['Restock_Level'];
   if($Category_Name == 'Maize Flour' && strpos($Stock_Name, 'Pieces') !== false || $Category_Name == 'All Purpose Flour' && strpos($Stock_Name, 'Pieces') !== false){
   $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Bundle_Name = str_replace("Pieces","Bundles",$Stock_Name);
     $Bundle_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Bundle_Name."'")or die($connection->error);
   $bundle_qty = mysqli_fetch_array($Bundle_Qty);
   $bundleQuantity = $bundle_qty['Quantity'];
   if ($bundleQuantity <= 5) {
     $newBundleQty = 0;
     $newPiecesIncreament = $bundleQuantity * 12;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPiecesIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBundleQty = $bundleQuantity - 5;
      $newPiecesIncreament = 60;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBundleQty' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '60' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }
   }
   }
    if($Category_Name == 'Sugar' && strpos($Stock_Name, 'Packets') !== false){
       $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Bag_Name = str_replace("Packets","Bag",$Stock_Name);
     $Bag_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Bag_Name."'")or die($connection->error);
   $bag_qty = mysqli_fetch_array($Bag_Qty);
   $bagQuantity = $bag_qty['Quantity'];
   if ($bagQuantity <= 5) {
     $newBagQty = 0;
     $newPacketsIncreament = $bagQuantity * 12;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bag_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPacketsIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBagQty = $bagQuantity - 5;
      $newPacketsIncreament = 60;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBagQty' WHERE `Name` = '".$Bag_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '60' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }
   }
    }
   if ($newBalance == 0 ) {
     mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'clean' WHERE `id` = '".$customer."'")or die($connection->error);
   }
   else if ($newBalance < -100) {
     mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'no delivery' WHERE `id` = '".$customer."'")or die($connection->error);
   }
   else if ($newBalance >= -100 && $newBalance < 0) {
     mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'fined' WHERE `id` = '".$customer."'")or die($connection->error);
   }
   else if ($newBalance > 0) {
     mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'credit' WHERE `id` = '".$customer."'")or die($connection->error);
   }
  if (mysqli_query($connection, $sql) === TRUE) {
    echo 'success';
  }
  
}
 ?>
