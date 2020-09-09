<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 
 <!-- Begin Page Content -->
        <div class="container-fluid">
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Goods Distribution</span></h1>
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
                      <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="customers" style="text-decoration: none;"><i class="fa fa-users fa-2x"></i>&emsp;Customers</a> 
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
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="stock" style="text-decoration: none;"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
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
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="sales" style="text-decoration: none;"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
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
                      <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="summary" style="text-decoration: none;"><i class="fa fa-clipboard fa-2x"></i>&emsp;Summary</a>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
          </div>

         <div class="row">
      <a href="sales" class="btn btn-primary btn-md active float-left ml-3" role="button" aria-pressed="true"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
    </div><br><br>
     <div class="row">
      <div class="col-md-10 offset-1">
        <h6 class="col-md-10 offset-1">To print tomorrow's distribution list, enter deliverer's name and click the 'Print button'. Otherwise include point in time from which the distribution list should be printed.</h6><br>
        </div>
     </div>
        <div class="row">
          <div class="col-md-7 offset-2">
                 <select type="text" name="deliverer" id="deliverer" class="form-control col-md-12 " style="padding-right:15px;padding-left:15px;" required onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
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
                 </div>
                  </div><br><br>

        <div class="row">
          <div class="col-md-7 offset-2">
           <div class="input-group mb-3">
          <div class="input-group-prepend" >
           <span class="input-group-text" id="inputGroup-sizing-default">Point in Time:</span>
           </div>
         <input type="text" class="form-control col-md-12" aria-label="Default" aria-describedby="inputGroup-sizing-default" style="font-family: FontAwesome, Arial; font-style: normal;"  name="time" id="distributionTime">
       </div>
       </div>
        </div><br>

        <div class="row">
          <div class="col-md-2 offset-5">
           <button class="btn btn-light btn-md active printDistribution" role="button" aria-pressed="true"><i class="fa fa-print"></i>&ensp;Print</button>
         </div>
        </div><br><br>

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 