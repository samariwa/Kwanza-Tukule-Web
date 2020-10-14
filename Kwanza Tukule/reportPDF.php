<?php
session_start();
require_once('tcpdf/tcpdf.php');
 include('queries.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($_SESSION["user"]);
$pdf->SetTitle('Kwanza Tukule Report');
$pdf->SetSubject('Report');
$pdf->SetKeywords('PDF, Report, export');

// set default header data
$pdf->SetHeaderData("", PDF_HEADER_LOGO_WIDTH, "Report","Generated By: ".$_SESSION["user"]);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();
$date = date( 'l, F d, Y ', time());
$result1 = mysqli_fetch_array($monthSalesValue);
$sales = $result1['sum'];
$result16 = mysqli_fetch_array($monthExtraSalesValue);
$extra_sales = $result16['sum'];
$total_sales = $sales + $extra_sales;
$result2 = mysqli_fetch_array($monthIncomeValue);
$income = $result2['sum'];
$result17 = mysqli_fetch_array($monthExtraIncomeValue);
$extra_income = $result17['sum'];
$total_income = $income + $extra_income;
$result3 = mysqli_fetch_array($monthExpenseValue);
$expenses = $result3['sum'];
$result4 = mysqli_fetch_array($salariesTotal);
$salaries = $result4['salaries'];
$gross_profit_loss = '';
$gross = $total_income - $total_sales;
if ($gross > 0) {
  $gross_profit_loss = 'profit';
}
elseif ($gross < 0) {
  $gross_profit_loss = 'loss';
}
$net_profit_loss = '';
$net = $gross - $expenses - $salaries;
if ($net > 0) {
  $net_profit_loss = 'profit';
}
elseif ($net < 0) {
  $net_profit_loss = 'loss';
}
$result5 = mysqli_fetch_array($lastmonthSalesValue);
$last_sales = $result5['sum'];
$result14 = mysqli_fetch_array($lastmonthExtraSalesValue);
$last_extra_sales = $result14['sum'];
$result6 = mysqli_fetch_array($lastmonthIncomeValue);
$last_income = $result6['sum'];
$result15 = mysqli_fetch_array($lastmonthExtraIncomeValue);
$last_extra_income = $result15['sum'];
$result7 = mysqli_fetch_array($lastmonthExpenseValue);
$last_expenses = $result7['sum'];
$last_gross = ($last_income + $last_extra_income) - ($last_sales + $last_extra_sales);
$gross_up_down = '';
if ($last_gross < $gross) {
 $gross_up_down = 'an upward';
}
elseif ($last_gross > $gross) {
  $gross_up_down = 'a downward';
}
$gross_pc = ($gross/($last_gross + $gross)) * 100;
$last_net = $last_gross - $last_expenses - $salaries;
$net_up_down = '';
if ($last_net < $net) {
  $net_up_down = 'an upward';
}
elseif ($last_net > $net) {
  $net_up_down = 'a downward';
}
$net_pc = ($gross/($last_net + $net)) * 100;
$last_gross_up_down = '';
if ($last_gross > 0) {
  $last_gross_up_down = 'profit';
}
elseif ($last_gross < 0) {
  $last_gross_up_down = 'loss';
}
$last_net_up_down = '';
if ($last_net > 0) {
  $last_net_up_down = 'profit';
}
elseif ($last_net < 0) {
  $last_net_up_down = 'loss';
}
 $fastmovingproducts = array();
  foreach($fastmovingMonth as $row){
  $name = $row['name'];
  $total = $row['sum'];
  $resultArrayfast = array($name, $total);
  array_push($fastmovingproducts, $resultArrayfast);
  }
  $fastsellingproducts = array();
  foreach($fastsellingMonth as $row){
  $name = $row['name'];
  $total = $row['sum'];
  $resultArrayextrafast = array($name, $total);
  array_push($fastsellingproducts, $resultArrayextrafast);
  }
  $slowmovingproducts = array();
  foreach($slowmovingMonth as $row){
  $name = $row['name'];
  $total = $row['sum'];
  $resultArrayslow = array($name, $total);
  array_push($slowmovingproducts, $resultArrayslow);
  }
  $slowsellingproducts = array();
  foreach($slowsellingMonth as $row){
  $name = $row['name'];
  $total = $row['sum'];
  $resultArrayextraslow = array($name, $total);
  array_push($slowsellingproducts, $resultArrayextraslow);
  }
  $payerList = array();
  foreach($biggestPayers as $row){
  $name = $row['name'];
  $total = $row['sum'];
  $resultArray = array($name, $total);
  array_push($payerList, $resultArray);
  }
  $result8 = mysqli_fetch_array($customersTotalMonth);
  $customersTotal = $result8['count'];
  $result9 = mysqli_fetch_array($customersTotalLastMonth);
  $customersTotalLast = $result9['count'];
$customers_difference = '';
if ($customersTotal > $customersTotalLast) {
  $customers_difference = 'an improvement';
}
elseif ($customersTotal < $customersTotalLast) {
  $customers_difference = 'a drop';
}
  $customersrowcount = mysqli_num_rows($customersList);
 $result9 = mysqli_fetch_array($customersTotalLastMonth);
  $customersTotalLast = $result9['count'];
  $result10 = mysqli_fetch_array($newCustomersMonthCount);
  $newCustomersMonthCount = $result10['count'];
$newCustomerStatement = '';
if ($newCustomersMonthCount > 0) {
  $newCustomerStatement = 'This past one month we have had <b>'.$newCustomersMonthCount.' new customer(s)</b>. The new customers with their respective locations and amount of money they have paid to the company are as follows:
  <ol>';
  foreach($newCustomersMonth as $rows){
  $newName = $rows['Name'];
  $newLocation = $rows['Location'];
  $amount = $rows['sum'];
  $newCustomerStatement .= '<b><li>'.$newName.' - '.$newLocation.' - Ksh. '.$amount.'</li></b>';
  }
  $newCustomerStatement .= '</ol>';
}
elseif ($newCustomersMonthCount == 0) {
  $newCustomerStatement = 'This past one month we had <b>no new customers</b>. Sales should be done by the team for a positive improvement.';
}
$result11 = mysqli_fetch_array($monthLiability);
  $monthLiability = $result11['sum'];
$result12 = mysqli_fetch_array($totalLiability);
  $totalLiability = $result12['sum'];  
  $result13 = mysqli_fetch_array($newSuppliersCountMonth);
  $newSuppliersCountMonth = $result13['count']; 
  $newSuppliersStatement = '';
  if ($newSuppliersCountMonth == 0) {
    $newSuppliersStatement = 'we had <b>no new supplier</b>. ';
  }
  elseif ($newSuppliersCountMonth > 0) {
    $newSuppliersStatement = 'we have had <b>'.$newSuppliersCountMonth.' new supplier(s)</b>. Below is <b>information on the new supplier(s)</b>.<br><br>
    <table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Supplier Name</b></th>
        <th><b>Supplier Contact</b></th>
    </tr>';
  foreach($newSuppliersDetailsMonth as $row){
  $name = $row['Name'];
  $contact = $row['contact'];
   $newSuppliersStatement .= ' <tr>
        <td>'.$name.'</td>
        <td>'.$contact.'</td>
    </tr>';
  }  
$newSuppliersStatement .= '</table>';
  }
// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

// create some HTML content
$html = '<h1 style="text-align:center"><strong><img src="assets/img/Kwanza Tukule.png" height="80" width="200"></strong></h1>
<b>Date: '.$date.'</b><br>
<h3>Purpose</h3>
    <p>
      We exist to make a positive difference in the livelihoods of our people socially and economically by providing them food supply services prepared under the utmost standards of hygiene and sanitation, using sustainable sources of renewable energy, allowing them to maximize their potential.
    </p>
    <h3>Vision</h3>
    <p>
      To Make Nutritious food affordable for the many.
    </p>
    <h3>Mission Statement</h3>
    <p>
      We reliably offer better food supply chain in Africa that feeds the community with affordable, healthy, nutritious foods, prepared under the utmost standards of hygiene that allow our clients to overcome food insecurity, post-harvest losses and energy consumption/ that allow our clients to enjoy a delicious meal while saving time and conserving energy.
    </p>
    <h2>Performance Analysis</h2>
    <p>Below is the report for the number items sold for each brand with the corresponding value for <u><b>sales done yesterday.</b></u></p>
    <table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Product</b></th>
        <th><b>Quantity</b></th>
        <th><b>Value</b></th>  
    </tr>';
  foreach($salesValueYesterday as $row){
  $name = $row['name'];
  $qty = $row['sum'];
  $price = $row['price'];
  $value = $qty * $price;
   $html .= ' <tr>
        <td>'.$name.'</td>
        <td>'.number_format($qty).'</td>
        <td>'.number_format($value).'</td>
    </tr>';
  }  
$html .= '</table>
<p>Below is the report that examines the company performance for the last one month.</p>
<p>This month we managed to <b>sale products worth Ksh. '.$total_sales.'</b>. This income for sale of different products whose demands depended on the customers preferences. The <b>5 most demanded products</b> this month  that were <b>ordered from the company</b> with the corresponding sales quantities(units) were as follows:</p>
<ol>
    <b><li>'.$fastmovingproducts[0][0].' - '.number_format($fastmovingproducts[0][1]).'</li>
    <li>'.$fastmovingproducts[1][0].' - '.number_format($fastmovingproducts[1][1]).'</li>
    <li>'.$fastmovingproducts[2][0].' - '.number_format($fastmovingproducts[2][1]).'</li>
    <li>'.$fastmovingproducts[3][0].' - '.number_format($fastmovingproducts[3][1]).'</li>
    <li>'.$fastmovingproducts[4][0].' - '.number_format($fastmovingproducts[4][1]).'</li></b>
</ol>
The <b>5 most demanded products</b> this month <b>based on sales made</b> with the corresponding sales quantities(units) were as follows:</p>
<ol>
    <b><li>'.$fastsellingproducts[0][0].' - '.number_format($fastsellingproducts[0][1]).'</li>
    <li>'.$fastsellingproducts[1][0].' - '.number_format($fastsellingproducts[1][1]).'</li>
    <li>'.$fastsellingproducts[2][0].' - '.number_format($fastsellingproducts[2][1]).'</li>
    <li>'.$fastsellingproducts[3][0].' - '.number_format($fastsellingproducts[3][1]).'</li>
    <li>'.$fastsellingproducts[4][0].' - '.number_format($fastsellingproducts[4][1]).'</li></b>
</ol>
<p>On the other hand the <b>5 least  demanded</b> products of the month that were <b>ordered from the company</b> with their corresponding sales quantities(units) were as follows:</p>
<ol>
    <b><li>'.$slowmovingproducts[0][0].' - '.number_format($slowmovingproducts[0][1]).'</li>
    <li>'.$slowmovingproducts[1][0].' - '.number_format($slowmovingproducts[1][1]).'</li>
    <li>'.$slowmovingproducts[2][0].' - '.number_format($slowmovingproducts[2][1]).'</li>
    <li>'.$slowmovingproducts[3][0].' - '.number_format($slowmovingproducts[3][1]).'</li>
    <li>'.$slowmovingproducts[4][0].' - '.number_format($slowmovingproducts[4][1]).'</li></b>
</ol>
<p>The <b>5 least  demanded</b> products of the month <b>based on sales made</b> with their corresponding sales quantities(units) were as follows:</p>
<ol>
    <b><li>'.$slowsellingproducts[0][0].' - '.number_format($slowsellingproducts[0][1]).'</li>
    <li>'.$slowsellingproducts[1][0].' - '.number_format($slowsellingproducts[1][1]).'</li>
    <li>'.$slowsellingproducts[2][0].' - '.number_format($slowsellingproducts[2][1]).'</li>
    <li>'.$slowsellingproducts[3][0].' - '.number_format($slowsellingproducts[3][1]).'</li>
    <li>'.$slowsellingproducts[4][0].' - '.number_format($slowsellingproducts[4][1]).'</li></b>
</ol>
<p>All products combined generated a <b>revenue of Ksh. '.number_format($total_income).'</b>.</p>
<p>With that the <b>gross '.$gross_profit_loss.' was Ksh. '.number_format($gross).'</b>.This is '.$gross_up_down.' gross projection by '.intval($gross_pc).'%.Last month there was a '.$last_gross_up_down.' of Ksh. '.number_format($last_gross).'.</p>
<p>Various <b>expenses</b> were incurred during the month which <b>totaled to Ksh. '.number_format($expenses).'</b>. Below is a breakdown of the various expense details for the past one month with their respective amounts paid and due.</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Date of Payment</b></th>
        <th><b>Expense Title</b></th>
        <th><b>Paid Party</b></th>
        <th><b>Amount Paid</b></th>
        <th><b>Amount Due</b></th>   
    </tr>';
  foreach($expensesMonth as $row){
  $name = $row['name'];
  $party = $row['Party'];
  $paid = $row['paid'];
  $due = $row['due'];
  $date = $row['date'];
  $day = date( 'l, F d', strtotime($date) ); 
   $html .= ' <tr>
        <td>'.$day.'</td>
        <td>'.$name.'</td>
        <td>'.$name.'</td>
        <td>Ksh. '.number_format($paid).'</td>
        <td>Ksh. '.number_format($due).'</td>
    </tr>';
  }  
$html .= '</table>
<p>Given the data above the <b>projected '.$net_profit_loss.'</b> made during this month <b>was therefore Ksh. '.number_format($net).'</b>.This is '.$net_up_down.' net projection by '.intval($net_pc).'%.Last month there was a '.$last_net_up_down.' of Ksh. '.number_format($last_net).'.</p>
<p>Based on the due amounts above, the <b>added liability this month resulted to Ksh. '.number_format($monthLiability).'</b> summing up the <b>total liability of the company to Ksh. '.number_format($totalLiability).'</b>.</p>
<p>In the given period, a <b>total of '.number_format($customersTotal).' customers</b> out of the total possible '.number_format($customersrowcount).' customers have ordered various products from the company. This was '.$customers_difference.' from last month where '.number_format($customersTotalLast).' customers made orders. '.$newCustomerStatement.'</p>

<p>In general all the customers had different payment tendencies during the period. The <b>top 5 customers who made the biggest payments</b> during the period with their corresponding payments were as follows:</p>
<ol>
    <b><li>'.$payerList[0][0].' - Ksh.'.number_format($payerList[0][1]).'</li>
    <li>'.$payerList[1][0].' - Ksh.'.number_format($payerList[1][1]).'</li>
    <li>'.$payerList[2][0].' - Ksh.'.number_format($payerList[2][1]).'</li>
    <li>'.$payerList[3][0].' - Ksh.'.number_format($payerList[3][1]).'</li>
    <li>'.$payerList[4][0].' - Ksh.'.number_format($payerList[4][1]).'</li></b>
</ol>
<p>The above customers are the new key customers for the coming month given that they made the biggest orders and made timely payments.</p>
<p>During the month, we had deliverers who made deliveries to the various customers. Each deliverer had their own sub-set of customers that they made deliveries to. The <b>deliverers <u>this month</u> with their corresponding value of worth of orders delivered to customers and amount of money collected</b> durig the period are as follows:</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Deliverer</b></th>
        <th><b>Worth of Sales</b></th>
        <th><b>Amount Collected</b></th> 
    </tr>';
  foreach($delivererSalesMonth as $row){
$deliverer = $row['deliverer'];
  $collected = $row['sum'];
  $worth = $row['worth'];
   $html .= ' <tr>
        <td>'.$deliverer.'</td>
        <td>Ksh. '.number_format($worth).'</td>
        <td>Ksh. '.number_format($collected).'</td>
    </tr>';
  }  
$html .= '</table>
<p>Broken down, The <b>deliverers <u>this past week</u> with their corresponding value of worth of orders delivered to customers and amount of money collected</b> durig the period are as follows:</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Deliverer</b></th>
        <th><b>Worth of Sales</b></th>
        <th><b>Amount Collected</b></th> 
    </tr>';
  foreach($delivererSalesWeek as $row){
$deliverer = $row['deliverer'];
  $collected = $row['sum'];
  $worth = $row['worth'];
   $html .= ' <tr>
        <td>'.$deliverer.'</td>
        <td>Ksh. '.number_format($worth).'</td>
        <td>Ksh. '.number_format($collected).'</td>
    </tr>';
  }  
$html .= '</table>
<p>During the month, we had sales people who did sales to the various food vendors. The <b>sales people <u>this month</u> with their corresponding value of worth of sales done and amount of money collected</b> durig the period are as follows:</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Sales Person</b></th>
        <th><b>Worth of Sales</b></th>
        <th><b>Amount Collected</b></th> 
    </tr>';
  foreach($delivererExtraSalesMonth as $row){
$firstname = $row['firstname'];
$lastname = $row['lastname'];
  $collected = $row['sum'];
  $worth = $row['worth'];
   $html .= ' <tr>
        <td>'.$firstname.' '.$lastname.'</td>
        <td>Ksh. '.number_format($worth).'</td>
        <td>Ksh. '.number_format($collected).'</td>
    </tr>';
  }  
$html .= '</table>
<p>The <b>sales people <u>this past week</u> with their corresponding value of worth of sales done and amount of money collected</b> durig the period are as follows:</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Sales Person</b></th>
        <th><b>Worth of Sales</b></th>
        <th><b>Amount Collected</b></th> 
    </tr>';
  foreach($delivererExtraSalesWeek as $row){
$firstname = $row['firstname'];
$lastname = $row['lastname'];
  $collected = $row['sum'];
  $worth = $row['worth'];
   $html .= ' <tr>
        <td>'.$firstname.' '.$lastname.'</td>
        <td>Ksh. '.number_format($worth).'</td>
        <td>Ksh. '.number_format($collected).'</td>
    </tr>';
  }  
$html .= '</table>
<p>The tables above will be used as the basis to which each and every deliverer will be credited with regards to contribution in company growth.</p>
<h2>Suppliers</h2>
<p>This past month, '.$newSuppliersStatement.'</p>
<h2>Vehicles</h2>
<p>Below is the details for the company vehicles.</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
        <th><b>Registration Number</b></th>
        <th><b>Type</b></th>
        <th><b>Driver</b></th>
        <th><b>Route</b></th> 
    </tr>';
  foreach($vehicleFullDetails as $row){
$reg = $row['Reg_Number'];
  $type = $row['Type'];
  $driverFirstName = $row['firstname'];
  $driverLastName = $row['lastname'];
  $route = $row['Route'];
   $html .= ' <tr>
        <td>'.$reg.'</td>
        <td>'.$type.'</td>
        <td>'.$driverFirstName.' '.$driverLastName.'</td>
         <td>'.$route.'</td>
    </tr>';
  }  
$html .= '</table>
<h4>Inspection</h4>
<p>The current inspection details for the company vehicles are as follows:</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
    <th><b>Registration Number</b></th>
        <th><b>Inspection Date</b></th>
        <th><b>Notes</b></th>
        <th><b>Next Inspection Date</b></th> 
    </tr>';
  foreach($vehicleFullDetails as $row){
    $reg = $row['Reg_Number'];
$Last_Inspection = $row['Last_Inspection'];
  $inspectionNotes = $row['inspectionNotes'];
  $Next_Inspection = $row['Next_Inspection'];
   $html .= ' <tr>
        <td>'.$reg.'</td>
        <td>'.$Last_Inspection.'</td>
        <td>'.$inspectionNotes.'</td>
        <td>'.$Next_Inspection.'</td>
    </tr>';
  }  
$html .= '</table>
<h4>Service</h4>
<p>The current service details for the company vehicles are as follows:</p>
<table border="1" cellspacing="1" cellpadding="4" align="center">
    <tr>
    <th><b>Registration Number</b></th>
        <th><b>Service Date</b></th>
        <th><b>Notes</b></th>
        <th><b>Next Service Date</b></th> 
    </tr>';
  foreach($vehicleFullDetails as $row){
    $reg = $row['Reg_Number'];
$Last_Service = $row['Last_service'];
  $serviceNotes = $row['serviceNotes'];
  $Next_Service = $row['Next_service'];
   $html .= ' <tr>
        <td>'.$reg.'</td>
        <td>'.$Last_Service.'</td>
        <td>'.$serviceNotes.'</td>
        <td>'.$Next_Service.'</td>
    </tr>';
  }  
$html .= '</table>
';


$pdf->writeHTML($html, true, false, true, false, '');
// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
ob_end_clean();
$pdf->Output('Report.pdf', 'I');
