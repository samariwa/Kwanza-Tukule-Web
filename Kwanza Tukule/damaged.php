<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span><span style="font-size: 15px;"> /Damaged Stock</span></h1>
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
          <?php
              }else{
           ?>
             <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col-xl-4 col-md-6 mb-4">
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

          </div>
            <?php
          }
        ?>
          <div class="row">
      <a href="stock.php" class="btn btn-primary btn-md active float-left ml-3" role="button" aria-pressed="true"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
    </div><br>
     
     <table id="damagedEditable" class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="5%">Batch #</th>
      <th scope="col" width="20%">Stock Name</th>
      <th scope="col"width="15%">Quantity Purchased</th>
      <th scope="col"width="15%">Undamaged Quantity</th>
      <th scope="col"width="15%">New Quantity Damaged</th>
      <th scope="col"width="15%">Total Quantity Damaged</th>
      <th scope="col"width="15%">Damaged Value (Kshs.)</th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($damaged as $row){
         $count++;
         $id = $row['id'];
        $name = $row['Name'];
        $purchased = $row['purchased'];
        $Quantity = $row['Quantity'];
        $damaged = $row['damaged'];
        $unitValue = $row['unitValue'];
        $value = $unitValue * $damaged;
      ?>
    <tr>
      <th class="uneditable" scope="row"  id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td class="uneditable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <td class="uneditable" id="purchased<?php echo $count; ?>"><?php echo $purchased; ?></td>
      <td class="uneditable"id="undamaged<?php echo $count; ?>"><?php echo $Quantity; ?></td>
      <td  class="editable" id="newDamaged<?php echo $count; ?>">0</td>
      <td  class="uneditable" id="damaged<?php echo $count; ?>"><?php echo $damaged; ?></td>
      <td  class="uneditable" id="value<?php echo $count; ?>"><?php echo $value; ?></td>
    </tr>
    <?php
    if ($Quantity > $purchased) {
     $count = $count + 1;
      $row2 = mysqli_fetch_array($previousDamaged);
      $id2 = $row2['id'];
        $name2 = $row2['Name'];
        $purchased2 = $row2['purchased'];
        $Quantity2 = $row2['Quantity'];
        $damaged2 = $row2['damaged'];
        $unitValue2 = $row2['unitValue'];
        $value2 = $unitValue2 * $damaged2;
        ?>
      <tr>
        <th class="uneditable" scope="row"  id="id<?php echo $count; ?>"><?php echo $id2; ?></th>
      <td class="uneditable" id="name<?php echo $count; ?>"><?php echo $name2; ?></td>
      <td class="uneditable" id="purchased<?php echo $count; ?>"><?php echo $purchased; ?></td>
      <td class="uneditable"id="undamaged<?php echo $count; ?>"><?php echo $Quantity2; ?></td>
      <td  class="editable" id="newDamaged<?php echo $count; ?>">0</td>
      <td  class="uneditable" id="damaged<?php echo $count; ?>"><?php echo $damaged2; ?></td>
      <td  class="uneditable" id="value<?php echo $count; ?>"><?php echo $value2; ?></td>
    </tr>
    <?php
    }
    }
    ?>
  </tbody>
</table>   

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 