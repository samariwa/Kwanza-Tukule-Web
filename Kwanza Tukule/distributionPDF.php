<?php
 session_start();
 require('config.php');
 $deliverer = $_POST['deliverer'];
 $time = $_POST['time'];
  $distributionFull = mysqli_query($connection,"SELECT customers.Name as name,customers.Number as number,customers.Location as location,stock.Name as stock,orders.Quantity as quantity FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id where customers.Deliverer LIKE '%".$deliverer."%' AND DATE(orders.Late_Order) = CURRENT_DATE()+1 order by orders.id")or die($connection->error);
 $distributionPartial = mysqli_query($connection,"SELECT customers.Name as name,customers.Number as number,customers.Location as location,stock.Name as stock,orders.Quantity as quantity FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id where customers.Deliverer LIKE '%".$deliverer."%' AND DATE(orders.Late_Order) =CURRENT_DATE()and orders.Created_at >'".$time."%' order by orders.id")or die($connection->error);
 $row1 = mysqli_fetch_array($distributionFull);
    $name1 = $row1[`name`];
    $number1 = $row1[`number`];
    $location1 = $row1[`location`];
    $stock1 = $row1[`stock`];
    $quantity1 = $row1[`quantity`];
     $row2 = mysqli_fetch_array($distributionPartial);
    $name2 = $row2[`name`];
    $number2 = $row2[`number`];
    $location2 = $row2[`location`];
    $stock2 = $row2[`stock`];
    $quantity2 = $row2[`quantity`];
 $today = date("l, F d, Y h:i A", time());
 $varietyNumber1 = mysqli_num_rows($distributionFull);
 $varietyNumber2 = mysqli_num_rows($distributionPartial);
 $pdf = '';   
 if ($time == '') {
    $pdf .= '<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gate Pass</title>
</head><body>
<p align="center"><strong><img src="assets/img/Kwanza Tukule.png" height="60" width="155"></strong></p>
<p align="center">Products Distribution (For Tomorrow)</p>
<p align="center">No. of Customers who ordered:'.$varietyNumber1.' </p>
<?php
?>
<p> For: '.$deliverer.'</p>
<hr>
<p> '.$today.'</p>
<hr>
<table class="table table-striped" style="display:block;"">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="20%"">Customer Name</th>
      <th scope="col" width="20%"">Customer Number</th>
      <th scope="col" width="20%"">Customer Location</th>
      <th scope="col" width="20%"">Product Name</th>
      <th scope="col" width="20%"">Quantity</th>
    </tr>
  </thead>
  <tbody >
  <?php
        $count = 0;
        foreach($distributionFull as $row){
         $count++;
  ?>      
    <tr>
      <th scope="row">  '.$name1.' </th>
      <td >  '.$number1.' </td>
      <td >  '.$location1.' </td>
      <td >  '.$stock1.' </td>
      <td >  '.$quantity1.' </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<br>
<p>Prepared by: '.$_SESSION["user"].' 
</body></html>';

echo $pdf;
 }
 else{
      $pdf .= '<!doctype html>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gate Pass</title>
</head><body>
<p align="center"><strong><img src="assets/img/Kwanza Tukule.png" height="60" width="155"></strong></p>
<p align="center">Products Distribution</p>
<?php
?>
<p align="center">No. of Customers who ordered:'.$varietyNumber2.' </p>
<p> For: '.$deliverer.'</p>
<hr>
<p> '.$today.' </p>
<hr>
<table class="table table-striped" style="display:block;"">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="20%"">Customer Name</th>
      <th scope="col" width="20%"">Customer Number</th>
      <th scope="col" width="20%"">Customer Location</th>
      <th scope="col" width="20%"">Product Name</th>
      <th scope="col" width="20%"">Quantity</th>
    </tr>
  </thead>
  <tbody >
  <?php
        $count = 0;
        foreach($distributionPartial as $row){
         $count++;
  ?>      
    <tr>
      <th scope="row">  '.$name2.' </th>
      <td >  '.$number2.' </td>
      <td >  '.$location2.' </td>
      <td >  '.$stock2.' </td>
      <td >  '.$quantity2.' </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<br>
<p>Prepared by: '.$_SESSION["user"].' 
</body></html>';

echo $pdf;

 }

 ?> 
