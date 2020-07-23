
<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">
             <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Sales</span></h1>
                        <h6 style="margin-right: -760px;">Time: <span id="time"></span></h6>
            <button class="btn btn-light btn-md active printSales" role="button" aria-pressed="true" style="margin-left: 220px;"><i class="fa fa-print"></i>&ensp;Print</button>
          </div>
          <?php
       }
       else{
        ?>
         <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <h6 style="margin-right: 20px;">Time: <span id="time"></span></h6>
          </div>
        <?php
         }
        ?>
           <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
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
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="#" style="text-decoration: none;"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
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
           <?php
              }else{
           ?>
             <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="#" style="text-decoration: none;"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
            <?php
          }
        ?>
          <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
      <div class="row">
      <a href="addOrder.php" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;"><i class="fa fa-plus-circle"></i>&ensp;New Order</a>
      <a href="distribution.php" class="btn btn-warning btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;">Goods Distribution</a>
      <?php
        $ordersrowcount = mysqli_num_rows($salesList);
      ?>
      <h6 style="margin-left: 130px;">Total Number: <?php echo $ordersrowcount; ?></h6>
      <a href="gatePass.php" class="btn btn-dark btn-md active" role="button" aria-pressed="true" style="margin-left: 130px;">Gate Pass</a>
      <a href="returned.php" class="btn btn-info btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;">Returned Goods</a>
    </div><br> 
     <?php
        }
        else{
        ?>
        <div class="row">
      <a href="addOrder.php" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;"><i class="fa fa-plus-circle"></i>&ensp;New Order</a>
      <?php
        $ordersrowcount = mysqli_num_rows($salesList);
      ?>
      <h6 style="margin-left: 280px;">Total Number: <?php echo $ordersrowcount; ?></h6>
      <a href="returned.php" class="btn btn-info btn-md active" role="button" aria-pressed="true" style="margin-left: 290px;">Returned Goods</a>
    </div><br> 
        <?php
        }
        ?>
    <table id="salesEditable" class="table table-striped table-hover table-responsive  paginate" style="display:block;overflow-x:scroll;overflow-y:scroll;text-align: center;">
      <caption>Sales Done Today</caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="5%">#</th>
      <th scope="col" width="5%">Name</th>
      <th scope="col" width="10%">Contact No.</th>
      <th scope="col" width="20%">Product</th>
      <th scope="col"width="5%">Quantity</th>
      <th scope="col"width="5%">Cost</th>
      <th scope="col"width="5%">C/F/Debt</th>
      <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
      <th scope="col"width="5%">MPesa</th>
      <th scope="col"width="5%">Cash</th>
      <th scope="col"width="5%">Fine</th>
      <th scope="col"width="5%">Balance</th>
      <th scope="col"width="5%">Delivery Date</th>
      <th scope="col"width="5%">Returned</th>
      <th scope="col"width="5%">Banked</th>
      <th scope="col"width="5%">Slip No.</th>
      <th scope="col"width="5%">Banked By</th>
      <th scope="col"width="30%"></th>
      <?php
       }
      ?>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($salesList as $row){
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
        $balance = ($mpesa + $cash) + $debt - $cost + $fine;
        $delivery_date = $row['Late_Order'];
        $returned = $row['Returned'];
        $banked = $row['Banked'];
        $slip = $row['Slip_Number'];
        $banked_by = $row['Banked_By'];
      ?>
    <tr>
      <th scope="row" class="uneditable" id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <?php
        if ($balance == "0.0" ) {
       ?>
      <td style = "background-color: #2ECC71;color: white"class="uneditable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <?php
       }
      ?>
      <?php
        if ($balance  < "0.0" && $balance  >= "-100.0" ) {
       ?>
      <td style = "background-color: grey;color: white"class="uneditable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <?php
       }
      ?>
      <?php
        if ($balance > "0.0" ) {
       ?>
      <td style = "background-color: orange;color: white"class="uneditable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <?php
       }
      ?>
      <?php
        if ($balance < "-100.0" ) {
       ?>
      <td style = "background-color: red;color: white"class="uneditable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <?php
       }
      ?>
      <td class="uneditable" id="number<?php echo $count; ?>"><?php echo $contact; ?></td>
      <td class="uneditable" id="product<?php echo $count; ?>"><?php echo $product; ?></td>
      <td class="editable" id="qty<?php echo $count; ?>"><?php echo $qty; ?></td>
      <td class="uneditable" id="cost<?php echo $count; ?>"><?php echo $cost; ?></td>
      <td class="uneditable" id="debt<?php echo $count; ?>"><?php echo $debt; ?></td>
       <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
      <td class="editable" id="mpesa<?php echo $count; ?>"><?php echo $mpesa; ?></td>
      <td class="editable" id="cash<?php echo $count; ?>"><?php echo $cash; ?></td>
      <td class="uneditable" id="fine<?php echo $count; ?>"><?php echo $fine; ?></td>
      <td class="uneditable" id="balance<?php echo $count; ?>"><?php echo $balance; ?></td>
      <td class="editable" id="date<?php echo $count; ?>"><?php echo $delivery_date; ?></td>
      <td class="uneditable" id="returned<?php echo $count; ?>"><?php echo $returned; ?></td>
      <td class="editable" id="banked<?php echo $count; ?>"><?php echo $banked; ?></td>
      <td class="editable" id="slip<?php echo $count; ?>"><?php echo $slip; ?></td>
      <td class="editable" id="banker<?php echo $count; ?>"><?php echo $banked_by; ?></td>
       <td>
         <button id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-dark btn-sm active fineCustomer" onclick="fineCustomer(<?php echo $id; ?>)"role="button" aria-pressed="true" >Fine</button>
          <?php
       if ($view == 'Software'  || $view == 'CEO') {

        ?>
          <button id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-danger btn-sm active deleteOrder" role="button" aria-pressed="true" ><i class="fa fa-trash"></i>&ensp;Delete</button>
          <?php
          }
          ?>
       </td>
       <?php
         }
       ?>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 