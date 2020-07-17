<?php
 include "admin_nav.php";
 ?> 
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Sales </span><span style="font-size: 15px;">/New Order</span></h1>
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
                      <a class="text-xs font-weight-bold text-info text-uppercase mb-1" href="#" style="text-decoration: none;"><i class="fa fa-shopping-cart fa-2x"></i>&emsp;Sales</a>
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
          <a href="sales.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true" style="margin-left: 30px;"><i class="fa fa-arrow-left"></i>&ensp;Back</a>
        </div><br>
        <form method="POST">
        <div class="row">
          <div class="input-group mb-3" style="margin-left: 250px;">
          <div class="input-group-prepend" >
           <span class="input-group-text" id="inputGroup-sizing-default">Customer #:</span>
           </div>
         <input type="text" class="form-control col-md-6" required aria-label="Default" aria-describedby="inputGroup-sizing-default" style="font-family: FontAwesome, Arial; font-style: normal;" placeholder='Search...&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&#xf002;' name="customerSearch" id="customerSearch">
       </div>
       <div class="list-group" id="customer_results" style="margin-top: -5px;margin-left: 350px;">

       </div>
        </div><br>
          <div class="row">
           <div class="input-group mb-3" style="margin-left: 270px;">
          <div class="input-group-prepend" >
           <span class="input-group-text" id="inputGroup-sizing-default">Date of Delivery:</span>
           </div>
         <input type="date" class="form-control col-md-5" required aria-label="Default" aria-describedby="inputGroup-sizing-default" style="font-family: FontAwesome, Arial; font-style: normal;"  name="deliveryDate" id="deliveryDate">
       </div>
        </div><br>
        <div class="row">
          <div class="input-group mb-3" style="margin-left: 160px;">
          <div class="input-group-prepend" >
           <span class="input-group-text" id="inputGroup-sizing-default">Product:</span>
           </div>
         <input type="text" class="form-control col-md-6" required aria-label="Default" aria-describedby="inputGroup-sizing-default" style="font-family: FontAwesome, Arial; font-style: normal;" placeholder='Search...&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&#xf002;' name="productSearch" id="productSearch">
         <div class="input-group-prepend"style="margin-left: 30px;" >
           <span class="input-group-text" id="inputGroup-sizing-default">Quantity:</span>
           </div>
         <input type="number" class="form-control col-md-1" name="orderQty" id="orderQty" min="1" oninput="validity.valid||(value='');">
       </div>
       <div class="list-group" id="product_results" style="margin-top: -5px;margin-left: 350px;">
         
       </div>
        </div><br>
        <div class="row">
          <button type="button" class="btn btn-success col-md-4 addToCart" style="margin-left: 320px"><i class="fa fa-cart-plus" id="addToCart"></i>&emsp;Add to Cart</button>
        </div><br>
        <h3>Cart</h3>
        <div class="row">
        <table class="table table-bordered" id="cartEditable">
  <thead>
    <tr>
      <th scope="col" width="5%">#</th>
      <th scope="col" width="40%">Product Description</th>
      <th scope="col" width="10%">Unit Price</th>
      <th scope="col" width="10%">Quantity</th>
      <th scope="col" width="10%"></th>
      <th scope="col" width="15%">Sub-Total</th>
    </tr>
  </thead>
  <tbody id="cartData">
 </tbody>
    <tfoot>
      <th scope="row" colspan="5"><b>Total:</b></th>
      <td id="cartTotal">0.00</td>
    </tfoot>
</table>
</div><br>
<div class="row" id="customerDetails">
  
</div><br>
<div class="row">
          <button type="button" class="btn btn-success col-md-4 completeOrder" style="margin-left: 320px"><i class="fa fa-check"></i>&emsp;Complete Order</button>
        </div><br>
        </form>
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 