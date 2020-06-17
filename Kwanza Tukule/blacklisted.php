<?php
 include "admin_nav.php";
 include('config.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Customers</span> <span style="font-size: 15px;">/Blacklisted</span></h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="#"><i class="fa fa-users fa-2x"></i>&emsp;Customers</a> 
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
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="sales.php"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
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
      <a href="customers.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
      <?php
       $result = mysqli_query($connection,"SELECT * FROM customers WHERE `status`='blacklisted'");
        $blacklistedrowcount = mysqli_num_rows($result);
      ?>
      <h6 style="margin-left: 300px;">Total Number: <?php echo $blacklistedrowcount; ?></h6>
    </div><br>
    <table class="table table-striped table-hover" style="display:block; height:527px;overflow-y:scroll;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="25%">Name</th>
      <th scope="col" width="15%">Location</th>
      <th scope="col" width="15%">Contact Number</th>
      <th scope="col" width="10%">Deliverer</th>
      <th scope="col" width="10%">Balance</th>
      <th scope="col"width="15%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;    
        $result = mysqli_query($connection,"SELECT Name,Location,Number,Deliverer,Balance FROM orders INNER JOIN customers ON orders.Customer_id=customers.id WHERE orders.Created_at IN (SELECT MAX(orders.id) FROM orders INNER JOIN customers ON orders.Customer_id=customers.id where customers.Status='blacklisted'  GROUP BY customers.id );");
        foreach($result as $row){
         $count++;
         $name = $row['Name'];
        $location = $row['Location'];
        $number = $row['Number'];
        $deliverer = $row['Deliverer'];
        $balance = $row['Balance'];
      ?>
    <tr>
      <th scope="row"><?php echo $name; ?></th>
      <td><?php echo $location; ?></td>
      <td><?php echo $number; ?></td>
      <td><?php echo $deliverer; ?></td>
      <td><?php echo $balance; ?></td>
       <td><a href="#" class="btn btn-success btn-sm active" role="button" aria-pressed="true">Restore</a>
       <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" ><i class="fa fa-user-times"></i>Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>


  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 