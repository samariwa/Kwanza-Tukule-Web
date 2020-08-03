<?php  
require('config.php');
$customersList = mysqli_query($connection,"SELECT id,Name,Location,Number,Deliverer,Status,Note FROM customers WHERE Status != 'blacklisted'ORDER BY id DESC")or die($connection->error);
$customersPrintList = mysqli_query($connection,"SELECT customers.id as id,Name,Location,Number,Deliverer,Status,Note FROM customers inner join orders on customers.id=orders.Customer_id WHERE Status != 'blacklisted' and DATE(orders.Late_order) >= DATE_ADD(CURRENT_DATE(), INTERVAL -10 DAY) group by customers.id")or die($connection->error);
$blacklistedList =  mysqli_query($connection,"SELECT customers.id as id,customers.Name, MAX(orders.created_at),customers.Location,customers.Number,customers.Deliverer,orders.Balance FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.Status='blacklisted' GROUP BY customers.id;")or die($connection->error);
$categoriesList = mysqli_query($connection,"SELECT * FROM category ORDER BY id ASC")or die($connection->error);
$stockList = mysqli_query($connection,"SELECT stock.id,category.Category_Name,stock.Name,stock_flow.Buying_price as Buying_price,stock_flow.Selling_price as Selling_Price,stock.Quantity as Quantity,max(stock_flow.Created_at) FROM stock INNER JOIN category ON stock.Category_id=category.id INNER JOIN stock_flow ON stock.id=stock_flow.Stock_id  group by stock.id")or die($connection->error);
$salesList = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id  ORDER BY orders.id ASC;")or die($connection->error);
$usersList = mysqli_query($connection,"SELECT * FROM users")or die($connection->error);
$suppliersList = mysqli_query($connection,"SELECT * FROM suppliers ORDER BY id ASC")or die($connection->error);
$vehicleList = mysqli_query($connection,"SELECT * FROM vehicles ORDER BY id ASC")or die($connection->error);
$officeStaffList = mysqli_query($connection,"SELECT users.id as id,firstname,lastname,number,gender,staffID,nationalID,yob,salary,Job_id,Name FROM users INNER JOIN jobs ON users.Job_id=jobs.id where Job_id = '2' or Job_id = '3' or Job_id = '4' or Job_id = '7'")or die($connection->error);
$deliverersStaffList = mysqli_query($connection,"SELECT * FROM users where Job_id = '5'")or die($connection->error);
$cooksStaffList = mysqli_query($connection,"SELECT * FROM users where Job_id = '6'")or die($connection->error);
$shelfLife = mysqli_query($connection,"SELECT stock_flow.id as id,Name,stock_flow.Purchased as Qty,stock_flow.Received_date as Received_date,stock_flow.Expiry_date as Expiry_date,max(stock_flow.Created_at) FROM stock_flow inner join stock on stock_flow.Stock_id = stock.id group by Stock_id")or die($connection->error);
$publicNotes = mysqli_query($connection,"SELECT notes.id as id,username,Title,Note, notes.Created_at as Created_at FROM notes inner join users on notes.User_id = users.id where Public = '1' order by notes.id DESC LIMIT 5")or die($connection->error);
$privateNotes = mysqli_query($connection,"SELECT notes.id as id,username,Title,Note, notes.Created_at as Created_at FROM notes inner join users on notes.User_id = users.id where Public = '0' order by notes.id DESC LIMIT 8")or die($connection->error);
$returnedList = mysqli_query($connection,"SELECT orders.id as id,customers.Name as customer,customers.Number as number, customers.Deliverer as deliverer,category.Category_Name as category,stock.Name as stock,orders.Quantity as ordered, orders.Returned as returned FROM orders inner join customers on orders.Customer_id = customers.id inner join stock on orders.Stock_id = stock.id inner join category on orders.Category_id = category.id where orders.returned > '0'")or die($connection->error);
$salesPrintList = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(orders.Late_Order) = CURRENT_DATE()+1 ORDER BY orders.id ASC;")or die($connection->error);
$salesYesterday = mysqli_query($connection,"select SUM(stock.Price*orders.Quantity) as 'Sales_yesterday' from orders INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(Late_Order) = CURRENT_DATE()-1")or die($connection->error);
$revenueYesterday = mysqli_query($connection,"select (SUM(orders.Cash)+SUM(orders.MPesa)) as 'Revenue_yesterday' from orders INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(Late_Order) = CURRENT_DATE()-1")or die($connection->error);
$mpesaYesterday = mysqli_query($connection,"SELECT SUM(MPesa) as 'Mpesa_yesterday' FROM `orders` WHERE DATE(Late_Order) = CURRENT_DATE()-1")or die($connection->error);
$cashYesterday = mysqli_query($connection,"SELECT SUM(Cash) as 'Cash_yesterday' FROM `orders` WHERE DATE(Late_Order) = CURRENT_DATE()-1")or die($connection->error);
$mpesaDebt = mysqli_query($connection,"SELECT SUM(MPesa) as 'Mpesa_debt' FROM `orders` WHERE DATE(Updated_at) = CURRENT_DATE()-1 AND DATE(Late_Order) < CURRENT_DATE()-1")or die($connection->error);
$cashDebt = mysqli_query($connection,"SELECT SUM(Cash) as 'Cash_debt' FROM `orders` WHERE DATE(`Updated_at`) = CURRENT_DATE()-1 AND DATE(Late_Order) < CURRENT_DATE()-1")or die($connection->error);
$bankedYesterday = mysqli_query($connection,"SELECT SUM(Banked) as 'Banked_yesterday' FROM `orders` WHERE DATE(`Updated_at`) >= CURRENT_DATE()-1")or die($connection->error);
$expenditureYesterday = mysqli_query($connection,"SELECT SUM(Paid_amount) as 'paid' FROM `expense_details` WHERE DATE(`Created_at`) >= CURRENT_DATE()-1")or die($connection->error);
$valuationQuery = mysqli_query($connection,"select s.id as sid,max(sf.Created_at), s.Name as sname,s.Opening_stock as Opening_stock,sf.purchased as purchased,s.Quantity as Quantity,sf.Selling_price as Selling_Price,sf.Buying_price as Buying_price, sum(case when date(o.Late_Order) =  CURRENT_DATE-4 then o.Quantity else 0 end) as sum1,sum(case when date(o.Late_Order) =  CURRENT_DATE-3 then o.Quantity else 0 end) as sum2,sum(case when date(o.Late_Order) =  CURRENT_DATE-2 then o.Quantity else 0 end) as sum3,sum(case when date(o.Late_Order) =  CURRENT_DATE-1 then o.Quantity else 0 end) as sum4,sum(case when date(o.Late_Order) =  CURRENT_DATE then o.Quantity else 0 end) as sum5 from stock s inner join orders o on s.id = o.Stock_id inner join stock_flow sf on s.id = sf.Stock_id group by s.id;")or die($connection->error);
$expenseHeadingList =  mysqli_query($connection,"SELECT * FROM `expenses`")or die($connection->error);
$expensesList = mysqli_query($connection,"SELECT expense_details.id as id,Name,Party,Total_amount,Paid_amount,Payment_date FROM `expense_details` inner join expenses on expense_details.Expense_id = expenses.id")or die($connection->error);
$liabilitiesList = mysqli_query($connection,"SELECT expense_details.id as id,Name,Party,Total_amount,Paid_amount,Payment_date FROM `expense_details` inner join expenses on expense_details.Expense_id = expenses.id where Due_amount > '0' ")or die($connection->error);
 ?>

