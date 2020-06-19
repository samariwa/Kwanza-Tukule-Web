<?php  
require('config.php');
$customersList = mysqli_query($connection,"SELECT id,Name,Location,Number,Deliverer,Status,Note FROM customers WHERE Status != 'blacklisted'ORDER BY id DESC")or die($connection->error);
$blacklistedList =  mysqli_query($connection,"SELECT customers.id as id,Name,Location,Number,Deliverer,Balance FROM orders INNER JOIN customers ON orders.Customer_id=customers.id WHERE orders.Created_at IN (SELECT MAX(orders.id) FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.Status='blacklisted'  GROUP BY customers.id );")or die($connection->error);
$categoriesList = mysqli_query($connection,"SELECT * FROM category ORDER BY id ASC")or die($connection->error);
$stockList = mysqli_query($connection,"SELECT stock.id,category.Category_Name,stock.Name,stock.Buying_price,stock.Price,stock.Quantity FROM stock INNER JOIN category ON stock.Category_id=category.id ORDER BY id ASC")or die($connection->error);
$salesList = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id  ORDER BY orders.id ASC;")or die($connection->error);
$usersList = mysqli_query($connection,"SELECT * FROM users")or die($connection->error);
 ?>