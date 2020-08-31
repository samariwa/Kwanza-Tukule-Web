<?php  
require('config.php');
$customersList = mysqli_query($connection,"SELECT id,Name,Location,Number,Deliverer,Status,Note FROM customers WHERE Status != 'blacklisted'ORDER BY id DESC")or die($connection->error);
$customersPrintList = mysqli_query($connection,"SELECT customers.id as id,Name,Location,Number,Deliverer,Status,Note FROM customers inner join orders on customers.id=orders.Customer_id WHERE Status != 'blacklisted' and DATE(orders.Late_order) >= DATE_ADD(CURRENT_DATE(), INTERVAL -10 DAY) group by customers.id")or die($connection->error);
$blacklistedList =  mysqli_query($connection,"SELECT customers.id as id,customers.Name, MAX(orders.created_at),customers.Location,customers.Number,customers.Deliverer,orders.Balance FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.Status='blacklisted' GROUP BY customers.id;")or die($connection->error);
$categoriesList = mysqli_query($connection,"SELECT * FROM category ORDER BY id ASC")or die($connection->error);
$stockList = mysqli_query($connection,"SELECT stock.id,category.Category_Name,stock.Name,Restock_Level,Buying_price,Price,Quantity FROM stock INNER JOIN category ON stock.Category_id=category.id group by stock.id")or die($connection->error);
$restockExists = mysqli_query($connection,"select * from stock where Quantity <= Restock_Level")or die($connection->error);
$restockNeeded = mysqli_query($connection,"select Name,Quantity,Updated_at from stock where Quantity <= Restock_Level")or die($connection->error);
$notesExists = mysqli_query($connection,"select * from notes where DATE(Created_at) = current_date() and public = '1' or DATE(Updated_at) = current_date() and public = '1'")or die($connection->error);
$newnotes = mysqli_query($connection,"select users.firstname as 'firstname',users.lastname as 'lastname',Title,notes.Created_at as 'date' from notes inner join users on notes.User_id = users.id where DATE(notes.Created_at) = current_date() and public = '1' or DATE(notes.Updated_at) = current_date() and public = '1'")or die($connection->error);
$salesList = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(Late_Order) = CURRENT_DATE() ORDER BY orders.id ASC;")or die($connection->error);
$salesListYesterday = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(Late_Order) = DATE_SUB( CURDATE(), INTERVAL 1 DAY ) ORDER BY orders.id ASC;")or die($connection->error);
$salesListTomorrow = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(Late_Order) = DATE_ADD( CURDATE(), INTERVAL 1 DAY ) ORDER BY orders.id ASC;")or die($connection->error);
$usersList = mysqli_query($connection,"SELECT * FROM users")or die($connection->error);
$suppliersList = mysqli_query($connection,"SELECT * FROM suppliers ORDER BY id ASC")or die($connection->error);
$vehicleList = mysqli_query($connection,"SELECT * FROM vehicles ORDER BY id ASC")or die($connection->error);
$officeStaffList = mysqli_query($connection,"SELECT users.id as id,firstname,lastname,number,gender,staffID,nationalID,yob,salary,Job_id,Name FROM users INNER JOIN jobs ON users.Job_id=jobs.id where Job_id = '2' or Job_id = '3' or Job_id = '4' or Job_id = '7'")or die($connection->error);
$deliverersStaffList = mysqli_query($connection,"SELECT * FROM users where Job_id = '5'")or die($connection->error);
$cooksStaffList = mysqli_query($connection,"SELECT * FROM users where Job_id = '6'")or die($connection->error);
$shelfLife = mysqli_query($connection,"SELECT stock_flow.id as id,Name,stock_flow.Purchased as Qty,stock_flow.Received_date as Received_date,stock_flow.Expiry_date as Expiry_date,max(stock_flow.Created_at) FROM stock_flow inner join stock on stock_flow.Stock_id = stock.id group by Stock_id")or die($connection->error);
$publicNotes = mysqli_query($connection,"SELECT notes.id as id,username,Title,Note, notes.Created_at as Created_at FROM notes inner join users on notes.User_id = users.id where Public = '1' order by notes.id DESC LIMIT 5")or die($connection->error);
$privateNotes = mysqli_query($connection,"SELECT notes.id as id,username,Title,Note, notes.Created_at as Created_at FROM notes inner join users on notes.User_id = users.id where Public = '0' order by notes.id DESC LIMIT 8")or die($connection->error);
$returnedList = mysqli_query($connection,"SELECT orders.id as id,customers.Name as customer,customers.Number as number, customers.Deliverer as deliverer,category.Category_Name as category,stock.Name as stock,orders.Quantity as ordered, orders.Returned as returned FROM orders inner join customers on orders.Customer_id = customers.id inner join stock on orders.Stock_id = stock.id inner join category on orders.Category_id = category.id where orders.returned > '0' and orders.Late_Order = CURRENT_DATE()")or die($connection->error);
$salesPrintList = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, orders.Quantity AS Quantity,Price,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(orders.Late_Order) = DATE_ADD( CURDATE(), INTERVAL 1 DAY ) ORDER BY orders.id ASC;")or die($connection->error);
$salesYesterday = mysqli_query($connection,"select SUM(stock.Price*orders.Quantity) as 'Sales_yesterday' from orders INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(Late_Order) = DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$revenueYesterday = mysqli_query($connection,"select (SUM(orders.Cash)+SUM(orders.MPesa)) as 'Revenue_yesterday' from orders INNER JOIN stock ON orders.Stock_id=stock.id WHERE DATE(Late_Order) = DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$mpesaYesterday = mysqli_query($connection,"SELECT SUM(MPesa) as 'Mpesa_yesterday' FROM `orders` WHERE DATE(Late_Order) = DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$cashYesterday = mysqli_query($connection,"SELECT SUM(Cash) as 'Cash_yesterday' FROM `orders` WHERE DATE(Late_Order) = DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$mpesaDebt = mysqli_query($connection,"SELECT SUM(MPesa) as 'Mpesa_debt' FROM `orders` WHERE DATE(Updated_at) = DATE_SUB( CURDATE(), INTERVAL 1 DAY )AND DATE(Late_Order) < DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$cashDebt = mysqli_query($connection,"SELECT SUM(Cash) as 'Cash_debt' FROM `orders` WHERE DATE(`Updated_at`) = DATE_SUB( CURDATE(), INTERVAL 1 DAY ) AND DATE(Late_Order) < DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$bankedYesterday = mysqli_query($connection,"SELECT SUM(Banked) as 'Banked_yesterday' FROM `orders` WHERE DATE(`Updated_at`) >= DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$expenditureYesterday = mysqli_query($connection,"SELECT SUM(Paid_amount) as 'paid' FROM `expense_details` WHERE DATE(`Created_at`) >= DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
/* select s.id as sid,max(sf.Created_at), s.Name as sname,s.Opening_stock as Opening_stock,sf.purchased as purchased,s.Quantity as Quantity,sf.Selling_price as Selling_Price,sf.Buying_price as Buying_price, sum(case when date(o.Late_Order) =  CURRENT_DATE-4 then o.Quantity else 0 end) as sum1,sum(case when date(o.Late_Order) =  CURRENT_DATE-3 then o.Quantity else 0 end) as sum2,sum(case when date(o.Late_Order) =  CURRENT_DATE-2 then o.Quantity else 0 end) as sum3,sum(case when date(o.Late_Order) =  CURRENT_DATE-1 then o.Quantity else 0 end) as sum4,sum(case when date(o.Late_Order) =  CURRENT_DATE then o.Quantity else 0 end) as sum5 from stock s inner join orders o on s.id = o.Stock_id inner join stock_flow sf on s.id = sf.Stock_id group by s.id; */
$valuationQuery = mysqli_query($connection,"select s.id as sid,s.purchased as purchased,s.Opening_stock as Opening_stock,s.Buying_price as Buying_price,s.Quantity as Quantity,s.Price as Price,s.Name as sname,sum(case when date(o.Late_Order) =  DATE_SUB( CURDATE(), INTERVAL 4 DAY ) then o.Quantity else 0 end) as sum1,sum(case when date(o.Late_Order) =  DATE_SUB( CURDATE(), INTERVAL 3 DAY ) then o.Quantity else 0 end) as sum2,sum(case when date(o.Late_Order) =  DATE_SUB( CURDATE(), INTERVAL 2 DAY ) then o.Quantity else 0 end) as sum3,sum(case when date(o.Late_Order) =  DATE_SUB( CURDATE(), INTERVAL 1 DAY )then o.Quantity else 0 end) as sum4,sum(case when date(o.Late_Order) =  CURRENT_DATE then o.Quantity else 0 end) as sum5 from orders o inner join stock s on o.Stock_id = s.id group by s.id;")or die($connection->error);
$expenseHeadingList =  mysqli_query($connection,"SELECT * FROM `expenses`")or die($connection->error);
$expensesList = mysqli_query($connection,"SELECT expense_details.id as id,Name,Party,Total_amount,Paid_amount,Payment_date FROM `expense_details` inner join expenses on expense_details.Expense_id = expenses.id")or die($connection->error);
$liabilitiesList = mysqli_query($connection,"SELECT expense_details.id as id,Name,Party,Total_amount,Paid_amount,Payment_date FROM `expense_details` inner join expenses on expense_details.Expense_id = expenses.id where Due_amount > '0' ")or die($connection->error);
$fastmoving = mysqli_query($connection,"SELECT stock.Name as 'name',SUM(orders.Quantity) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Late_Order) >= DATE_SUB( CURDATE(), INTERVAL 1 WEEK ) AND DATE(orders.Late_Order) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY ) GROUP BY stock.ID ORDER BY sum DESC LIMIT 5")or die($connection->error);
$fastmovingMonth = mysqli_query($connection,"SELECT stock.Name as 'name',SUM(orders.Quantity) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Late_Order) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(orders.Late_Order) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY ) GROUP BY stock.ID ORDER BY sum DESC LIMIT 5")or die($connection->error);
$slowmovingMonth = mysqli_query($connection,"SELECT stock.Name as 'name',SUM(orders.Quantity) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Late_Order) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(orders.Late_Order) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY ) GROUP BY stock.ID ORDER BY sum ASC LIMIT 5")or die($connection->error);
$expensesMonth = mysqli_query($connection,"select expenses.Name as 'name',Party,Paid_amount as'paid',expense_details.Payment_date as 'date',Due_amount as 'due' from expense_details inner join expenses on expense_details.Expense_id=expenses.id where DATE(expense_details.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(expense_details.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY)")or die($connection->error);
$sum = mysqli_query($connection,"SELECT SUM(orders.Quantity) AS 'sumtotal' FROM orders inner join stock on Stock_id = stock.id where DATE(orders.Late_Order) >= DATE_SUB( CURDATE(), INTERVAL 1 WEEK ) AND DATE(orders.Late_Order) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY)")or die($connection->error);
$distributionComparisonToday = mysqli_query($connection,"SELECT customers.deliverer as deliverer,COUNT(DISTINCT Customer_id) as count FROM orders inner join customers on orders.Customer_id = customers.id where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 0 DAY ) GROUP BY customers.deliverer")or die($connection->error);
$distributionTotalToday = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$distributionComparisonYesterday = mysqli_query($connection,"SELECT customers.deliverer as deliverer,COUNT(DISTINCT Customer_id) as count FROM orders inner join customers on orders.Customer_id = customers.id where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 1 DAY) GROUP BY customers.deliverer")or die($connection->error);
$distributionTotalYesterday = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$distributionComparisonTwoDaysAgo = mysqli_query($connection,"SELECT customers.deliverer as deliverer,COUNT(DISTINCT Customer_id) as count FROM orders inner join customers on orders.Customer_id = customers.id where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 2 DAY ) GROUP BY customers.deliverer")or die($connection->error);
$distributionTotalTwoDaysAgo = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 2 DAY )")or die($connection->error);
$distributionComparisonThreeDaysAgo = mysqli_query($connection,"SELECT customers.deliverer as deliverer,COUNT(DISTINCT Customer_id) as count FROM orders inner join customers on orders.Customer_id = customers.id where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 3 DAY) GROUP BY customers.deliverer")or die($connection->error);
$distributionTotalThreeDaysAgo = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 3 DAY )")or die($connection->error);
$distributionComparisonFourDaysAgo = mysqli_query($connection,"SELECT customers.deliverer as deliverer,COUNT(DISTINCT Customer_id) as count FROM orders inner join customers on orders.Customer_id = customers.id where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 4 DAY ) GROUP BY customers.deliverer")or die($connection->error);
$distributionTotalFourDaysAgo = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 4 DAY )")or die($connection->error);
$distributionComparisonFiveDaysAgo = mysqli_query($connection,"SELECT customers.deliverer as deliverer,COUNT(DISTINCT Customer_id) as count FROM orders inner join customers on orders.Customer_id = customers.id where DATE(orders.Created_at) = DATE_SUB( CURDATE(), INTERVAL 5 DAY ) GROUP BY customers.deliverer")or die($connection->error);
$distributionTotalFiveDaysAgo = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) = CURRENT_DATE()-5")or die($connection->error);
$biggestPayers = mysqli_query($connection,"SELECT customers.Name as 'name',(SUM(MPesa)+SUM(Cash)) AS 'sum' FROM orders inner join customers on Customer_id = customers.id  where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(orders.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY ) GROUP BY customers.ID ORDER BY sum DESC LIMIT 5")or die($connection->error);
$salesWk1 = mysqli_query($connection,"SELECT  COALESCE(SUM(stocK.Buying_price*orders.Quantity),0) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) and DATE(orders.Created_at) < DATE_SUB( CURDATE(), INTERVAL 3 WEEK )")or die($connection->error);
$salesWk2 = mysqli_query($connection,"SELECT  COALESCE(SUM(stocK.Buying_price*orders.Quantity),0) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 3 WEEK ) and DATE(orders.Created_at) < DATE_SUB( CURDATE(), INTERVAL 2 WEEK )")or die($connection->error);
$salesWk3 = mysqli_query($connection,"SELECT COALESCE(SUM(stocK.Buying_price*orders.Quantity),0) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 2 WEEK ) and DATE(orders.Created_at) < DATE_SUB( CURDATE(), INTERVAL 1 WEEK )")or die($connection->error);
$salesWk4 = mysqli_query($connection,"SELECT COALESCE(SUM(stocK.Buying_price*orders.Quantity),0) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 WEEK ) and DATE(orders.Created_at) < DATE_SUB( CURDATE(), INTERVAL 1 DAY )")or die($connection->error);
$expensesWk1 = mysqli_query($connection,"SELECT COALESCE(SUM(Paid_amount),0) AS 'sum' FROM expense_details inner join expenses on Expense_id = expenses.id  where DATE(expense_details.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) and DATE(expense_details.Created_at) < DATE_SUB( CURDATE(), INTERVAL 3 WEEK)")or die($connection->error);
$expensesWk2 = mysqli_query($connection,"SELECT COALESCE(SUM(Paid_amount),0) AS 'sum' FROM expense_details inner join expenses on Expense_id = expenses.id  where DATE(expense_details.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 3 WEEK) and DATE(expense_details.Created_at) < DATE_SUB( CURDATE(), INTERVAL 2 WEEK)")or die($connection->error);
$expensesWk3 = mysqli_query($connection,"SELECT COALESCE(SUM(Paid_amount),0) AS 'sum' FROM expense_details inner join expenses on Expense_id = expenses.id  where DATE(expense_details.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 2 WEEK ) and DATE(expense_details.Created_at) < DATE_SUB( CURDATE(), INTERVAL 1 WEEK )")or die($connection->error);
$expensesWk4 = mysqli_query($connection,"SELECT COALESCE(SUM(Paid_amount),0) AS 'sum' FROM expense_details inner join expenses on Expense_id = expenses.id  where DATE(expense_details.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 WEEK) and DATE(expense_details.Created_at) < DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$monthSalesValue = mysqli_query($connection,"SELECT COALESCE(SUM(stocK.Buying_price*orders.Quantity),0) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(orders.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY)")or die($connection->error);
$monthIncomeValue = mysqli_query($connection,"SELECT COALESCE(SUM(MPesa)+SUM(Cash)) AS 'sum' FROM orders  where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(orders.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$monthExpenseValue = mysqli_query($connection,"SELECT COALESCE(SUM(Paid_amount),0) AS 'sum' FROM expense_details inner join expenses on Expense_id = expenses.id  where DATE(expense_details.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(expense_details.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY)")or die($connection->error);
$lastmonthSalesValue = mysqli_query($connection,"SELECT COALESCE(SUM(stocK.Buying_price*orders.Quantity),0) AS 'sum' FROM orders inner join stock on Stock_id = stock.id  where DATE(orders.Created_at) < DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) and DATE(orders.Created_at) > DATE_SUB( CURDATE(), INTERVAL 2 MONTH )")or die($connection->error);
$lastmonthIncomeValue = mysqli_query($connection,"SELECT COALESCE(SUM(MPesa)+SUM(Cash)) AS 'sum' FROM orders  where DATE(orders.Created_at) < DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) and DATE(orders.Created_at) > DATE_SUB( CURDATE(), INTERVAL 2 MONTH )")or die($connection->error);
$lastmonthExpenseValue = mysqli_query($connection,"SELECT COALESCE(SUM(Paid_amount),0) AS 'sum' FROM expense_details inner join expenses on Expense_id = expenses.id  where DATE(expense_details.Created_at) < DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) and DATE(expense_details.Created_at) > DATE_SUB( CURDATE(), INTERVAL 2 MONTH )")or die($connection->error);
$salariesTotal = mysqli_query($connection,"select sum(salary) as salaries from users")or die($connection->error);
$customersTotalMonth = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(orders.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$customersTotalLastMonth = mysqli_query($connection,"SELECT COUNT(DISTINCT Customer_id) as count FROM orders where DATE(orders.Created_at) < DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) and DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 2 MONTH )")or die($connection->error);
$newCustomersMonth = mysqli_query($connection,"SELECT Name, Location,(SUM(orders.MPesa)+SUM(orders.Cash)) AS 'sum' FROM customers inner join orders on customers.id = orders.Customer_id where DATE(customers.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(customers.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$newCustomersMonthCount = mysqli_query($connection,"SELECT COUNT(id) as count FROM customers where DATE(customers.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(customers.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$delivererSalesMonth = mysqli_query($connection,"select customers.Deliverer as 'deliverer', (SUM(MPesa)+SUM(Cash)) AS 'sum', SUM(orders.Quantity*stock.Price) as 'worth' from orders inner join customers on orders.Customer_id = customers.id inner join stock on Stock_id = stock.id where DATE(orders.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH ) AND DATE(orders.Created_at) <= DATE_SUB( CURDATE(), INTERVAL 0 DAY ) group by deliverer")or die($connection->error);
$monthLiability = mysqli_query($connection,"select SUM(Due_amount) as 'sum' from expense_details where DATE(expense_details.Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH) and DATE(expense_details.Created_at) < DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$totalLiability = mysqli_query($connection,"select SUM(Due_amount) as 'sum' from expense_details")or die($connection->error);
$newSuppliersCountMonth = mysqli_query($connection,"select COALESCE(COUNT(id)) as 'count' from suppliers where DATE(Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH) and DATE(Created_at) < DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$newSuppliersDetailsMonth = mysqli_query($connection,"select Name, Supplier_contact as 'contact' from suppliers where DATE(Created_at) >= DATE_SUB( CURDATE(), INTERVAL 1 MONTH) and DATE(Created_at) < DATE_SUB( CURDATE(), INTERVAL 0 DAY )")or die($connection->error);
$vehicleFullDetails = mysqli_query($connection,"select firstname,lastname,Type,Reg_Number,Route,Last_Inspection,vehicle_inspection.notes as 'inspectionNotes',Next_Inspection,Last_service,vehicle_service.notes as 'serviceNotes',Next_service from vehicles inner join users on vehicles.Driver_id = users.id inner join vehicle_inspection on vehicles.id = vehicle_inspection.Vehicle_id inner join vehicle_service on vehicles.id = vehicle_service.Vehicle_id")or die($connection->error);
 ?>

