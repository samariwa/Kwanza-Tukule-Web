<?php
 include "admin_nav.php";
 include('config.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Customers</span></h1>
             <a href="categories.php" class="btn btn-light btn-md active" role="button" aria-pressed="true" style="margin-left: 220px;"><i class="fa fa-print"></i>&ensp;Print</a>
          </div>
         
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="#"><i class="fa fa-users fa-2x"></i>&emsp;Customers</a> 
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
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="stock.php"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
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
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="sales.php"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
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
                      <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="summary.php"><i class="fa fa-clipboard fa-2x"></i>&emsp;Summary</a>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
          </div>
    <div class="row">
      <a data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-plus-circle"></i>&ensp;Add Customer</a>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Add Customer</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                <div class="row">
                 <input type="text" name="name" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Customer Name...">
                  </div><br>
                 <div class="row">
                 <input type="text" name="location" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Customer Location...">
                  </div><br>
                 <div class="row">
                 <input type="text" name="number" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Contact Number...">
                  </div><br>
                 <div class="row">
                 <input type="text" name="deliverer" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Deliverer...">
                  </div>   
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 50px">Add Customer</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      <?php
       $result = mysqli_query($connection,"SELECT * FROM customers WHERE `status`!='blacklisted'");
        $customersrowcount = mysqli_num_rows($result);
      ?>
      <h6 style="margin-left: 200px;">Total Number: <?php echo $customersrowcount; ?></h6>
      <a href="blacklisted.php" class="btn btn-dark btn-md active" role="button" aria-pressed="true" style="margin-left: 300px;">Blacklisted Customers</a>
    </div><br>
    <table class="table table-striped table-hover" style="display:block; height:527px;overflow-y:scroll;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="20%">Name</th>
      <th scope="col" width="20%">Location</th>
      <th scope="col" width="15%">Contact Number</th>
      <th scope="col" width="10%">Deliverer</th>
      <th scope="col"width="10%">Status</th>
      <th scope="col"width="20%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        $result = mysqli_query($connection,"SELECT Name,Location,Number,Deliverer,Status FROM customers WHERE Status != 'blacklisted'ORDER BY id DESC");
        foreach($result as $row){
         $count++;
         $name = $row['Name'];
        $location = $row['Location'];
        $number = $row['Number'];
        $deliverer = $row['Deliverer'];
        $status = $row['Status'];
      ?>
    <tr>
      <th scope="row"><?php echo $name; ?></th>
      <td><?php echo $location; ?></td>
      <td><?php echo $number; ?></td>
      <td><?php echo $deliverer; ?></td>
      <td><?php echo $status; ?></td>
       <td><a href="#" class="btn btn-dark btn-sm active" role="button" aria-pressed="true">Blacklist</a>
       <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" ><i class="fa fa-user-times"></i>Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>


  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 