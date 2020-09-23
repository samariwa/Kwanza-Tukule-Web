<?php
include "admin_nav.php";
include('queries.php');
?> 
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard 
      <span style="font-size: 18px;">/Customers</span>
      <span style="font-size: 15px;">/Blacklisted</span>
    </h1>
    <h6 class="h6 mb-0 text-gray-600 mr-3">Time: 
      <span id="time"></span>
    </h6>
  </div>
  <?php
 if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {
  ?>
  <!-- Content Row -->
  <div class="row">
    <!-- Customers Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="#" style="text-decoration: none;">
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
    <!-- Stock Card -->
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
    <!-- Sales Card -->
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
    <!-- Summary Card -->
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
        </div>
      </a>
    </div>
  </div>
  <?php
    }else{
 ?>
  <div class="row">
    <!-- Customers Card -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <a class="text-xs font-weight-bold text-primary text-uppercase mb-1" href="#" style="text-decoration: none;">
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
    <!-- Stock Card -->
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
    <!-- Sales Card -->
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
  <div class="row">
    <div class="col-md-4">
      <a href="customers.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" >
        <i class="fa fa-arrow-left"></i>&ensp;Back
      </a>
    </div>
      <?php
        $blacklistedrowcount = mysqli_num_rows($blacklistedList);
      ?>
    <div class="col-md-8">
      <h6 class="offset-2">Total Number: 
        <?php echo $blacklistedrowcount; ?>
      </h6>
    </div>
  </div>
  <br>
    <table id="blacklistEditable" class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
      <thead class="thead-dark">
        <tr>
          <th scope="col" width="6%">#</th>
          <th scope="col" width="15%">Name</th>
          <th scope="col" width="15%">Location</th>
          <th scope="col" width="14%">Contact Number</th>
          <th scope="col" width="10%">Deliverer</th>
          <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {
        ?>
          <th scope="col" width="10%">Balance</th>
          <th scope="col"width="15%"></th>
          <?php
          }
          ?>
        </tr>
      </thead>
      <tbody >
        <?php
        $count = 0;    
        foreach($blacklistedList as $row){
         $count++;
          $id = $row['id'];
         $name = $row['Name'];
        $location = $row['Location'];
        $number = $row['Number'];
        $deliverer = $row['Deliverer'];
        $balance = $row['Balance'];
        ?>
        <tr>
          <th scope="row" class="uneditable" id="id
            <?php echo $count; ?>">
            <?php echo $id; ?>
          </th>
          <td class="uneditable" id="name
            <?php echo $count; ?>">
            <?php echo $name; ?>
          </td>
          <td class="editable" id="location
            <?php echo $count; ?>">
            <?php echo $location; ?>
          </td>
          <td class="editable" id="number
            <?php echo $count; ?>">
            <?php echo $number; ?>
          </td>
          <td class="uneditable" id="deliverer
            <?php echo $count; ?>">
            <?php echo $deliverer; ?>
          </td>
          <?php
         if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {
          ?>
          <td class="editable" id="balance
            <?php echo $count; ?>">
            <?php echo $balance; ?>
          </td>
          <td>
            <button id="
              <?php echo $id; ?>" data_id="
              <?php echo $id; ?>" class="btn btn-success btn-sm active restoreBlacklist" role="button" aria-pressed="true" >Restore
            </button>
            <button id="
              <?php echo $id; ?>" data_id="
              <?php echo $id; ?>" class="btn btn-danger btn-sm active deleteBlacklist" role="button" aria-pressed="true" >
              <i class="fa fa-user-times"></i>Delete
            </button>
          </td>
          <?php
          }
          ?>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <!-- Scroll to Top Button-->
    <?php include "admin_footer.php" ?> 
        