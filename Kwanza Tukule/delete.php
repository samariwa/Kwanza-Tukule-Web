<?php
require('config.php');
$where =$_POST['where'];
if($where == 'customer' )
{  
	$id =$_POST['id'];
mysqli_query($connection,"Delete from `customers` where id='".$id."'");
    echo 1;
    exit();
}
?>