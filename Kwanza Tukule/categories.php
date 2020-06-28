<?php
 include "admin_nav.php";
 include('queries.php');
  $exists = FALSE;
            $success = FALSE;
               if (isset($_POST['category'])) {
                 $category = $_POST['category'];
                 $row = mysqli_query($connection,"SELECT * FROM category WHERE Category_Name = '".$category."'")or die($connection->error);
                 $result = mysqli_fetch_array($row);
                 if ( $result == TRUE) {
                   $exists = TRUE;
                 }
                 else{
                  $success = TRUE;
                  mysqli_query($connection,"INSERT INTO `category` (`Category_Name`) VALUES ('$category')") or die(mysqli_error($connection));
                 }
               }
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span> <span style="font-size: 15px;">/Categories</span></h1>
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
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#" style="text-decoration: none;"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
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
      <a href="stock.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
      <?php
        $categoriesrowcount = mysqli_num_rows($categoriesList);
      ?>
      <h6 style="margin-left: 280px;">Total Number: <?php echo $categoriesrowcount; ?></h6>
      <a data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 335px;"><i class="fa fa-plus-circle"></i>&ensp;Add Category</a>
       <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Add Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                 <div class="row">
                 <input type="text" name="category" id="category" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Category Name...">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 50px" id="addCategory">Add Category</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div><br>     
      <table id="categoriesEditable" class="table table-striped table-hover paginate" style="display:block;height:737px;overflow-y:scroll;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="30%">#</th>
      <th scope="col" width="80%">Category Name</th>
      <th scope="col"width="80%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($categoriesList as $row){
         $count++;
         $id = $row['id'];
        $category = $row['Category_Name'];
      ?>
    <tr>
      <th scope="row" class="uneditable" id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td class="editable" id="category<?php echo $count; ?>"><?php echo $category; ?></td>
       <td>
       <a href="#" class="btn btn-danger btn-sm active" role="button" aria-pressed="true" ><i class="fa fa-trash"></i>Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 