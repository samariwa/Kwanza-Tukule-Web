<?php
 include "admin_nav.php";
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Sales</span></h1>
            <a href="categories.php" class="btn btn-light btn-md active" role="button" aria-pressed="true" style="margin-left: 220px;"><i class="fa fa-print"></i>&ensp;Print</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="customers.php"><i class="fa fa-users fa-2x"></i>&emsp;Customers</a> 
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="stock.php"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="#"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="summary.php"><i class="fa fa-clipboard fa-2x"></i>&emsp;Summary</a>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
          </div>
      <div class="row">
      <a href="#" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;"><i class="fa fa-plus-circle"></i>&ensp;New Order</a>
      <a href="blacklisted.php" class="btn btn-warning btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;">Goods Distribution</a>
      <?php
       $result = mysqli_query($connection,"SELECT * FROM orders ");
        $ordersrowcount = mysqli_num_rows($result);
      ?>
      <h6 style="margin-left: 130px;">Total Number: <?php echo $ordersrowcount; ?></h6>
      <a href="blacklisted.php" class="btn btn-dark btn-md active" role="button" aria-pressed="true" style="margin-left: 130px;">Gate Pass</a>
      <a href="blacklisted.php" class="btn btn-info btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;">Returned Goods</a>
    </div><br>    
    <table class="table table-striped table-hover" style="display:block; height:500px;overflow-y:scroll;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="10%">#</th>
      <th scope="col" width="40%">Name</th>
      <th scope="col" width="15%">Contact No.</th>
      <th scope="col" width="40%">Product</th>
      <th scope="col"width="10%">Quantity</th>
      <th scope="col"width="10%">Price</th>
      <th scope="col"width="10%">C/F/Debt</th>
      <th scope="col"width="10%">MPesa</th>
      <th scope="col"width="10%">Cash</th>
      <th scope="col"width="10%">Fine</th>
      <th scope="col"width="10%">Balance</th>
      <th scope="col"width="15%">Delivery Date</th>
      <th scope="col"width="10%">Returned</th>
      <th scope="col"width="10%">Banked</th>
      <th scope="col"width="10%">Slip No.</th>
      <th scope="col"width="10%">Banked By</th>
      <th scope="col"width="20%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        $result = mysqli_query($connection,"SELECT orders.id AS id,customers.Name AS Name, Number,stock.Name AS name, Quantity,Debt,MPesa,Cash,Fine,Balance,Late_Order,Returned,Banked,Slip_Number,Banked_By FROM orders INNER JOIN customers ON orders.Customer_id=customers.id INNER JOIN stock ON orders.Stock_id=stock.id ORDER BY orders.id ASC ;");
        foreach($result as $row){
         $count++;
         $id = $row['id'];
        $name = $row['Name'];
        $contact = $row['Number'];
        $product = $row['name'];
        $qty = $row['Quantity'];
        $price = $row['Price'];
        $cost = $qty * $price;
        $debt = $row['Debt'];
        $mpesa = $row['MPesa'];
        $cash = $row['Cash'];
        $fine = $row['Fine'];
        $balance = $row['Balance'];
        $delivery_date = $row['Late_Order'];
        $returned = $row['Returned'];
        $banked = $row['Banked'];
        $slip = $row['Slip_Number'];
        $banked_by = $row['Banked_By'];
      ?>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $name; ?></td>
      <td><?php echo $contact; ?></td>
      <td><?php echo $product; ?></td>
      <td><?php echo $qty; ?></td>
      <td><?php echo $cost; ?></td>
      <td><?php echo $debt; ?></td>
      <td><?php echo $mpesa; ?></td>
      <td><?php echo $cash; ?></td>
      <td><?php echo $fine; ?></td>
      <td><?php echo $balance; ?></td>
      <td><?php echo $delivery_date; ?></td>
      <td><?php echo $returned; ?></td>
      <td><?php echo $banked; ?></td>
      <td><?php echo $slip; ?></td>
      <td><?php echo $banked_by; ?></td>
       <td><a href="#" class="btn btn-dark btn-sm active" role="button" aria-pressed="true">Fine</a>
       <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" ><i class="fa fa-user-times"></i>Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 