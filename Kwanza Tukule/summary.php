<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

 <!-- Begin Page Content -->
        <div class="container-fluid"> 

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Summary</span></h1>
           <h6 class="h6 mb-0 text-gray-600 mr-3">Time: <span id="time"></span></h6>
          </div>

         <div class="row">

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

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="#" style="text-decoration: none;"><i class="fa fa-clipboard fa-2x"></i>&emsp;Summary</a>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>
        <?php 
        $yesterday = date( 'l, F d, Y', strtotime("yesterday"));
        $row = mysqli_fetch_array($salesYesterday);
        if ($row['Sales_yesterday'] > "0") {
          $salesYesterday = $row['Sales_yesterday'];
        }
        else{
          $salesYesterday = "0.00";
        }
        $row1 = mysqli_fetch_array($revenueYesterday);
        if ($row1['Revenue_yesterday'] > "0") {
        $revenueYesterday = $row1['Revenue_yesterday'];
         }
        else{
          $revenueYesterday = "0.00";
        }
        $row2 = mysqli_fetch_array($mpesaYesterday);
         if ($row2['Mpesa_yesterday'] > "0") {
        $mpesaYesterday = $row2['Mpesa_yesterday'];
        }
         else{
          $mpesaYesterday = "0.00";
        }
        $row3 = mysqli_fetch_array($cashYesterday);
        if ($row3['Cash_yesterday'] > "0") {
        $cashYesterday = $row3['Cash_yesterday'];
         }
        else{
          $cashYesterday = "0.00";
        }
        $row4 = mysqli_fetch_array($mpesaDebt);
        if ( $row4['Mpesa_debt'] > "0") {
       $mpesaDebt = $row4['Mpesa_debt']; 
         }
        else{
          $mpesaDebt = "0.00";
        }
        $row5 = mysqli_fetch_array($cashDebt);
         if ( $row5['Cash_debt'] > "0") {
        $cashDebt = $row5['Cash_debt'];
         }
        else{
          $cashDebt = "0.00";
        }
        $row6 = mysqli_fetch_array($bankedYesterday);
        if ( $row6['Banked_yesterday'] > "0") {
        $bankedYesterday = $row6['Banked_yesterday'];
        }
        else{
          $bankedYesterday = "0.00";
        }
         $row7 = mysqli_fetch_array($expenditureYesterday);
        if ( $row6['Banked_yesterday'] > "0") {
        $expenditureYesterday = $row7['paid'];
        }
        else{
          $expenditureYesterday = "0.00";
        }
        ?>
        <div class="row" style="margin-left: 50px;"><h5>Summary for <?php echo $yesterday; ?></h5> </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Sales Value: Ksh. <?php echo $salesYesterday; ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Revenue Realized: Ksh. <?php echo $revenueYesterday; ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Paid via M-Pesa for Yesterday's Sales: Ksh. <?php echo $mpesaYesterday; ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Paid in Cash for Yesterday's Sales: Ksh. <?php echo $cashYesterday; ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Debt Paid via M-Pesa: Ksh. <?php echo $mpesaDebt; ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Debt Paid in Cash: Ksh. <?php echo $cashDebt; ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Banked: Ksh. <?php echo $bankedYesterday; ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Expenditure: Ksh. <?php echo $expenditureYesterday; ?></h6>
        </div><br>
        
        

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 
         