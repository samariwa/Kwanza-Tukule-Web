<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Gate Pass</span></h1>
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

          <div class="row">
      <a href="sales.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
    </div><br><br>

        <h6 style="margin-left: 50px;margin-right: 50px;">To print tomorrow's gate pass, enter deliverer's name and click the 'Print button'. Otherwise include point in time from which the gate pass should be printed.</h6><br>

        <div class="row">
                 <select type="text" name="deliverer" id="deliverer" class="form-control col-md-5" style="padding-right:15px;padding-left:15px;margin-left: 275px" required onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                  <option value="" selected="selected" disabled>Deliverer...</option>
                  <?php
                    $count = 0;
                    foreach($deliverersStaffList as $row){
                     $count++;
                    $driver = $row['firstname'];
                  ?>
                   <option value="<?php echo $driver; ?>"><?php echo $driver; ?></option>
                  <?php
                    }
                  ?>
                 </select>
                  </div><br><br>

        <div class="row">
           <div class="input-group mb-3" style="margin-left: 270px;">
          <div class="input-group-prepend" >
           <span class="input-group-text" id="inputGroup-sizing-default">Point in Time:</span>
           </div>
         <input type="text" class="form-control col-md-5" aria-label="Default" aria-describedby="inputGroup-sizing-default" style="font-family: FontAwesome, Arial; font-style: normal;"  name="time" id="gatePassTime">
       </div>
        </div><br>

        <div class="row">
           <button class="btn btn-light btn-md active printGatePass" role="button" aria-pressed="true" style="margin-left: 450px;"><i class="fa fa-print"></i>&ensp;Print</button>
        </div><br><br>
       
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 