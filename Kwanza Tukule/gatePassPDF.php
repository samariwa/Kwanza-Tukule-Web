<?php
 session_start();
 require('config.php');
 $deliverer = $_POST['deliverer'];
 $time = $_POST['time'];
  $gatePassFull = mysqli_query($connection,"SELECT stock.Name as 'name',SUM(orders.Quantity) AS 'sum' FROM orders inner join stock on Stock_id = stock.id inner join customers on Customer_id = customers.id where DATE(orders.Late_Order) = CURRENT_DATE()+1 and customers.deliverer LIKE '%".$deliverer."%'GROUP BY stock.ID")or die($connection->error);

 $gatePassPartial = mysqli_query($connection,"SELECT stock.Name as 'name',SUM(orders.Quantity) AS 'sum' FROM orders inner join stock on Stock_id = stock.id inner join customers on Customer_id = customers.id where DATE(orders.Late_Order) =CURRENT_DATE()and orders.Created_at >'".$time."%' and customers.deliverer LIKE '%".$deliverer."%'GROUP BY stock.ID")or die($connection->error);
  $row1 = mysqli_fetch_array($gatePassFull);
    $product1 = $row1[`name`];
    $quantity1 = $row1[`sum`];
     $row2 = mysqli_fetch_array($gatePassPartial);
    $product2 = $row2[`name`];
    $quantity2 = $row2[`sum`];
 $varietyNumber1 = mysqli_num_rows($gatePassFull);
 $varietyNumber2 = mysqli_num_rows($gatePassPartial);
 $today = date("l, F d, Y h:i A", time());
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
<p align="center">Gate Pass (For Tomorrow)</p>
<?php
?>
<p align="center">Products:'.$varietyNumber1.' </p>
<?php
?>
<hr>
<p> <?php  '.$today.' ?></p>
<hr>
<table class="table table-striped" style="display:block;"">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="70%"">Product Name</th>
      <th scope="col" width="30%"">Quantity</th>
    </tr>
  </thead>
  <tbody >
  <?php
        $count = 0;
        foreach($gatePassFull as $row){
         $count++;
  ?>      
    <tr>
      <th scope="row">  '.$product1.' </th>
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
<p align="center">Gate Pass</p>
<p align="center">Products:'.$varietyNumber2.' </p>
<hr>
<p> <?php  '.$today.' ?></p>
<hr>
<table class="table table-striped" style="display:block;"">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="70%"">Product Name</th>
      <th scope="col" width="30%"">Quantity</th>
    </tr>
  </thead>
  <tbody >
  <?php
        $count = 0;
        foreach($gatePassPartial as $row){
         $count++;
  ?>      
    <tr>
      <th scope="row">  '.$product2.' </th>
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
