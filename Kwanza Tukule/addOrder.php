<?php
 include "admin_nav.php";

 $output = '';
       $result = mysqli_query($connection,"SELECT Name,Location,Number,Deliverer FROM customers WHERE Status != 'blacklisted' AND Name LIKE '%".$_POST["search"]."%' OR Location LIKE  '%".$_POST["search"]."%' OR Number LIKE  '%".$_POST["search"]."%' OR Deliverer LIKE  '%".$_POST["search"]."%'");
       if (mysqli_num_rows($result) > 0) {
             $output .= '<h6 align="center" ><b>Search Result(s)</b></h6>';
             $output .= '<div class="table-responsive">
                             <table class="table table-striped table-hover">
                             <tr>
                                 <th style="font-size :15px">Customer Name</th>
                                 <th style="font-size :15px">Location</th>
                                 <th style="font-size :15px">Number</th>
                                 <th style="font-size :15px">Deliverer</th>
                             </tr>';
        while($row = mysqli_fetch_array($result))
        {
          $output .= '
              <tr >
                  <td style="font-size :13px">'.$row["Name"].'</td>
                  <td style="font-size :13px">'.$row["Location"].'</td>
                  <td style="font-size :13px">'.$row["Number"].'</td>
                  <td style="font-size :13px">'.$row["Deliverer"].'</td>
              </tr>';
        }   
        echo $output;                  
       }else{
          echo "Customer Not Found";
       }
 ?> 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Sales </span><span style="font-size: 15px;">/New Order</span></h1>
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
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="#"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
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
          <a href="sales.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
        </div><br>
        <form method="POST">
        <div class="row">
          <div class="input-group mb-3" style="margin-left: 250px;">
          <div class="input-group-prepend" >
           <span class="input-group-text" id="inputGroup-sizing-default">Customer:</span>
           </div>
         <input type="text" class="form-control col-md-6" required aria-label="Default" aria-describedby="inputGroup-sizing-default" style="font-family: FontAwesome, Arial; font-style: normal;" placeholder='Search...&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&#xf002;' name="customerSearch" id="customerSearch">
       </div>
       <div id="customer_results">
         
       </div>
        </div><br>
        <div class="row">
          <div class="input-group mb-3" style="margin-left: 260px;">
          <div class="input-group-prepend" >
           <span class="input-group-text" id="inputGroup-sizing-default">Product:</span>
           </div>
         <input type="text" class="form-control col-md-6" required aria-label="Default" aria-describedby="inputGroup-sizing-default" style="font-family: FontAwesome, Arial; font-style: normal;" placeholder='Search...&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&#xf002;' name="productSearch" id="productSearch">
       </div>
       <div id="product_results">
         
       </div>
        </div>
        </form>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 