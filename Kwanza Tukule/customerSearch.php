<?php
require('config.php');
$customer_output = '';
       $result = mysqli_query($connection,"SELECT id,Name,Location,Number,Deliverer FROM customers WHERE Status != 'blacklisted' AND Name LIKE '%".$_POST["search"]."%' OR Location LIKE  '%".$_POST["search"]."%' OR Number LIKE  '%".$_POST["search"]."%' OR Deliverer LIKE  '%".$_POST["search"]."%'");
       if (mysqli_num_rows($result) > 0) {

       	       
             $customer_output .= '<h6 style="margin-left:100px;" ><b>Search Result(s)</b></h6>';
        while($row = mysqli_fetch_array($result))
        {
          $customer_output .= '
          <div class="row">
          <a href="#" class=" list-group-item-action list-group-flush" ><span class="idX" >'.$row["id"].'</span>&emsp;&emsp;<span id="selected">'.$row["Name"].'</span>&emsp;&emsp;('.$row["Location"].')&emsp;&emsp;'.$row["Number"].'&emsp;&emsp;'.$row["Deliverer"].'</a><br>
          </div>';
        }   
        echo $customer_output;                  
       }else{
          echo "<p>Customer Not Found</p>";
       }
?>