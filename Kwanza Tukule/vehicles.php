<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Delivery Trucks</span></h1>
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
             <a data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 20px;"><i class="fa fa-plus-circle"></i>&ensp;New Vehicle</a>
       <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">New Vehicle</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                 <div class="row">
                 <input type="text" name="type" id="type" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Vehicle Type..." required>
                  </div><br>
                  <div class="row">
                 <select type="text" name="driver" id="driver" class="form-control col-md-9" style="padding-right:15px;padding-left:15px;margin-left: 60px" required onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();' required>
                  <option value="" selected="selected" disabled>Vehicle Driver...</option>
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
                  </div><br>
                  <div class="row">
                 <input type="text" name="reg" id="reg" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Registration Number..." required>
                  </div><br>
                  <div class="row">
                 <input type="text" name="route" id="route" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Vehicle Route..." required>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 50px" id="addVehicle">Add Vehicle</button>
            </form>
            </div>
          </div>
        </div>
      </div>
           <?php
        $vehiclesrowcount = mysqli_num_rows($vehicleList);
      ?>
      <h6 style="margin-left: 270px;">Total Number: <?php echo $vehiclesrowcount; ?></h6>
        </div><br>

        <table id="vehiclesEditable" class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="10%">#</th>
      <th scope="col" width="20%">Vehicle Type</th>
      <th scope="col" width="20%">Registration Number</th>
      <th scope="col" width="25%">Route</th>
      <th scope="col"width="30%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($vehicleList as $row){
         $count++;
         $id = $row['id'];
        $type = $row['Type'];
        $reg = $row['Reg_Number'];
        $route = $row['Route'];
      ?>
    <tr>
      <th scope="row" class="uneditable" id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td class="uneditable" id="type<?php echo $count; ?>"><?php echo $type; ?></td>
      <td class="uneditable" id="reg<?php echo $count; ?>"><?php echo $reg; ?></td>
      <td class="editable" id="route<?php echo $count; ?>"><?php echo $route; ?></td>
       <td>
        <button data-toggle="modal" data-target="#exampleModalScrollable<?php echo $id?>" id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-warning btn-sm active viewVehicle" role="button" aria-pressed="true" ><i class="fa fa-eye"></i>&ensp;View Details</button>
        <div class="modal fade" id="exampleModalScrollable<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Vehicle Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php 
              $vehiclesList = mysqli_query($connection,"SELECT users.firstname as driver,vehicles.id as id,Driver_id,Type,Reg_Number,Route,Last_service,notes,Next_service FROM vehicles INNER JOIN vehicle_service ON vehicles.id=vehicle_service.Vehicle_id INNER JOIN users ON vehicles.Driver_id=users.id where vehicles.id = '$id' ")or die($connection->error);
                $vehicle = mysqli_fetch_array($vehiclesList);
                  $Driver = $vehicle['driver'];
                  $Last = $vehicle['Last_service'];
                  $Next = $vehicle['Next_service'];
                  $Notes = $vehicle['notes'];
              ?> 
              <div class="row" style="padding:15px;margin-left: 60px">
                     <h5><b>Driver:</b></h5>
                 </div>
                 <div class="row"  style="padding:15px;margin-left: 60px;margin-top: -30px">
                     <?php echo $Driver ?>
                  </div><br>
                 <div class="row" style="padding:15px;margin-left: 60px">
                     <h5><b>Last Inspection Date:</b></h5>
                 </div>
                 <div class="row"  style="padding:15px;margin-left: 60px;margin-top: -30px;">
                      <?php echo $Last ?>
                  </div><br>
                   <div class="row" style="padding:15px;margin-left: 60px">
                     <h5><b>Notes:</b></h5><br><br>
                  </div>
                 <div class="row"  style="padding:15px;margin-left: 60px;margin-top: -30px;">
                       <?php echo $Notes ?>
                  </div><br>
                   <div class="row" style="padding:15px;margin-left: 60px">
                     <h5><b>Next Inspection Date:</b></h5><br>
                  </div>
                 <div class="row"  style="padding:15px;margin-left: 60px;margin-top: -30px;">
                        <?php echo $Next ?>
                  </div>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
        <button id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-danger btn-sm active deleteVehicle" role="button" aria-pressed="true" ><i class="fa fa-trash"></i>&ensp;Delete</button>
       </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 