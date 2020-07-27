<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span><span style="font-size: 15px;"> /Stock Valuation</span></h1>
           <h6 style="margin-right: 30px;">Time: <span id="time"></span></h6>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="customers.php" style="text-decoration: none;"><i class="fa fa-users fa-2x"></i>&emsp;Customers</a> 
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
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#" style="text-decoration: none;"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
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
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="sales.php" style="text-decoration: none;"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
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
                      <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="summary.php" style="text-decoration: none;"><i class="fa fa-clipboard fa-2x"></i>&emsp;Summary</a>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
      <a href="stock.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
    </div><br>
    <div class="row"> <h6 style="margin-left: 100px;">The default valuation is done from today backwards. Purchase records shown are as at the end of day yesterday.</h6></div><br>
    <?php
     $yesterday1 = date('d/m/Y',strtotime('-2 day'));
     $yesterday2 = date('d/m/Y',strtotime('-3 day'));
     $yesterday3 = date('d/m/Y',strtotime('-4 day'));
    ?>
    <table  class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="3%">#</th>
      <th scope="col" width="14%">Brand Name</th>
      <th scope="col" width="10%"><?php echo $yesterday3; ?></th>
      <th scope="col" width="10%"><?php echo $yesterday2; ?></th>
      <th scope="col" width="10%"><?php echo $yesterday1; ?></th>
      <th scope="col"width="10%">Yesterday</th>
      <th scope="col"width="10%">Today</th>
      <th scope="col"width="10%">Opening Stock</th>
      <th scope="col"width="10%">Purchases</th>
      <th scope="col"width="10%">Closing Stock</th>
      <th scope="col"width="10%">Selling Price</th>
      <th scope="col"width="10%">Buying Price</th>
      <th scope="col"width="10%">Stock Value</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($valuationQuery as $row){
         $count++;
         $id = $row['sid'];
         $name = $row['sname'];
        $sum1 = $row['sum1'];
        $sum2 = $row['sum2'];
        $sum3 = $row['sum3'];
        $sum4 = $row['sum4'];
        $sum5 = $row['sum5'];
        $opening = $row['Opening_stock'];
        $purchase = $row['purchased'];
        $closing = $row['Quantity'];
        $sp = $row['Selling_Price'];
        $bp = $row['Buying_price'];
        $value = $bp * $closing;
      ?>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td ><?php echo $name; ?></td>
      <td ><?php echo $sum1; ?></td>
      <td ><?php echo $sum2; ?></td>
      <td ><?php echo $sum3; ?></td>
      <td ><?php echo $sum4; ?></td>
      <td ><?php echo $sum5; ?></td>
      <td ><?php echo $opening; ?></td>
      <td ><?php echo $purchase; ?></td>
      <td ><?php echo $closing; ?></td>
      <td ><?php echo $sp; ?></td>
      <td ><?php echo $bp; ?></td>
      <td ><?php echo $value; ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
        

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 