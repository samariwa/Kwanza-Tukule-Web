<?php
 include "admin_nav.php";
 include('queries.php');
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 ?> 

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Help</span></h1>
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
                      <a class="text-xs font-weight-bold text-success text-uppercase mb-1" href="stock.php" style="text-decoration: none;"><i class="fa fa-cubes fa-2x"></i>&emsp;Stock</a>
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
        <br>
        <h3>Contact Us</h3>
        <p>Have queries or/and recommendations?</p>
        <h6><i class="fa fa-comment"></i>&ensp;<i><b>Engage with a support specialist</b></i></h6>
        <p>Get quick help with your queries / recommendations via messaging support that operates 24/7.</p>
        <div class="row">
        <button data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-light btn-md active ml-3" role="button" aria-pressed="true" ><i class="fa fa-comment"></i>&ensp;Message Now</button>
         <!-- Modal -->
      <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalScrollableTitle">Message Support</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST">
                  <div class="row">
                 <textarea  name="query" id="query" class="form-control col-md-9" required  placeholder="Enter your query / recommendation here..." style="padding:15px;margin-left: 60px" ></textarea>
                  </div><br> 
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="margin-right: 50px" name="sendQuery">Send</button>
            </form>
              <?php
                if (isset($_POST['sendQuery'])){
                   $query = $_POST['query'];
                  $result1 = mysqli_query($connection,"SELECT * FROM `users` WHERE `username`='$logged_in_user'");
                  $row = mysqli_fetch_array($result1);
                  $number = $row['number'];
                  $email = $row['email'];
                  $firstname = $row['firstname'];
                  $lastname = $row['lastname'];
                  require_once "PHPMailer/PHPMailer.php";
                  require_once "PHPMailer/Exception.php";
                  require_once "PHPMailer/SMTP.php";
                   $mail = new PHPMailer(true);
                  $mail -> addAddress('symphaenterprises@gmail.com','Kwanza Tukule');
                  $mail -> setFrom("symphaenterprises@gmail.com", "Kwanza Tukule");
                  $mail->IsSMTP();
                  $mail->Host = "smtp.gmail.com";
                  // optional
                  // used only when SMTP requires authentication  
                  $mail->SMTPAuth = true;
                  $mail->Username = 'kwanzatukuleauthenticator@gmail.com';
                  $mail->Password = 'Kenya.2030';
                  $mail -> Subject = "Help & Support";
                  $mail -> isHTML(true);
                  $mail -> Body = "
                        Hi Sam,<br><br>
                          On of the software users has a query / recommedation for you. Please help them out ASAP.<br><br> 
                          Message: $query
                          <br>
                          Contact User:<br>
                          Name: $firstname $lastname <br>
                          Phone Number: $number <br>
                          Email: $email
                          <br><br>
                          Kind Regards,
                          ";
                  $mail -> send();
                  echo '<script language="javascript">';
                  echo 'alert("Message Successfully Sent. Thank you for messaging us. You will receive response as soon as possible.")';
                  echo '</script>';
                }  
              ?>   
            </div>
          </div>
        </div>
      </div>
        </div><br>
        <h6><i class="fa fa-phone "></i>&ensp;<i><b>Call Us</b></i></h6>
        <p>Get in touch with us for real time support during our business hours.</p>
        <p>Just Call: <b>(+254) 713 932 911</b></p>
        <h5><b>Business Hours: </b></h5>
        <p>Weekdays -> 8 am - 5 pm</p>
        <p>Saturdays -> 8 am - 12.30 pm</p>
        
  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 