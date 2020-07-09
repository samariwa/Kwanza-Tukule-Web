<?php  
require('config.php');
$customersList = mysqli_query($connection,"SELECT id,Name,Location,Number,Deliverer,Status,Note FROM customers WHERE Status != 'blacklisted'ORDER BY id DESC")or die($connection->error);
$blacklistedList =  mysqli_query($connection,"SELECT customers.id as id,customers.Name, MAX(orders.created_at),customers.Location,customers.Number,customers.Deliverer,orders.Balance FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.Status='blacklisted' GROUP BY customers.id;")or die($connection->error);
$categoriesList = mysqli_query($connection,"SELECT * FROM category ORDER BY id ASC")or die($connection->error);
$stockList = mysqli_query($connection,"SELECT stock.id,category.Category_Name,stock.Name,stock_flow.Buying_price as Buying_price,stock_flow.Selling_price as Selling_Price,stock.Quantity FROM stock INNER JOIN category ON stock.Category_id=category.id INNER JOIN stock_flow ON stock.id=stock_flow.Stock_id ORDER BY id ASC")or die($connection->error);
$salesList = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id  ORDER BY orders.id ASC;")or die($connection->error);
$usersList = mysqli_query($connection,"SELECT * FROM users")or die($connection->error);
$suppliersList = mysqli_query($connection,"SELECT * FROM suppliers ORDER BY id ASC")or die($connection->error);
$vehicleList = mysqli_query($connection,"SELECT * FROM vehicles ORDER BY id ASC")or die($connection->error);
$officeStaffList = mysqli_query($connection,"SELECT users.id as id,firstname,lastname,number,gender,staffID,nationalID,yob,salary,Job_id,Name FROM users INNER JOIN jobs ON users.Job_id=jobs.id where Job_id = '2' or Job_id = '3' or Job_id = '4' or Job_id = '7'")or die($connection->error);
$deliverersStaffList = mysqli_query($connection,"SELECT * FROM users where Job_id = '5'")or die($connection->error);
$cooksStaffList = mysqli_query($connection,"SELECT * FROM users where Job_id = '6'")or die($connection->error);
$shelfLife = mysqli_query($connection,"SELECT stock_flow.id as id,Name,stock.Quantity as Qty,stock_flow.Received_date as Received_date,stock_flow.Expiry_date as Expiry_date,max(stock_flow.Created_at) FROM stock_flow inner join stock on stock_flow.Stock_id = stock.id group by Stock_id")or die($connection->error);
$publicNotes = mysqli_query($connection,"SELECT notes.id as id,username,Title,Note, notes.Created_at as Created_at FROM notes inner join users on notes.User_id = users.id where Public = '1' order by notes.id DESC LIMIT 5")or die($connection->error);
$privateNotes = mysqli_query($connection,"SELECT notes.id as id,username,Title,Note, notes.Created_at as Created_at FROM notes inner join users on notes.User_id = users.id where Public = '0' order by notes.id DESC LIMIT 8")or die($connection->error);
 ?>
