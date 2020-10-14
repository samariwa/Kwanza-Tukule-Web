<?php
require('config.php');
session_start();
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
   $restock = $_POST['restock_Level'];
   $result1 = mysqli_query($connection,"SELECT sfid as batchId FROM (SELECT s.id as sid, sf.id as sfid ,sf.Created_at,ROW_NUMBER() OVER (PARTITION BY s.id ORDER BY sf.Created_at DESC) as rn FROM stock s JOIN stock_flow sf ON s.id = sf.Stock_id JOIN category c ON s.Category_id=c.id ) q WHERE rn = 1 AND sid='$id'")or die($connection->error);
        $row = mysqli_fetch_array($result1);
        $flowId = $row['batchId'];
   $result2 = mysqli_query($connection,"SELECT id FROM category where Category_Name='$category';")or die($connection->error);
        $row2 = mysqli_fetch_array($result2);
        $categoryId = $row2['id'];
mysqli_query($connection,"UPDATE `stock` JOIN stock_flow ON stock.id = stock_flow.Stock_id SET `Name` = '".$name."',Category_id = '".$categoryId."',Restock_Level = '".$restock."',stock_flow.Buying_price= '".$bp."',stock_flow.Selling_price = '".$sp."',stock.Price = '".$sp."',stock.Buying_price = '".$bp."'  WHERE  stock_flow.id = '".$flowId."'")or die($connection->error);
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
$returned = $_POST['returned'];
$result2 = mysqli_query($connection,"select Stock_id, Debt, Fine,Quantity as Qty,Returned from  orders where id='".$id."';")or die($connection->error);
   $row2 = mysqli_fetch_array($result2);
    $old_Qty =  $row2['Qty'];
    $Fine = $row2['Fine'];
    $Debt =  $row2['Debt'];
    $stock_id = $row2['Stock_id'];
    $returns = $row2['Returned'];
    if ($returned > $old_Qty) {
      echo "excess returned";
      exit();
    }
    $result4 = mysqli_query($connection,"SELECT Price,quantity FROM (SELECT s.id as id,s.Quantity as quantity,sf.Selling_price as Price, sf.Created_at,ROW_NUMBER() OVER (PARTITION BY s.id ORDER BY sf.Created_at DESC) as rn FROM stock s JOIN stock_flow sf ON s.id = sf.Stock_id ) q WHERE rn = 1 AND id = '$stock_id'")or die($connection->error);
    $row4 = mysqli_fetch_array($result4);
    $Price = $row4['Price'];
    $storeQty = $row4['quantity'];
     $cost = $Price * $qty;
     $newBalance = $Debt-$cost+$mpesa+$cash+$Fine;
