<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span></h1>
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
                      <a class="text-xs font-weight-bold text-warning text-uppercase mb-1" href="summary.php"><i class="fa fa-clipboard fa-2x"></i>&emsp;Summary</a>
                    </div>   
                  </div>
                </div>
              </div>
            </div>
          </div> 
         <div class="row">
      <a data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-success btn-md active" role="button" aria-pressed="true" style="margin-left: 25px;"><i class="fa fa-plus-circle"></i>&ensp;Add Stock</a>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Add Stock</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                <div class="row">
                 <select type="text" name="category" id="category" class="form-control col-md-9" style="padding-right:15px;padding-left:15px;margin-left: 60px" required onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                  <option value="" selected="selected" disabled>Category...</option>
                  <?php
                    $count = 0;
                    foreach($categoriesList as $row){
                     $count++;
                    $category = $row['Category_Name'];
                  ?>
                   <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                  <?php
                    }
                  ?>
                 </select>
                  </div><br>
                 <div class="row">
                 <input type="text" name="name" id="name" class="form-control col-md-9" style="padding:15px;margin-left: 60px" required  placeholder="Stock Name...">
                  </div><br>
                  <div class="row">
                 <select type="text" name="supplier" id="supplier" class="form-control col-md-9" style="padding-right:15px;padding-left:15px;margin-left: 60px" required onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                   <option value="" selected="selected" disabled>Supplier...</option>
                  <?php
                    $count = 0;
                    foreach($suppliersList as $row){
                     $count++;
                    $supplier = $row['Name'];
                  ?>
                   <option value="<?php echo $supplier; ?>"><?php echo $supplier; ?></option>
                  <?php
                    }
                  ?>
                 </select>
                  </div><br>
                  <div class="row">
                    <label for="received" style="margin-left: 60px;">Date Received:</label>
                 <input type="date" name="received" id="received" class="form-control col-md-9" required  style="padding:15px;margin-left: 60px" >
                  </div><br>
                  <div class="row">
                    <label for="expiry" style="margin-left: 60px;">Expiration Date:</label>
                 <input type="date" name="expiry" id="expiry" class="form-control col-md-9" required style="padding:15px;margin-left: 60px" >
                  </div><br>
                 <div class="row">
                 <input type="number" name="bp" id="bp" class="form-control col-md-9" required style="padding:15px;margin-left: 60px" placeholder="Buying Price...">
                  </div><br>
                  <div class="row">
                 <input type="number" name="sp" id="sp" class="form-control col-md-9" required style="padding:15px;margin-left: 60px" placeholder="Selling Price...">
                  </div><br>
                 <div class="row">
                 <input type="number" name="qty" id="qty" class="form-control col-md-9" required style="padding:15px;margin-left: 60px" placeholder="Quantity...">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 50px" id="addStock">Add Stock</button>
            </form>
            </div>
          </div>
        </div>
      </div>
      <a href="expiry.php" class="btn btn-info btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;">Stock Expiry</a>
      <?php
        $stockrowcount = mysqli_num_rows($stockList);
      ?>
      <h6 style="margin-left: 140px;">Total Number: <?php echo $stockrowcount; ?></h6>
      <a href="valuation.php" class="btn btn-warning btn-md active" role="button" aria-pressed="true" style="margin-left: 140px;">Stock Valuation</a>
      <a href="categories.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;">Stock Categories</a>
    </div><br>     
      <table id="stockEditable" class="table table-striped table-hover paginate" style="display:block; height:550px;overflow-y:scroll;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="5%">#</th>
      <th scope="col" width="15%">Category</th>
      <th scope="col" width="20%">Stock Name</th>
      <th scope="col" width="15%">Buying Price</th>
      <th scope="col"width="15%">Selling Price</th>
      <th scope="col"width="20%">Quantity Available</th>
      <th scope="col"width="10%"></th>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($stockList as $row){
         $count++;
         $id = $row['id'];
        $category = $row['Category_Name'];
        $name = $row['Name'];
        $buying_price = $row['Buying_price'];
        $selling_price = $row['Price'];
        $quantity = $row['Quantity'];
      ?>
    <tr>
      <th scope="row" class="uneditable" id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td class="editable" id="category<?php echo $count; ?>"><?php echo $category; ?></td>
      <td class="editable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <td class="editable" id="bp<?php echo $count; ?>"><?php echo $buying_price; ?></td>
      <td class="editable" id="sp<?php echo $count; ?>"><?php echo $selling_price; ?></td>
      <td class="uneditable" id="qty<?php echo $count; ?>"><?php echo $quantity; ?></td>
       <td>
        <button id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-danger btn-sm active deleteStock" role="button" aria-pressed="true" ><i class="fa fa-trash"></i>&ensp;Delete</button></td>
       </td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 