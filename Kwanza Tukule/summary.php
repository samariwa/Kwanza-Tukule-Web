<?php
 include "admin_nav.php";
 include('queries.php');
 ?> 

 <!-- Begin Page Content -->
        <div class="container-fluid"> 

  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <span style="font-size: 18px;">/Summary</span></h1>
           <h6 class="h6 mb-0 text-gray-600 mr-3">Time: <span id="time"></span></h6>
          </div>

         <?php
           include "dashboard_tabs.php";
          ?>

          <br>
        <?php 
        $yesterday = date( 'l, F d, Y', strtotime("yesterday"));
        $row = mysqli_fetch_array($salesYesterday);
        if ($row['Sales_yesterday'] > "0") {
          $salesYesterday = $row['Sales_yesterday'];
        }
        else{
          $salesYesterday = "0.00";
        }
        $row1 = mysqli_fetch_array($extraSalesYesterday);
        if ($row1['Sales_yesterday'] > "0") {
          $extraSalesYesterday = $row1['Sales_yesterday'];
        }
        else{
          $extraSalesYesterday = 0;
        }
        $totalSalesYesterday = $salesYesterday + $extraSalesYesterday;
        if ($totalSalesYesterday > 0) {
          $totalSalesYesterday = $totalSalesYesterday;
        }
        else{
          $totalSalesYesterday = "0.00";
        }
        $row2 = mysqli_fetch_array($revenueYesterday);
        if ($row2['Revenue_yesterday'] > "0") {
        $revenueYesterday = $row2['Revenue_yesterday'];
         }
        else{
          $revenueYesterday = 0;
        }
        $row3 = mysqli_fetch_array($extraRevenueYesterday);
        if ($row3['Revenue_yesterday'] > "0") {
        $extraRevenueYesterday = $row3['Revenue_yesterday'];
         }
        else{
          $extraRevenueYesterday = 0;
        }
        $totalRevenueYesterday = $revenueYesterday + $extraRevenueYesterday;
        if ($totalRevenueYesterday > 0) {
          $totalRevenueYesterday = $totalRevenueYesterday;
        }
        else{
          $totalRevenueYesterday = "0.00";
        }
        $row4 = mysqli_fetch_array($mpesaYesterday);
         if ($row4['Mpesa_yesterday'] > "0") {
        $mpesaYesterday = $row4['Mpesa_yesterday'];
        }
         else{
          $mpesaYesterday = 0;
        }
        $row5 = mysqli_fetch_array($extraMpesaYesterday);
         if ($row5['Mpesa_yesterday'] > "0") {
        $extraMpesaYesterday = $row5['Mpesa_yesterday'];
        }
         else{
          $mpesaYesterday = 0;
        }
        $totalMpesaYesterday = $mpesaYesterday + $row5['Mpesa_yesterday'];
        if ($totalMpesaYesterday > 0) {
          $totalMpesaYesterday = $totalMpesaYesterday;
        }
        else{
          $totalMpesaYesterday = "0.00";
        }
        $row6 = mysqli_fetch_array($cashYesterday);
        if ($row6['Cash_yesterday'] > "0") {
        $cashYesterday = $row6['Cash_yesterday'];
         }
        else{
          $cashYesterday = 0;
        }
        $row7 = mysqli_fetch_array($extraCashYesterday);
        if ($row7['Cash_yesterday'] > "0") {
        $extraCashYesterday = $row7['Cash_yesterday'];
         }
        else{
          $extraCashYesterday = 0;
        }
        $totalCashYesterday = $cashYesterday + $extraCashYesterday;
        if ($totalCashYesterday > 0) {
          $totalCashYesterday = $totalCashYesterday;
        }
        else{
          $totalCashYesterday = "0.00";
        }
        $row8 = mysqli_fetch_array($mpesaDebt);
        if ( $row8['Mpesa_debt'] > "0") {
       $mpesaDebt = $row8['Mpesa_debt']; 
         }
        else{
          $mpesaDebt = 0;
        }
        $row9 = mysqli_fetch_array($extraMpesaDebt);
        if ( $row9['Mpesa_debt'] > "0") {
       $extraMpesaDebt = $row9['Mpesa_debt']; 
         }
        else{
          $extraMpesaDebt = 0;
        }
        $totalMpesaDebt = $mpesaDebt + $extraMpesaDebt;
        if ($totalMpesaDebt > 0) {
          $totalMpesaDebt = $totalMpesaDebt;
        }
        else{
          $totalMpesaDebt = "0.00";
        }
        $row10 = mysqli_fetch_array($cashDebt);
         if ( $row10['Cash_debt'] > "0") {
        $cashDebt = $row10['Cash_debt'];
         }
        else{
          $cashDebt = 0;
        }
        $row11 = mysqli_fetch_array($extraCashDebt);
         if ( $row11['Cash_debt'] > "0") {
        $extraCashDebt = $row11['Cash_debt'];
         }
        else{
          $extraCashDebt = 0;
        }
        $totalCashDebt = $cashDebt + $extraCashDebt;
        if ($totalCashDebt > 0) {
          $totalCashDebt = $totalCashDebt;
        }
        else{
          $totalCashDebt = "0.00";
        }
        $row12 = mysqli_fetch_array($bankedYesterday);
        if ( $row12['Banked_yesterday'] > "0") {
        $bankedYesterday = $row12['Banked_yesterday'];
        }
        else{
          $bankedYesterday = 0;
        }
        $row13 = mysqli_fetch_array($extraBankedYesterday);
        if ( $row13['Banked_yesterday'] > "0") {
        $extraBankedYesterday = $row13['Banked_yesterday'];
        }
        else{
          $extraBankedYesterday = 0;
        }
        $totalBankedYesterday = $bankedYesterday + $extraBankedYesterday;
        if ($totalBankedYesterday > 0) {
          $totalBankedYesterday = $totalBankedYesterday;
        }
        else{
          $totalBankedYesterday = "0.00";
        }
         $row14 = mysqli_fetch_array($expenditureYesterday);
        if ( $row14['paid'] > "0") {
        $expenditureYesterday = $row14['paid'];
        }
        else{
          $expenditureYesterday = "0.00";
        }
        ?>
        <div class="row" style="margin-left: 50px;"><h5>Summary for <?php echo $yesterday; ?></h5> </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Sales Value: Ksh. <?php echo number_format($totalSalesYesterday); ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Revenue Realized: Ksh. <?php echo number_format($totalRevenueYesterday); ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Paid via M-Pesa for Yesterday's Sales: Ksh. <?php echo number_format($totalMpesaYesterday); ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Paid in Cash for Yesterday's Sales: Ksh. <?php echo number_format($totalCashYesterday); ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Debt Paid via M-Pesa: Ksh. <?php echo number_format($totalMpesaDebt); ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Debt Paid in Cash: Ksh. <?php echo number_format($totalCashDebt); ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Total Banked: Ksh. <?php echo number_format($totalBankedYesterday); ?></h6>
        </div><br>
        <div class="row" style="margin-left: 50px;">
            <h6>Expenditure: Ksh. <?php echo number_format($expenditureYesterday); ?></h6>
        </div><br>
        
        

  <!-- Scroll to Top Button-->
  <?php include "admin_footer.php" ?> 
         