<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Users</span></h1>
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
          <a href="dashboard.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
        </div><br>
         <div class="row" style="margin-left: 50px">
           <h2>Users</h2>
           <?php
             $usersrowcount = mysqli_num_rows($usersList);
           ?>
      <h6 style="margin-left: 300px;">Total Number: <?php echo $usersrowcount; ?></h6>
         </div>
          <div class="row" style="margin-left: 50px">
           <h5><u>Active</u></h5>
         </div><br>
         <div  style="margin-left: 50px;margin-top: -30px;">
           <?php 
           $count = 0;
           foreach($usersList as $row){
            $count++;
             $name = $row['username'];
            $activity = $row['on'];
            $lastActivity = $row['lastActivity'];
               if ($activity == 1) {
                echo "<img src='assets/img/onIcon.png' height='15' width='13' style='margin-top:0px;'>&emsp;" . $name . '<br/><br/>';
                 
               }
             }
            ?>
         </div>
         <div class="row" style="margin-left: 50px">
           <h5><u>Inactive</u></h5>
         </div>
         <div  style="margin-left: 50px;margin-top: 0px;">
           <?php 
           $count2 = 0;
           foreach($usersList as $row){
            $count2++;
             $name = $row['username'];
            $activity = $row['on'];
            $lastActivity = $row['lastActivity'];
            $date = date( 'l, F d, Y h:i A', strtotime($lastActivity) );
            $day = date('d.m.Y',strtotime($lastActivity));
            $yesterday = date('d.m.Y',strtotime("-1 days"));  
            $time = date("h:i A",strtotime($lastActivity));  
            $today = date('d.m.Y', time());
               if ($activity == 0 && $day == $yesterday ) {
                echo "<img src='assets/img/offIcon.png' height='15' width='15' style='margin-top:0px;'>&emsp;" . $name . "&emsp;Last Seen: Yesterday $time<br/><br/>";    
               } if($activity == 0 && $day == $today){
                echo "<img src='assets/img/offIcon.png' height='15' width='15' style='margin-top:0px;'>&emsp;" . $name . "&emsp;Last Seen: $time<br/><br/>"; 
               }if($activity == 0 && $day < $yesterday){
                echo "<img src='assets/img/offIcon.png' height='15' width='15' style='margin-top:0px;'>&emsp;" . $name . "&emsp;Last Seen: $date<br/><br/>"; 
               }
             }
            ?>
         </div>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 