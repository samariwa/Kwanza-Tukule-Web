<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 
 <!-- Begin Page Content -->
        <div class="container-fluid">
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Staff</span><span style="font-size: 15px;"> /Employee Payroll</span><span style="font-size: 12px;"> /NHIF Rates</span></h1>
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

         <div class="row">
          <div class="col-md-2">
            <a href="payroll.php" class="btn btn-primary btn-md active float-left ml-3" role="button" aria-pressed="true"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
            </div>
            <div class="col-md-8">
              <h6 class="offset-4">Latest NHIF Deductable Rates Issued.</h6>
            </div>
    </div><br>
    
        <table  class="table table-striped table-hover" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="5%">Select</th>
      <th scope="col" width="3%">Staff #</th>
      <th scope="col" width="14%">Name</th>
      <th scope="col" width="12%">Gross Income</th>
      <th scope="col" width="17%">KRA Deduction</th>
      <th scope="col" width="10%">NSSF Deduction</th>
      <th scope="col"width="10%">NHIF Deduction</th>
      <th scope="col"width="10%">Payable Income</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($employeesList as $row){
         $count++;
         $id = $row['staffID'];
         $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $salary = $row['salary'];
        $KRA = $row['KRA'];
        $NSSF = $row['NSSF'];
        $NHIF = $row['NHIF'];
        $kra = 0;
        if($KRA != ''){
        if ($salary > 0 && $salary <= 24000) {
          $kra = 0.1 * $salary;
        }
        else if ($salary >= 24001 && $salary <= 40667) {
          $kra = 0.15 * $salary;
        }
        else if ($salary >= 40668 && $salary <= 57333) {
          $kra = 0.2 * $salary;
        }
        else if ($salary >= 57334 ) {
          $kra = 0.25 * $salary;
        }
        }
        $nssf = 0;
        if($NSSF != ''){
        if ($salary > 0 && $salary < 3000) {
          $nssf = 0;
        }
        else if ($salary >= 3000 && $salary < 4500) {
          $nssf = 180;
        }
        else if ($salary >= 4500 && $salary < 6000) {
          $nssf = 270;
        }
        else if ($salary >= 6000 ) {
          $nssf = 360;
        }
        }
        $nhif = 0;
        if($NHIF != ''){
        if ($salary > 0 && $salary <= 5999) {
          $nhif = 150;
        }
        else if ($salary >= 6000 && $salary <= 7999) {
          $nhif = 300;
        }
        else if ($salary >= 8000 && $salary <= 11999) {
          $nhif = 400;
        }
        else if ($salary >= 12000 && $salary <= 14999) {
          $nhif = 500;
        }
        else if ($salary >= 15000 && $salary <= 19999) {
          $nhif = 600;
        }
        else if ($salary >= 20000 && $salary <= 24999) {
          $nhif = 750;
        }
        else if ($salary >= 25000 && $salary <= 29999) {
          $nhif = 850;
        }
        else if ($salary >= 30000 && $salary <= 34999) {
          $nhif = 900;
        }
        else if ($salary >= 35000 && $salary <= 39999) {
          $nhif = 950;
        }
        else if ($salary >= 40000 && $salary <= 44999) {
          $nhif = 1000;
        }
        else if ($salary >= 45000 && $salary <= 49999) {
          $nhif = 1100;
        }
        else if ($salary >= 50000 && $salary <= 59999) {
          $nhif = 1200;
        }
        else if ($salary >= 60000 && $salary <= 69999) {
          $nhif = 1300;
        }
        else if ($salary >= 70000 && $salary <= 79999) {
          $nhif = 1400;
        }
        else if ($salary >= 80000 && $salary <= 89999) {
          $nhif = 1500;
        }
        else if ($salary >= 90000 && $salary <= 99999) {
          $nhif = 1600;
        }
        else if ($salary >= 100000 ) {
          $nhif = 1700;
        }
        }
        $net = $salary - $kra - $nssf - $nhif;
      ?>
    <tr>
      <td ><input type="radio" id='selectedCustomer' onclick="selectCustomer(this);" name="selectedCustomer" value="<?php echo $id; ?>"></td>
      <th scope="row" id="id<?php echo $id; ?>"><?php echo $id; ?></th>
      <td id="name<?php echo $id; ?>"><?php echo $firstname .' '. $lastname; ?></td>
      <td id="gross<?php echo $id; ?>">Kshs. <?php echo $salary ?></td>
      <td id="kra<?php echo $id; ?>">Kshs. <?php echo $kra; ?></td>
      <td id="nssf<?php echo $id; ?>">Kshs. <?php echo $nssf; ?></td>
      <td id="nhif<?php echo $id; ?>">Kshs. <?php echo $nhif; ?></td>
      <td id="net<?php echo $id; ?>">Kshs. <?php echo $net; ?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table><br>
        <div class="row">
          <div class="col-md-2 offset-5">
           <button class="btn btn-success btn-block active printPayslip" role="button" aria-pressed="true"><i class="fa fa-print"></i>&ensp;Print Pay Slip</button>
         </div>
        </div><br><br>

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 