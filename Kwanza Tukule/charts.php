<?php
require('config.php');
$where =$_POST['where'];
if($where == 'fastmoving' )
{   
       $fastmoving = mysqli_query($connection,"SELECT stock.Name as 'name',SUM(orders.Quantity) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  GROUP BY stock.ID ORDER BY sum DESC LIMIT 5")or die($connection->error);
       $sum = mysqli_query($connection,"SELECT SUM(orders.Quantity) AS 'sumtotal' FROM orders inner join stock on Stock_id = stock.id")or die($connection->error);
       $fastsum = 0;
       $fastmovingproducts = array(['Products', 'Number of products sold']);
        foreach($fastmoving as $row){
        $name = $row['name'];
        $total = $row['sum'];
        $fastsum = $fastsum + $total;
        $resultArray = array($name, $total);
        array_push($fastmovingproducts, $resultArray);
        }
        $row1 = mysqli_fetch_array($sum);
        $totalsum = $row1['sumtotal'];
        $other = $totalsum - $fastsum;
        array_push($fastmovingproducts,['Other',$other]);
       $array = json_encode($fastmovingproducts);
        echo $array;
}  
?>