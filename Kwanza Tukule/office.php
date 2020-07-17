<?php
 include "admin_nav.php";
  include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Staff</span><span style="font-size: 15px;"> /Office</span></h1>
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
             <a data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 20px;"><i class="fa fa-plus-circle"></i>&ensp;New Office Staff</a>
       <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">New Office Staff</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <form method="POST">
                 <div class="row">
                 <input type="text" name="fname" id="fname" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder=" First Name..." required>
                  </div><br>
                  <div class="row">
                 <input type="text" name="lname" id="lname" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Last Name..." required>
                  </div><br>
                  <div class="row">
                 <input type="text" name="contact" id="contact" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Contact Number..." required>
                  </div><br>
                  <div class="row">
                 <input type="text" name="staffId" id="staffId" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Staff Id..." required>
                  </div><br>
                  <div class="row">
                 <input type="text" name="nationalId" id="nationalId" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="National Id..." required>
                  </div><br>
                  <div class="row">
                 <input type="text" name="yob" id="yob" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Year of Birth..." required>
                  </div><br>
                  <div class="row">
                  <select id="gender" name="gender" class="form-control col-md-9" required style="margin-left: 60px">
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                    </select>
                  </div><br>
                  <div class="row">
                    <select id="role" name="role" class="form-control col-md-9" required style="margin-left: 60px">
                                    <option value="">Role</option>
                                    <option value="Sales">Sales</option>
                                    </select>
                  </div><br>
                  <div class="row">
                 <input type="text" name="salary" id="salary" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Salary..." required>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 50px" id="addOfficeStaff">Add Office Staff</button>
            </form>
            </div>
          </div>
        </div>
      </div>
           <?php
        $officerowcount = mysqli_num_rows($officeStaffList);
      ?>
      <h6 style="margin-left: 270px;">Total Number: <?php echo $officerowcount; ?></h6>
        </div><br>

        <table id="officeEditable" class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="3%">#</th>
      <th scope="col" width="20%">Name</th>
      <th scope="col" width="12%">Contact</th>
      <th scope="col" width="6%">Gender</th>
      <th scope="col" width="8%">Position</th>
      <th scope="col" width="11%">Staff ID</th>
      <th scope="col" width="13%">National ID</th>
       <th scope="col" width="2%">Age</th>
        <th scope="col" width="13%">Salary</th>
      <th scope="col"width="43%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($officeStaffList as $row){
         $count++;
         $id = $row['id'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $contact = $row['number'];
        $gender = $row['gender'];
        $staffId = $row['staffID'];
        $nationalId = $row['nationalID'];
        $yob = $row['yob'];
        $salary = $row['salary'];
        $role = $row['Name'];
        $name = $fname.' '.$lname;
        $current = date("Y");
        $age = $current - $yob;
      ?>
    <tr>
      <th scope="row" class="uneditable" id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td class="uneditable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <td class="editable" id="contact<?php echo $count; ?>"><?php echo $contact; ?></td>
      <td class="uneditable" id="gender<?php echo $count; ?>"><?php echo $gender; ?></td>
      <td class="editable" id="role<?php echo $count; ?>"><?php echo $role; ?></td>
      <td class="editable" id="staffId<?php echo $count; ?>"><?php echo $staffId; ?></td>
      <td class="editable" id="nationalId<?php echo $count; ?>"><?php echo $nationalId; ?></td>
      <td class="uneditable" id="age<?php echo $count; ?>"><?php echo $age; ?></td>
      <td class="editable" id="salary<?php echo $count; ?>">Ksh. <?php echo $salary; ?></td>
       <td>
        <button id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-danger btn-sm active deleteOffice" role="button" aria-pressed="true" ><i class="fa fa-user-times"></i>&ensp;Delete</button>
       </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>       

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 