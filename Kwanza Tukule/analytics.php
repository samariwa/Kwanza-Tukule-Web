<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Analytics</span></h1>
           <h6 class="h6 mb-0 text-gray-600 mr-3">Time: <span id="time"></span></h6>
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
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="stock.php" style="text-decoration: none;"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
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
 
<br>
<h4>Stock Flow</h4>
  <div class="row offset-3"> <h6>Purchase records shown are as at the end of day yesterday.</h6></div><br>
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
      <th scope="col"width="10%">Opening Stock (Today)</th>
      <th scope="col"width="10%">Closing Stock (Now)</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($stockFlowQuery as $row){
         $count++;
         $id = $row['sid'];
         $name = $row['sname'];
        $sum1 = $row['sum1'];
        $sum2 = $row['sum2'];
        $sum3 = $row['sum3'];
        $sum4 = $row['sum4'];
        $sum5 = $row['sum5'];
        $opening = $row['Opening_stock'];
        $closing = $row['Quantity'];
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
      <td ><?php echo $closing; ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<br>
<h4>Sales Per Deliverer</h4>
  <div id="chart_div" style="width: 1000px; height: 500px;" ></div>   
<br>
<div class="row">
  <div class="col-md-6">
    <h4>Brand Sales Comparison</h4>
  </div>
  <div class="col-md-6">
    <h4>Expenditure</h4>
  </div>
</div>
<div class="row">
  <div id="piechart" style="width: 420px; height: 400px;"></div>   
<div id="barchart_values" style="width: 500px; height: 400px;"></div>
</div>
<br>
<div class="row">
  <div class="col-md-6">
    <h4>Key Customers</h4>
  </div>
  <div class="col-md-6">
    <h4>Company Performance</h4>
  </div>
</div>
<div class="row">
    <div id="keyCutomersChart" style="width: 430px; height: 400px;"></div>
    <div id="chart_divide" style="width: 600px; height: 400px;"></div>    
</div>  
<br>
<div class="row">
  <div class="col-md-6">
    <h4>Sales Performance</h4>
  </div>
 <div id="curve_chart" style="width: 1100px; height: 500px"></div>
</div>
<br>
<div class="row">
  <div class="col-md-6">
    <h4>Profit / Loss</h4>
  </div>
</div>
<div class="row">
    <div id="profitchart" style="width: 1200px; height: 600px;"></div>   
</div>  
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 