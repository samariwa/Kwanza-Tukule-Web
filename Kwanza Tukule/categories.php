<?php
 include "admin_nav.php";
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span> <span style="font-size: 15px;">/Categories</span></h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="customers.php"><i class="fa fa-users fa-2x"></i>&emsp;Customers</a> 
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
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
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
      <h5 style="margin-left: 130px">Search Category:</h5>
          <input type="text" name="filter" style="padding:15px;margin-left: 50px" id="filter" placeholder="By Name..." autocomplete="off" class="form-control col-md-6 " />
    </div> <br> 
         <div class="row">
      <a href="stock.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
      <?php
       $result = mysqli_query($connection,"SELECT * FROM category");
        $categoriesrowcount = mysqli_num_rows($result);
      ?>
      <h6 style="margin-left: 280px;">Total Number: <?php echo $categoriesrowcount; ?></h6>
    </div><br>     
      <table class="table table-striped table-hover" style="display:block; height:500px;overflow-y:scroll;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="20%">#</th>
      <th scope="col" width="70%">Category Name</th>
      <th scope="col"width="60%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        $result = mysqli_query($connection,"SELECT * FROM category ORDER BY id ASC");
        foreach($result as $row){
         $count++;
         $id = $row['id'];
        $category = $row['Category_Name'];
      ?>
    <tr>
      <th scope="row"><?php echo $id; ?></th>
      <td><?php echo $category; ?></td>
       <td>
       <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" ><i class="fa fa-user-times"></i>Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 