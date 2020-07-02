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
else if($where == 'stock' )
{  
	$id =$_POST['id'];
mysqli_query($connection,"Delete from `stock` where id='".$id."'");
    echo 1;
    exit();
}
else if($where == 'blacklist' )
{  
	$id =$_POST['id'];
mysqli_query($connection,"Delete from `customers` where id='".$id."'");
    echo 1;
    exit();
}
else if($where == 'category' )
{  
	$id =$_POST['id'];
mysqli_query($connection,"Delete from `category` where id='".$id."'");
    echo 1;
    exit();
}
else if($where == 'supplier' )
{  
	$id =$_POST['id'];
mysqli_query($connection,"Delete from `suppliers` where id='".$id."'");
    echo 1;
    exit();
}
?>