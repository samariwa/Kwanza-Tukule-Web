<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span><span style="font-size: 15px;"> /Stock Valuation</span></h1>
           <h6 class="h6 mb-0 text-gray-600 mr-3">Time: <span id="time"></span></h6>
          </div>

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
                <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#" style="text-decoration: none;">
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

          <div class="row">
      <a href="stock.php" class="btn btn-primary btn-md active float-left ml-3" role="button" aria-pressed="true"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
      <div class="offset-3"> <h6 >Valuation based on live stock flow.</h6></div>
    </div><br>
    <table  class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;" id="valuationTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="3%">Batch #</th>
      <th scope="col" width="14%">Brand Name</th>
      <th scope="col"width="10%">Purchased (Batch)</th>
      <th scope="col"width="10%">Quantity</th>
      <th scope="col"width="10%">Damaged (Batch)</th>
      <th scope="col"width="10%">Buying Price</th>
      <th scope="col"width="10%">Stock Value (Kshs.)</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        $closing = '';
        foreach($valuationQuery as $row){
         $count++;
         $id = $row['sfid'];
         $name = $row['sname'];
        $purchase = $row['purchased'];
        $qty = $row['Quantity'];
         if ($qty <= $purchase) {
        $closing = $qty;
        }
        $damaged = $row['damaged'];
        $bp = $row['Buying_price'];
        $previousValuation = mysqli_query($connection,"WITH qry AS (SELECT  s.id as sid, sf.id as sfid , s.Name as sname ,s.Opening_stock as Opening_stock,sf.Damaged as damaged,sf.purchased as purchased,s.Quantity as Quantity,sf.Buying_price as Buying_price,sf.Received_date as received, sf.Expiry_date as expiry, sf.Created_at,ROW_NUMBER() OVER (PARTITION BY s.id ORDER BY sf.id DESC) as rn FROM stock s JOIN stock_flow sf ON s.id = sf.Stock_id  )SELECT sfid, sname , Buying_price,damaged, purchased,  Quantity ,received FROM qry WHERE rn = 2 AND sname = '$name'")or die($connection->error);
        if ($qty > $purchase) {
          $closing = $purchase;
       }
       $value = $bp * $closing;
      ?>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td ><?php echo $name; ?></td>
      <td ><?php echo $purchase; ?></td>
      <td ><?php echo $closing; ?></td>
      <td ><?php echo $damaged; ?></td>
      <td ><?php echo $bp; ?></td>
      <td id="value<?php echo $count; ?>"><?php echo $value; ?></td>
    </tr>
    <?php
    if ($qty > $purchase) {
      $row2 = mysqli_fetch_array($previousValuation);
      $id2 = $row2['sfid'];
         $name2 = $row2['sname'];
        $purchase2 = $row2['purchased'];
        $damaged2 = $row2['damaged'];
        $bp2 = $row2['Buying_price'];
        $quantity = $qty - $purchase;
        $value2 = $bp2 * $quantity;
        ?>
      <tr>
      <th scope="row"><?php echo $id2; ?></th>
      <td ><?php echo $name2; ?></td>
      <td ><?php echo $purchase2; ?></td>
      <td ><?php echo $quantity; ?></td>
      <td ><?php echo $damaged2; ?></td>
      <td ><?php echo $bp2; ?></td>
      <td ><?php echo $value2; ?></td>
    </tr>
    <?php
    }
    }
    ?>
    <tr>
      <th colspan="6">Total Stock Value</th>
      <td id="totalStockValue"></td>
    </tr>
  </tbody>
</table>
        

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 