$result1 = mysqli_query($connection,"SELECT Customer_id,Quantity,Balance FROM orders where `id` = '".$id."'")or die($connection->error);
    $row = mysqli_fetch_array($result1);
    $Quantity = $row['Quantity'];
    $oldBalance = $row['Balance'];
    $customer = $row['Customer_id'];
    $Returned = '';
    if ($returns == $returned) {
      $Returned = $Quantity - $qty;
    }
    else{
      $Returned = $returned;
      $qty = $qty - $returned; 
    }
    $qty_bal = '';
    if ($Returned > 0) {
      $qty_bal = $Returned;
    }
    else{
      $qty_bal = '0';
    }
    $qtyAdded = $qty - $Quantity;
    if ($storeQty < $qtyAdded) {
      echo "Unavailable";
      exit();
    }
      mysqli_query($connection,"UPDATE `orders`  SET `Quantity` = '".$qty."',`Balance` = '".$newBalance."',`MPesa` = '".$mpesa."',`Cash` = '".$cash."',`Late_Order` = '".$date."',`Returned` = Returned +'".$qty_bal."',`Banked` = '".$banked."',`Slip_Number` = '".$slip."',`Banked_By` = '".$banker."' WHERE `id` = '".$id."'")or die($connection->error);
      mysqli_query($connection,"update stock set Quantity= Quantity +".$Returned." WHERE `id` = '".$stock_id."'")or die($connection->error);
      $product = mysqli_query($connection,"SELECT Name,Category_Name  FROM `stock` inner join category on stock.Category_id = category.id WHERE stock.id = '".$stock_id."'")or die($connection->error);
   $Product = mysqli_fetch_array($product);
  $Category_Name = $Product['Category_Name'];
  $Stock_Name = $Product['Name'];
  $Category = mysqli_query($connection,"SELECT Quantity,Restock_Level  FROM `stock` inner join category on stock.Category_id = category.id WHERE stock.id = '".$stock_id."'")or die($connection->error);
   $Name = mysqli_fetch_array($Category);
   $Restock_Level = $Name['Restock_Level'];
   if($Category_Name == 'Maize Flour' && strpos($Stock_Name, 'Pieces') !== false || $Category_Name == 'All Purpose Flour' && strpos($Stock_Name, 'Pieces') !== false){
   $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Bundle_Name = str_replace("Pieces","Bundles",$Stock_Name);
     $Bundle_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Bundle_Name."'")or die($connection->error);
   $bundle_qty = mysqli_fetch_array($Bundle_Qty);
   $bundleQuantity = $bundle_qty['Quantity'];
   if ($bundleQuantity <= 1) {
     $newBundleQty = 0;
     $newPiecesIncreament = $bundleQuantity * 12;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPiecesIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBundleQty = $bundleQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBundleQty' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '12' WHERE `id` = '".$stock_id."'")or die($connection->error);
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
   if ($bagQuantity = 1) {
     $newBagQty = 0;
     $newPacketsIncreament = 50;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bag_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPacketsIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBagQty = $bagQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBagQty' WHERE `Name` = '".$Bag_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '50' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
    if($Category_Name == 'Serviettes' && strpos($Stock_Name, 'Pieces') !== false){
       $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Bundle_Name = str_replace("Pieces","Bundles",$Stock_Name);
     $Bundle_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Bundle_Name."'")or die($connection->error);
   $bundle_qty = mysqli_fetch_array($Bundle_Qty);
   $bundleQuantity = $bag_qty['Quantity'];
   if ($bundleQuantity = 1) {
     $newBundleQty = 0;
     $newPiecesIncreament = 18;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPiecesIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBundleQty = $bundleQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBundleQty' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '18' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
    if($Category_Name == 'Baking Powder' && strpos($Stock_Name, 'Pieces') !== false){
       $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Dozen_Name = str_replace("Pieces","Dozen",$Stock_Name);
     $Dozen_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Dozen_Name."'")or die($connection->error);
   $dozen_qty = mysqli_fetch_array($Dozen_Qty);
   $dozenQuantity = $dozen_qty['Quantity'];
   if ($dozenQuantity = 1) {
     $newDozenQty = 0;
     $newPiecesIncreament = 12;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Dozen_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPiecesIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newDozenQty = $dozenQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newDozenQty' WHERE `Name` = '".$Dozen_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '12' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
    if($Category_Name == 'Baking Powder' && strpos($Stock_Name, 'Dozen') !== false){
       $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Box_Name = str_replace("Dozen","Boxes",$Stock_Name);
     $Box_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Box_Name."'")or die($connection->error);
   $box_qty = mysqli_fetch_array($Dozen_Qty);
   $boxQuantity = $box_qty['Quantity'];
   if ($dozenQuantity = 1) {
     $newBoxQty = 0;
     $newDozenIncreament = 6;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Box_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newDozenIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBoxQty = $boxQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBoxQty' WHERE `Name` = '".$Box_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '6' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
     /* $result5 = mysqli_query($connection,"SELECT Category_Name FROM category join stock on category.id = stock.Category_id where stock.id = '".$stock_id."'")or die($connection->error);
      $row5 = mysqli_fetch_array($result5);
      $Cat_Name = $row5['Category_Name'];
      if($Cat_Name == 'Cereals'){
       mysqli_query($connection,"update cooked_cereals set Returned= Returned +".$Returned." WHERE `Stock_id` = '".$stock_id."' AND date(Delivery_date) = CURRENT_DATE()")or die($connection->error);
      }*/
      $difference = $oldBalance - $newBalance;
		mysqli_query($connection,"UPDATE orders set Debt= Debt-'".$difference."', `Balance` = Balance -".$difference." WHERE Customer_id='".$customer."' and id >'".$id."' ;")or die($connection->error);
			//newBalance calculate credit score
     $result3 = mysqli_query($connection,"select orders.Balance as newBalance from orders INNER JOIN customers ON orders.Customer_id=customers.id  WHERE orders.id IN (SELECT MAX(orders.id)FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.id='".$customer."' )")or die($connection->error);
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
    elseif ($where == 'sales') {
  $id = $_POST['id'];
$qty = $_POST['qty'];
$mpesa = $_POST['mpesa'];
$cash = $_POST['cash'];
$discount = $_POST['discount'];
$banked = $_POST['banked'];
$slip = $_POST['slip'];
$banker = $_POST['banker'];
$returned = $_POST['returned'];
$result2 = mysqli_query($connection,"select Stock_id, Debt, Quantity as Qty,Returned from  sales where id='".$id."';")or die($connection->error);
   $row2 = mysqli_fetch_array($result2);
    $old_Qty =  $row2['Qty'];
    $Debt =  $row2['Debt'];
    $stock_id = $row2['Stock_id'];
    $returns = $row2['Returned'];
    if ($returned > $old_Qty) {
      echo "excess returned";
      exit();
    }
    $result4 = mysqli_query($connection,"SELECT Price,quantity FROM (SELECT s.id as id,s.Quantity as quantity,sf.Selling_price as Price, sf.Created_at,ROW_NUMBER() OVER (PARTITION BY s.id ORDER BY sf.Created_at DESC) as rn FROM stock s JOIN stock_flow sf ON s.id = sf.Stock_id ) q WHERE rn = 1 AND id = '$stock_id'")or die($connection->error);
    $row4 = mysqli_fetch_array($result4);
    $Price = $row4['Price'];
    $storeQty = $row4['quantity'];
    $Discounted_Price = $Price - $discount;
     $cost = $Discounted_Price * $qty;
     $newBalance = $Debt-$cost+$mpesa+$cash;
$result1 = mysqli_query($connection,"SELECT Staff_id,Quantity,Balance FROM sales where `id` = '".$id."'")or die($connection->error);
    $row = mysqli_fetch_array($result1);
    $Quantity = $row['Quantity'];
    $oldBalance = $row['Balance'];
    $staff = $row['Staff_id'];
      $Returned = '';
    if ($returns == $returned) {
      $Returned = $Quantity - $qty;
    }
    else{
      $Returned = $returned;
      $qty = $qty - $returned; 
    }
      $qty_bal = '';
    if ($Returned > 0) {
      $qty_bal = $Returned;
    }
    else{
      $qty_bal = '0';
    }
    $qtyAdded = $qty - $Quantity;
    if ($storeQty < $qtyAdded) {
      echo "Unavailable";
      exit();
    }
      mysqli_query($connection,"UPDATE `sales`  SET `Quantity` = '".$qty."',`Balance` = '".$newBalance."',`MPesa` = '".$mpesa."',`Cash` = '".$cash."',`Discount` = '".$discount."',`Returned` = Returned +'".$qty_bal."',`Banked` = '".$banked."',`Slip_Number` = '".$slip."',`Banked_By` = '".$banker."' WHERE `id` = '".$id."'")or die($connection->error);
      mysqli_query($connection,"update stock set Quantity= Quantity +".$Returned." WHERE `id` = '".$stock_id."'")or die($connection->error);
      $product = mysqli_query($connection,"SELECT Name,Category_Name  FROM `stock` inner join category on stock.Category_id = category.id WHERE stock.id = '".$stock_id."'")or die($connection->error);
   $Product = mysqli_fetch_array($product);
  $Category_Name = $Product['Category_Name'];
  $Stock_Name = $Product['Name'];
  $Category = mysqli_query($connection,"SELECT Quantity,Restock_Level  FROM `stock` inner join category on stock.Category_id = category.id WHERE stock.id = '".$stock_id."'")or die($connection->error);
   $Name = mysqli_fetch_array($Category);
   $Restock_Level = $Name['Restock_Level'];
   if($Category_Name == 'Maize Flour' && strpos($Stock_Name, 'Pieces') !== false || $Category_Name == 'All Purpose Flour' && strpos($Stock_Name, 'Pieces') !== false){
   $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Bundle_Name = str_replace("Pieces","Bundles",$Stock_Name);
     $Bundle_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Bundle_Name."'")or die($connection->error);
   $bundle_qty = mysqli_fetch_array($Bundle_Qty);
   $bundleQuantity = $bundle_qty['Quantity'];
   if ($bundleQuantity <= 1) {
     $newBundleQty = 0;
     $newPiecesIncreament = $bundleQuantity * 12;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPiecesIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBundleQty = $bundleQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBundleQty' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '12' WHERE `id` = '".$stock_id."'")or die($connection->error);
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
   if ($bagQuantity = 1) {
     $newBagQty = 0;
     $newPacketsIncreament = 50;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bag_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPacketsIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBagQty = $bagQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBagQty' WHERE `Name` = '".$Bag_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '50' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
    if($Category_Name == 'Serviettes' && strpos($Stock_Name, 'Pieces') !== false){
       $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Bundle_Name = str_replace("Pieces","Bundles",$Stock_Name);
     $Bundle_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Bundle_Name."'")or die($connection->error);
   $bundle_qty = mysqli_fetch_array($Bundle_Qty);
   $bundleQuantity = $bag_qty['Quantity'];
   if ($bundleQuantity = 1) {
     $newBundleQty = 0;
     $newPiecesIncreament = 18;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPiecesIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBundleQty = $bundleQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBundleQty' WHERE `Name` = '".$Bundle_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '18' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
    if($Category_Name == 'Baking Powder' && strpos($Stock_Name, 'Pieces') !== false){
       $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Dozen_Name = str_replace("Pieces","Dozen",$Stock_Name);
     $Dozen_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Dozen_Name."'")or die($connection->error);
   $dozen_qty = mysqli_fetch_array($Dozen_Qty);
   $dozenQuantity = $dozen_qty['Quantity'];
   if ($dozenQuantity = 1) {
     $newDozenQty = 0;
     $newPiecesIncreament = 12;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Dozen_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newPiecesIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newDozenQty = $dozenQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newDozenQty' WHERE `Name` = '".$Dozen_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '12' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
    if($Category_Name == 'Baking Powder' && strpos($Stock_Name, 'Dozen') !== false){
       $Qty = $Name['Quantity'];
   if ($Qty < $Restock_Level) {
     $Box_Name = str_replace("Dozen","Boxes",$Stock_Name);
     $Box_Qty = mysqli_query($connection,"SELECT Quantity  FROM `stock` WHERE stock.Name = '".$Box_Name."'")or die($connection->error);
   $box_qty = mysqli_fetch_array($Dozen_Qty);
   $boxQuantity = $box_qty['Quantity'];
   if ($dozenQuantity = 1) {
     $newBoxQty = 0;
     $newDozenIncreament = 6;
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '0' WHERE `Name` = '".$Box_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '".$newDozenIncreament."' WHERE `id` = '".$stockIDx."'")or die($connection->error);
   }else{
      $newBoxQty = $boxQuantity - 1;
      mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = '$newBoxQty' WHERE `Name` = '".$Box_Name."'")or die($connection->error);
     mysqli_query($connection,"UPDATE `stock`  SET `Quantity` = Quantity + '6' WHERE `id` = '".$stock_id."'")or die($connection->error);
   }
   }
    }
     /* $result5 = mysqli_query($connection,"SELECT Category_Name FROM category join stock on category.id = stock.Category_id where stock.id = '".$stock_id."'")or die($connection->error);
      $row5 = mysqli_fetch_array($result5);
      $Cat_Name = $row5['Category_Name'];
      if($Cat_Name == 'Cereals'){
       mysqli_query($connection,"update cooked_cereals set Returned= Returned +".$Returned." WHERE `Stock_id` = '".$stock_id."' AND date(Delivery_date) = CURRENT_DATE()")or die($connection->error);
      }*/
      $difference = $oldBalance - $newBalance;
    mysqli_query($connection,"UPDATE sales set Debt= Debt-'".$difference."', `Balance` = Balance -".$difference." WHERE Staff_id='".$staff."' and id >'".$id."' ;")or die($connection->error);
    }
elseif ($where == 'fine') {
	$id = $_POST['id'];
	$balance = $_POST['balance'];
	$customerID = "";
	$x = new stdClass();
	$res1 = mysqli_query($connection, "SELECT * FROM orders WHERE id ='$id'");

	$rowS = mysqli_fetch_array($res1);
	$customerID = $rowS['Customer_id'];

	$res2 = mysqli_query($connection,"SELECT EXISTS(SELECT * FROM orders WHERE Customer_id='$customerID' AND id >= '$id' AND Fine < 0)");
	$rx = mysqli_fetch_array($res2);
	if ($rx[0]==0) {
		$x->msg="Positive";
		$re = mysqli_query($connection, "SELECT * FROM orders WHERE id='$id'");
		$rowy = mysqli_fetch_array($re);
		$fine = 0;
		$balance = $rowy['Balance'];
		if ($balance <= -500) {
			$fine = -100;
		}elseif ($balance>-500 && $balance<0) {
			$fine = $balance * 0.1;
		}
		if ($fine!=0) {
			$newB = $balance + $fine;
			$x->newBalance = $newB;
			$x->Fine=$fine;
			if (mysqli_query($connection,"UPDATE orders SET Fine = '$fine', Balance = '$newB' WHERE id='$id'")===TRUE) {
					mysqli_query($connection,"UPDATE orders set Debt= Debt+'".$fine."', `Balance` = Balance +".$fine." WHERE Customer_id='".$customerID."' and id >'".$id."' ;")or die($connection->error);
			}
			#update status
			$result2 = mysqli_query($connection,"SELECT orders.Balance as newBalance from orders INNER JOIN customers ON orders.Customer_id=customers.id  WHERE orders.id IN (SELECT MAX(orders.id)FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.id='".$customerID."' ); ")or die($connection->error);
			$row2 = mysqli_fetch_array($result2);
			$newBalance = $row2['newBalance'];
			if ($newBalance == 0) {
				mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'clean' WHERE `id` = '".$customerID."'")or die($connection->error);
			}else if ($newBalance > 0) {
				mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'credit' WHERE `id` = '".$customerID."'")or die($connection->error);
			}else if ($newBalance < 0 && $newBalance >= -100) {
				mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'fined' WHERE `id` = '".$customerID."'")or die($connection->error);
			}else if ($newBalance < -100) {
			 mysqli_query($connection,"UPDATE `customers`  SET `Status` = 'no delivery' WHERE `id` = '".$customerID."'")or die($connection->error);
		}
		#sam's weebshit
	}else {
		$x->msg="Negativex";
	}
	}else {
		$res3 = mysqli_query($connection,"SELECT * FROM orders WHERE Customer_id='$customerID' AND id >= '$id' AND Fine < 0");
		while($rowx = mysqli_fetch_assoc($res3)){
			if ($rowx['Fine']<0) {
				$x->fineAmt = $rowx['Fine'];
				$x->fineOrder = $rowx['id'];
			}
		}
		$x->msg="Negative";
	}
	echo json_encode($x);
}

elseif ($where == 'suppliers') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
mysqli_query($connection,"UPDATE `suppliers` SET `Supplier_contact` = '".$contact."' WHERE `id` = '".$id."'")or die($connection->error);
}elseif ($where == 'vehicles') {
  $id = $_POST['id'];
    $route = $_POST['route'];
    $mileage = $_POST['mileage'];
    $miles = str_replace(" Kms.", "", $mileage);
mysqli_query($connection,"UPDATE `vehicles` SET `Route` = '".$route."',`Mileage` = '".$miles."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'deliverer') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
    $staffId = $_POST['staffId'];
    $nationalId = $_POST['nationalId'];
    $salary = $_POST['salary'];
    $kra = $_POST['kra'];
    $nssf = $_POST['nssf'];
    $nhif = $_POST['nhif'];
    $figure = str_replace("Ksh. ","",$salary);
mysqli_query($connection,"UPDATE `users` SET `number` = '".$contact."',`staffID` = '".$staffId."',`nationalID` = '".$nationalId."',`KRA` = '".$kra."',`NSSF` = '".$nssf."',`NHIF` = '".$nhif."',`salary` = '".$figure."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'cook') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
    $staffId = $_POST['staffId'];
    $nationalId = $_POST['nationalId'];
    $salary = $_POST['salary'];
    $kra = $_POST['kra'];
    $nssf = $_POST['nssf'];
    $nhif = $_POST['nhif'];
    $figure = str_replace("Ksh. ","",$salary);
mysqli_query($connection,"UPDATE `users` SET `number` = '".$contact."',`staffID` = '".$staffId."',`nationalID` = '".$nationalId."',`KRA` = '".$kra."',`NSSF` = '".$nssf."',`NHIF` = '".$nhif."',`salary` = '".$figure."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'cleaner') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
    $staffId = $_POST['staffId'];
    $nationalId = $_POST['nationalId'];
    $salary = $_POST['salary'];
    $kra = $_POST['kra'];
    $nssf = $_POST['nssf'];
    $nhif = $_POST['nhif'];
    $figure = str_replace("Ksh. ","",$salary);
mysqli_query($connection,"UPDATE `users` SET `number` = '".$contact."',`staffID` = '".$staffId."',`nationalID` = '".$nationalId."',`KRA` = '".$kra."',`NSSF` = '".$nssf."',`NHIF` = '".$nhif."',`salary` = '".$figure."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'office') {
  $id = $_POST['id'];
    $contact = $_POST['contact'];
    $staffId = $_POST['staffId'];
    $nationalId = $_POST['nationalId'];
    $salary = $_POST['salary'];
    $kra = $_POST['kra'];
    $nssf = $_POST['nssf'];
    $nhif = $_POST['nhif'];
    $role = $_POST['role'];
    $result1 = mysqli_query($connection,"SELECT id FROM jobs where Name like '%$role%';")or die($connection->error);
    $row = mysqli_fetch_array($result1);
    $position = $row['id'];
    $figure = str_replace("Ksh. ","",$salary);
mysqli_query($connection,"UPDATE `users` SET `number` = '".$contact."',`staffID` = '".$staffId."',`nationalID` = '".$nationalId."',`KRA` = '".$kra."',`NSSF` = '".$nssf."',`NHIF` = '".$nhif."',`salary` = '".$figure."' ,`Job_id` = '".$position."' WHERE `id` = '".$id."'")or die($connection->error);
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
elseif ($where == 'expenseHeading') {
  $id = $_POST['id'];
    $name = $_POST['name'];
mysqli_query($connection,"UPDATE `expenses` SET `Name` = '".$name."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'expense') {
  $id = $_POST['id'];
    $party = $_POST['party'];
    $particular = $_POST['particular'];
     $total = $_POST['total'];
     $paid = $_POST['paid'];
     $due = $_POST['due'];
     $date = $_POST['date'];
mysqli_query($connection,"UPDATE `expense_details` SET `Party` = '".$party."',`Expense_particular` = '".$particular."',`Total_amount` = '".$total."',`Paid_amount` = '".$paid."',`Due_amount` = '".$due."',`Payment_date` = '".$date."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'calendar') {
   if(isset($_POST["id"]))
{
  $id =$_POST["id"];
   $title = $_POST["title"];
  $start_event = $_POST["start"];
  $end_event = $_POST["end"];
  mysqli_query($connection,"UPDATE event SET title='$title', start_event='$start_event', end_event='$end_event' WHERE id='$id'")or die($connection->error);
}
}
elseif ($where == 'profile') {
  $staffid = $_POST['staffid'];
    $username = $_POST['username'];
     $email = $_POST['email'];
     $number = $_POST['number'];
     $nationalid = $_POST['nationalid'];
mysqli_query($connection,"UPDATE `users` SET `username` = '".$username."',`email` = '".$email."',`number` = '".$number."',`nationalID` = '".$nationalid."' WHERE `staffID` = '".$staffid."'")or die($connection->error);
unset($_SESSION['user']);
$_SESSION['user'] = $username;
echo "saved";
}
elseif ($where == 'service') {
  $id = $_POST['id'];
    $now = $_POST['now'];
     $note = $_POST['note'];
     $next = $_POST['next'];
     $row = mysqli_query($connection,"SELECT * FROM vehicle_service WHERE Vehicle_id = '".$id."'")or die($connection->error);
      $result = mysqli_fetch_array($row);
         if ( $result == TRUE) {
mysqli_query($connection,"UPDATE `vehicle_service` SET Last_service = '".$now."', `notes` = '".$note."',Next_service = '".$next."' WHERE `Vehicle_id` = '".$id."'")or die($connection->error);
         }
         else{
      mysqli_query($connection,"INSERT INTO `vehicle_service` (`Vehicle_id`,`Last_service`,`notes`,`Next_service`) VALUES ('$id','$now','$note','$next')") or die(mysqli_error($connection));
         }
}
elseif ($where == 'inspection') {
  $id = $_POST['id'];
    $now = $_POST['now'];
     $note = $_POST['note'];
     $next = $_POST['next'];
     $row = mysqli_query($connection,"SELECT * FROM vehicle_inspection WHERE Vehicle_id = '".$id."'")or die($connection->error);
      $result = mysqli_fetch_array($row);
         if ( $result == TRUE) {
mysqli_query($connection,"UPDATE `vehicle_inspection` SET Last_Inspection = '".$now."', `notes` = '".$note."',Next_Inspection = '".$next."' WHERE `Vehicle_id` = '".$id."'")or die($connection->error);
          }
          else{
    mysqli_query($connection,"INSERT INTO `vehicle_inspection` (`Vehicle_id`,`Last_Inspection`,`notes`,`Next_Inspection`) VALUES ('$id','$now','$note','$next')") or die(mysqli_error($connection));
          }
}
elseif ($where == 'driver') {
  $id = $_POST['id'];
    $driver = $_POST['driver'];
mysqli_query($connection,"UPDATE `vehicles` SET Driver_id = '".$driver."' WHERE `id` = '".$id."'")or die($connection->error);
}
elseif ($where == 'damaged') {
  $id = $_POST['id'];
    $qty = $_POST['qty'];
mysqli_query($connection,"UPDATE `stock_flow` JOIN stock ON stock_flow.Stock_id = stock.id SET Damaged = Damaged + '".$qty."',Quantity = Quantity - '".$qty."' WHERE stock_flow.id = '".$id."'")or die($connection->error);
}
elseif ($where == 'leftovers') {
  $id = $_POST['id'];
    $difference = $_POST['difference'];
mysqli_query($connection,"UPDATE `cooked_cereals`  SET `Quantity_Difference` =  '".$difference."',`Quantity_Prepared` = Quantity_Prepared + '$difference' WHERE `id` = '".$id."'") or die(mysqli_error($connection));
}
elseif ($where == 'sickoff') {
  $id = $_POST['id'];
  $reason = $_POST['reason'];
  $start = $_POST['start'];
  $days = $_POST['days'];
$result2 = mysqli_query($connection,"SELECT id from employee_sickoff_data  WHERE Staff_id = '$id' AND Start_day='$start'")or die($connection->error);
$row2 = mysqli_fetch_array($result2);
$ID = $row2['id'];
mysqli_query($connection,"UPDATE `employee_sickoff_data`  SET `Reason` =  '".$reason."',`Start_day` = '$start', `sickoff_days_no` = '$days',`End_day` = DATE_ADD( '".$start."', INTERVAL ".$days." DAY ) WHERE `id` = '".$ID."'") or die(mysqli_error($connection));
}
elseif ($where == 'leave') {
  $id = $_POST['id'];
  $standIn = $_POST['standIn'];
  $start = $_POST['start'];
  $days = $_POST['days'];
$result2 = mysqli_query($connection,"SELECT id from employee_leave_data  WHERE Staff_id = '$id' AND Start_day='$start'")or die($connection->error);
$row2 = mysqli_fetch_array($result2);
$ID = $row2['id'];
$arr = explode(' ',trim($standIn));
$firstname = $arr[0];
$lastname = $arr[1];
$result3 = mysqli_query($connection,"SELECT staffID from users  WHERE firstname = '$firstname' AND lastname = '$lastname'")or die($connection->error);
$row3 = mysqli_fetch_array($result3);
$standID = $row3['staffID'];
if ($id == $standID) {
  echo "Kindly choose another stand in employee. Action Failed";
  exit();
}
mysqli_query($connection,"UPDATE `employee_leave_data`  SET `Stand_in_employee` = '".$standID."',`Start_day` = '$start', `leave_days_no` = '$days',`End_day` = DATE_ADD( '".$start."', INTERVAL ".$days." DAY ) WHERE `id` = '".$ID."'") or die(mysqli_error($connection));
}
 ?>
