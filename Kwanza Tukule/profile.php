<?php
 include "admin_nav.php";
  include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Profile</span></h1>
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
         <br>
        <?php
         $user = $_SESSION['user'];
         $profileQuery = mysqli_query($connection,"SELECT firstname,lastname,number,email,jobs.Name as job,nationalID,staffID,yob,gender,username FROM users INNER JOIN jobs WHERE username = '$user'")or die($connection->error);
          $result = mysqli_fetch_array($profileQuery);
          $firstname = $result['firstname'];
          $lastname = $result['lastname'];
          $number = $result['number'];
          $email = $result['email'];
          $job = $result['job'];
          $nationalid = $result['nationalID'];
          $staffid = $result['staffID'];
          $yob = $result['yob'];
          $gender = $result['gender'];
          $username = $result['username'];
          $currentYear = date("Y");
          $age = $currentYear - $yob;
        ?>
                        <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="assets/img/avatar.jpg" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $firstname." ".$lastname; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $view; ?></h6><br>
                                    <h6 class="card-subtitle" >Staff ID: <span id="staffid"><?php echo $staffid; ?></span></h6><br>
                                    <h6 class="card-subtitle">Age: <?php echo $age; ?></h6><br>
                                    <h6 class="card-subtitle">Gender: <?php echo $gender; ?></h6>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $user; ?>" class="form-control form-control-line" name="username" id="username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $email; ?>" class="form-control form-control-line" name="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?php echo $number; ?>" class="form-control form-control-line" name="number" id="number" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">National Id</label>
                                        <div class="col-md-12">
                                           <input type="text" value="<?php echo $nationalid; ?>" class="form-control form-control-line" name="nationalid" id="nationalid" required>
                                         </div>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" onclick="updateProfile()">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 