<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Sales </span><span style="font-size: 15px;">/Returned Goods</span></h1>
           <h6 class="h6 mb-0 text-gray-600 mr-3">Time: <span id="time"></span></h6>
          </div>
         <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="customers.php" style="text-decoration: none;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <i class="fa fa-users fa-2x"></i>&emsp;Customers
                    </div>
                  </div>
                </div>
                </a> 
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="stock.php" style="text-decoration: none;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <i class="fa fa-cubes fa-2x"></i>&emsp;Stock
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="sales.php" style="text-decoration: none;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="summary.php" style="text-decoration: none;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <i class="fa fa-clipboard fa-2x"></i>&emsp;Summary
                    </div>   
                  </div>
                </div>
                </a>
              </div>
            </div>
          </div>
           <?php
              }else{
           ?>
             <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="customers.php" style="text-decoration: none;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <i class="fa fa-users fa-2x"></i>&emsp;Customers
                    </div>
                  </div>
                </div>
                </a> 
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="stock.php" style="text-decoration: none;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <i class="fa fa-cubes fa-2x"></i>&emsp;Stock
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="#" style="text-decoration: none;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>

          </div>
            <?php
          }
        ?>
   <div class="row">
     <div class="col-md-4">
          <a href="sales.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
    </div>
    <div class="col-md-8">
      <?php
        $returnedrowcount = mysqli_num_rows($returnedList);
      ?>
      <h6 class="offset-2">Total Number: <?php echo $returnedrowcount; ?></h6>
    </div>
    </div>
    <div class="row">
      <div class="offset-5">Goods Returned for Today's Orders</div>
    </div><br>
    <table  class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" >Order #</th>
      <th scope="col">Customer</th>
      <th scope="col" >Contact</th>
      <th scope="col">Deliverer</th>
      <th scope="col">Category</th>
      <th scope="col">Product</th>
      <th scope="col">Qty Ordered</th>
      <th scope="col">Qty Taken</th>
      <th scope="col">Qty Returned</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;    
        foreach($returnedList as $row){
         $count++;
          $id = $row['id'];
         $customer = $row['customer'];
        $number = $row['number'];
        $deliverer = $row['deliverer'];
        $category = $row['category'];
        $stock = $row['stock'];
        $ordered = $row['ordered'];
        $returned = $row['returned'];
        $initial = $ordered + $returned;
      ?>
    <tr>
      <th scope="row" ><?php echo $id; ?></th>
      <td ><?php echo $customer; ?></td>
      <td ><?php echo $number; ?></td>
      <td ><?php echo $deliverer; ?></td>
      <td ><?php echo $category; ?></td>
      <td ><?php echo $stock; ?></td>
      <td ><?php echo $initial; ?></td>
      <td ><?php echo $ordered; ?></td>
      <td ><?php echo $returned; ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<div class="row">
<div class="col-md-8">
      <?php
        $extrareturnedrowcount = mysqli_num_rows($extraReturnedList);
      ?>
      <h6 class="offset-2">Total Number: <?php echo $extrareturnedrowcount; ?></h6>
    </div>
    </div>
    <div class="row">
      <div class="offset-5">Goods Returned from Today's Sales Made</div>
    </div><br>
    <table  class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" >Order #</th>
      <th scope="col">Sales Person</th>
      <th scope="col" >Contact</th>
      <th scope="col">Category</th>
      <th scope="col">Product</th>
      <th scope="col">Qty Ordered</th>
      <th scope="col">Qty Taken</th>
      <th scope="col">Qty Returned</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;    
        foreach($extraReturnedList as $row){
         $count++;
          $id = $row['id'];
         $name1 = $row['firstname'];
         $name2 = $row['lastname'];
        $number = $row['number'];
        $category = $row['category'];
        $stock = $row['stock'];
        $ordered = $row['ordered'];
        $returned = $row['returned'];
        $initial = $ordered + $returned;
      ?>
    <tr>
      <th scope="row" ><?php echo $id; ?></th>
      <td ><?php echo $firstname.' '.$lastname; ?></td>
      <td ><?php echo $number; ?></td>
      <td ><?php echo $category; ?></td>
      <td ><?php echo $stock; ?></td>
      <td ><?php echo $initial; ?></td>
      <td ><?php echo $ordered; ?></td>
      <td ><?php echo $returned; ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 