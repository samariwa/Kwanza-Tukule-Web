<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 
 <!-- Begin Page Content -->
        <div class="container-fluid">
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Staff</span><span style="font-size: 15px;"> /Employee Payroll</span><span style="font-size: 12px;"> /KRA Tax Rates</span></h1>
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
              <h6 class="offset-4">Latest PAYE Rates Issued.</h6>
            </div>
    </div><br>
     
        <table  class="table table-striped table-hover" style="overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="60%">Taxable Income Brackets</th>
      <th scope="col" width="40%">Tax Rate</th>
    </tr>
  </thead>
  <tbody >  
    <tr>
      <td>Ksh. 0 - Ksh. 24,000</td>
      <td>10%</td>
    </tr>
    <tr>
      <td>Ksh. 24,001 - Ksh. 40,667</td>
      <td>15%</td>
    </tr>
    <tr>
      <td>Ksh. 40,668 - Ksh. 57,333</td>
      <td>20%</td>
    </tr>
    <tr>
      <td>Ksh. 35,473 - Ksh. 47,059</td>
      <td>25%</td>
    </tr>
    <tr>
      <td>Above Ksh. 57,333</td>
      <td>25%</td>
    </tr>
  </tbody>
</table><br>
        <div class="row">
          <div class="col-md-12 offset-3">
           <p>For more information or queries, <a href="https://www.kra.go.ke/en/individual/filing-paying/types-of-taxes/paye">Visit KRA Website <i class="fa fa-globe"></i></a></p>
         </div>
        </div>

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 