<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Stock</span></h1>
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
                <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#" style="text-decoration: none;">
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
                <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="#" style="text-decoration: none;">
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
          <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO' || $view == 'Admin2') {

        ?>
         <div class="row">
          <div class="col-md-2">
      <a data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-success btn-md active" role="button" aria-pressed="true" ><i class="fa fa-plus-circle"></i>&ensp;New Stock</a>
      <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">New Stock</h5>
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
                  </div><br>
                  <div class="row">
                 <input type="number" name="restock" id="restock" class="form-control col-md-9" required style="padding:15px;margin-left: 60px" placeholder="Restock Level...">
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 50px" id="addStock">Add Stock</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <a href="shelf_life.php" class="btn btn-info btn-md active" role="button" aria-pressed="true">Stock Shelf Life</a>
      </div>
      <div class="col-md-2">
      <a href="damaged.php" class="btn btn-secondary btn-md active" role="button" aria-pressed="true" >Damaged Stock</a>
      </div>
      <div class="col-md-2">
      <a href="leftovers.php" class="btn btn-light btn-md active" role="button" aria-pressed="true" >Leftover Cereals</a>
      </div>
      <div class="col-md-2">
      <a href="valuation.php" class="btn btn-warning btn-md active" role="button" aria-pressed="true" >Stock Valuation</a>
      </div>
      <div class="col-md-2">
      <a href="categories.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true">Stock Categories</a>
    </div>
    </div><br>  
     <?php
          }else{
            ?>
<div class="row">
  <div class="col-md-6">
      <a href="shelf_life.php" class="btn btn-info btn-md active  ml-2" role="button" aria-pressed="true">Stock Shelf Life</a>
    </div>
    <div class="col-md-6">
      <a href="categories.php" class="btn btn-primary btn-md active offset-8" role="button" aria-pressed="true">Stock Categories</a>
    </div>
    </div><br> 
            <?php
          }
        $stockrowcount = mysqli_num_rows($stockList);
      ?>
      <div class="offset-2"><h6 class="offset-4">Total Number: <?php echo $stockrowcount; ?></h6></div>
      <table id="stockEditable" class="table table-striped table-hover paginate" style="display:block;overflow-y:scroll;text-align: center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="4%">#</th>
      <th scope="col" width="15%">Category</th>
      <th scope="col" width="17%">Stock Name</th>
       <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
      <th scope="col" width="11%">Buying Price</th>
       <?php
        }
        ?>
      <th scope="col"width="11%">Selling Price</th>
      <th scope="col"width="12%">Quantity Available</th>
      <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO' || $view == 'Admin2') {

        ?>
        <th scope="col" width="10%">Restock Level</th>
        <?php
       }
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO' || $view == 'Admin2') {
        ?>
      <th scope="col"width="28%"></th>
    </tr>
    <?php
        }
        ?>
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
        $restock_Level = $row['Restock_Level'];
      ?>
    <tr>
      <?php
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {

        ?>
      <th scope="row" class="uneditable" id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td class="editable" id="category<?php echo $count; ?>"><?php echo $category; ?></td>
      <td class="editable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <td class="editable" id="bp<?php echo $count; ?>"><?php echo $buying_price; ?></td> 
      <td class="editable" id="sp<?php echo $count; ?>"><?php echo $selling_price; ?></td>
      <td class="uneditable" id="qty<?php echo $count; ?>"><?php echo $quantity; ?></td>
      <?php
        }else{
        ?>
        <th scope="row" class="uneditable" id="id<?php echo $count; ?>"><?php echo $id; ?></th>
      <td class="uneditable" id="category<?php echo $count; ?>"><?php echo $category; ?></td>
      <td class="uneditable" id="name<?php echo $count; ?>"><?php echo $name; ?></td>
      <td class="uneditable" id="sp<?php echo $count; ?>"><?php echo $selling_price; ?></td>
      <td class="uneditable" id="qty<?php echo $count; ?>"><?php echo $quantity; ?></td>
      <?php
       }
       if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO' || $view == 'Admin2') {
        ?>
        <td class="editable" id="restock_Level<?php echo $count; ?>"><?php echo $restock_Level; ?></td>
        <?php
        }
        if ($view == 'Software' || $view == 'General Operations Manager' || $view == 'CEO') {
        ?>
        <td>  
        <button data-toggle="modal" data-target="#exampleModalScrollable<?php echo $id; ?>" id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-light btn-sm active restock" role="button" aria-pressed="true" ><i class="fa fa-plus"></i>&ensp;Restock</button>
        <div class="modal fade" id="exampleModalScrollable<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Restock</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                 <div class="row">
                  <label for="expiry" style="margin-left: 60px;">Date Received:</label>
                 <input type="date" name="received" id="received<?php echo $id; ?>" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Date Received..." required>
                  </div><br>
                  <div class="row">
                 <input type="number" name="qty" id="qty<?php echo $id; ?>" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Quantity Purchased..." required min="1" oninput="validity.valid||(value='');">
                  </div><br>
                  <div class="row">
                 <input type="number" name="bp" id="bp<?php echo $id; ?>" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Buying Price..." required min="0.01" step="0.01" oninput="validity.valid||(value='');">
                  </div><br>
                  <div class="row">
                 <input type="number" name="sp" id="sp<?php echo $id; ?>" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Selling Price..." required min="0.01" step="0.01" oninput="validity.valid||(value='');">
                  </div><br>
                  <div class="row">
                    <label for="expiry" style="margin-left: 60px;">Expiration Date:</label>
                 <input type="date" name="expiry" id="expiry<?php echo $id; ?>" class="form-control col-md-9" style="padding:15px;margin-left: 60px" placeholder="Expiry Date..." required>
                  </div>
            </div>
             <div class="modal-footer">
              <button type="submit" class="btn btn-primary addPurchase" style="margin-right: 50px" id="<?php echo $id; ?>">Add Purchase</button>
            </form>
            </div>
          </div>
        </div>
      </div>
     </div>
        <button id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-danger btn-sm active deleteStock" role="button" aria-pressed="true" ><i class="fa fa-trash"></i>&ensp;Delete</button></td>
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