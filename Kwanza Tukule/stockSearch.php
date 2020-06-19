<?php  
require('config.php');
$product_output = '';
       $result = mysqli_query($connection,"SELECT stock.id,category.Category_Name,stock.Name,stock.Price,stock.Quantity FROM stock INNER JOIN category ON stock.Category_id=category.id WHERE Name LIKE '%".$_POST["search2"]."%' OR Category_Name LIKE  '%".$_POST["search2"]."%'")or die($connection->error);
       if (mysqli_num_rows($result) > 0) {

       	       
             $product_output .= '<h6 style="margin-left:100px;" ><b>Search Result(s)</b></h6>';
        while($row = mysqli_fetch_array($result))
        {
          $product_output .= '
          <div class="row">
          <a href="#" class=" list-group-item-action list-group-flush" ><span id="selected2">'.$row["Name"].'</span>&emsp;&emsp;('.$row["Category_Name"].')&emsp;&emsp;Price('.$row["Price"].')&emsp;&emsp;Quantity('.$row["Quantity"].')</a><br>
          </div>';
        }   
        echo $product_output;                  
       }else{
          echo "<p>Product Not Found</p>";
       }       
?>