<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span><span style="font-size: 15px;"> /Stock Shelf Life</span></h1>
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
            <div class="col-xl-4 col-md-6 mb-4">
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

          </div>
            <?php
          }
        ?>
          <div class="row">
      <a href="stock.php" class="btn btn-primary btn-md active float-left ml-3" role="button" aria-pressed="true"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
    </div><br>
     
     <table  class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="10%">Batch #</th>
      <th scope="col" width="40%">Stock Name</th>
      <th scope="col"width="20%">Date Received</th>
      <th scope="col"width="20%">Quantity Purchased</th>
      <th scope="col"width="20%">Quantity Remaining</th>
      <th scope="col"width="40%">Expiry Date</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        $closing = '';
        foreach($shelfLife as $row){
         $count++;
         $id = $row['id'];
        $name = $row['Name'];
        $received = $row['Received_date'];
        $expiry = $row['Expiry_date'];
        $purchased = $row['purchased'];
        $remaining = $row['Qty'];
        if ( $remaining > 0 && $remaining <= $purchased) {
        $closing = $remaining;
      }
        $receivedDate = date("d/m/Y", strtotime($received));
        $expiryDate = date("d/m/Y", strtotime($expiry));
        $previousShelfLife = mysqli_query($connection,"SELECT sfid as id,sid as stockid, purchased,Quantity as Qty, sname as Name,received as Received_date, expiry as Expiry_date, Created_at FROM (SELECT s.id as sid, sf.id as sfid , s.Name as sname ,s.Opening_stock as Opening_stock,sf.purchased as purchased,s.Quantity as Quantity,sf.Selling_price as Selling_Price,sf.Buying_price as Buying_price,sf.Received_date as received, sf.Expiry_date as expiry, sf.Created_at,ROW_NUMBER() OVER (PARTITION BY s.id ORDER BY sf.Created_at DESC) as rn FROM stock s JOIN stock_flow sf ON s.id = sf.Stock_id  ) q WHERE rn = 2 AND sname = '$name'")or die($connection->error);
       if ( $remaining > 0 && $remaining > $purchased) {
        $closing = $purchased;
      ?>
    <tr>
      <th scope="row"  id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td  id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <td  id="received<?php echo $count; ?>"><?php echo $receivedDate; ?></td>
      <td  id="purchased<?php echo $count; ?>"><?php echo $purchased; ?></td>
       <td  id="remaining<?php echo $count; ?>"><?php echo $closing; ?></td>
      <td  id="expiry<?php echo $count; ?>"><?php echo $expiryDate; ?></td>
    </tr>
       <?php
     }
    if ($remaining > $purchased) {
     $count = $count + 1;
      $row2 = mysqli_fetch_array($previousShelfLife);
      $id2 = $row2['id'];
        $name2 = $row2['Name'];
        $received2 = $row2['Received_date'];
        $expiry2 = $row2['Expiry_date'];
        $purchased2 = $row2['purchased'];
        $remaining2 = $remaining - $purchased;
        $receivedDate2 = date("d/m/Y", strtotime($received2));
        $expiryDate2 = date("d/m/Y", strtotime($expiry2));
        ?>
      <tr>
        <th scope="row"  id="id<?php echo $count; ?>"><?php echo $id2; ?></th>
      <td  id="name<?php echo $count; ?>"><?php echo $name2; ?></td>
      <td  id="received<?php echo $count; ?>"><?php echo $receivedDate2; ?></td>
      <td  id="purchased<?php echo $count; ?>"><?php echo $purchased2; ?></td>
       <td  id="remaining<?php echo $count; ?>"><?php echo $remaining2; ?></td>
      <td  id="expiry<?php echo $count; ?>"><?php echo $expiryDate2; ?></td>
    </tr>
    <?php
     }
    }
    ?>
  </tbody>
</table>   

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 