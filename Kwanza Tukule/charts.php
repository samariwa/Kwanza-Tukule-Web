<?php
 include('queries.php');
$where =$_POST['where'];
if($where == 'fastmoving' )
{   
       $fastsum = 0;
       $fastmovingproducts = array(['Products', 'Number of products sold']);
        foreach($fastmoving as $row){
        $name = $row['name'];
        $total = $row['sum'];
        $fastsum = $fastsum + $total;
        $resultArray = array($name, $total);
        array_push($fastmovingproducts, $resultArray);
        }
        $row1 = mysqli_fetch_array($sum);
        $totalsum = $row1['sumtotal'];
        $other = $totalsum - $fastsum;
        array_push($fastmovingproducts,['Other',$other]);
       $array = json_encode($fastmovingproducts);
        echo $array;
}  
else if($where == 'biggestPayers' )
{   
       $payerList = array(['Customer', 'Amount Paid']);
        foreach($biggestPayers as $row){
        $name = $row['name'];
        $total = $row['sum'];
        $resultArray = array($name, $total);
        array_push($payerList, $resultArray);
        }
       $array = json_encode($payerList);
        echo $array;
}
else if($where == 'salesTotal')
{   
       $salesTotal = array();
        $row1 = mysqli_fetch_array($salesWk1);
        $total1 = $row1['sum'];
        $row2 = mysqli_fetch_array($salesWk2);
        $total2 = $row2['sum'];
        $row3 = mysqli_fetch_array($salesWk3);
        $total3 = $row3['sum'];
        $row4 = mysqli_fetch_array($salesWk4);
        $total4 = $row4['sum'];
        array_push($salesTotal, $total1);
        array_push($salesTotal, $total2);
        array_push($salesTotal, $total3);
        array_push($salesTotal, $total4);
       $array = json_encode($salesTotal);
        echo $array;
}
else if($where == 'profit/loss')
{   
       $values = array();
        $row1 = mysqli_fetch_array($monthSalesValue);
        $sales = $row1['sum'];
        $row2 = mysqli_fetch_array($monthIncomeValue);
        $income = $row2['sum'];
        $row3 = mysqli_fetch_array($monthExpenseValue);
        $expenses = $row3['sum'];
        $gross = $income - $sales;
        $net = $gross - $expenses;
        array_push($values, $gross);
        array_push($values, $expenses);
        array_push($values, $net);
       $array = json_encode($values);
        echo $array;
}
else if($where == 'salesExpenses')
{   
       $salesExpensesTotal = array();
        $row1 = mysqli_fetch_array($salesWk1);
        $total1 = $row1['sum'];
        $row2 = mysqli_fetch_array($salesWk2);
        $total2 = $row2['sum'];
        $row3 = mysqli_fetch_array($salesWk3);
        $total3 = $row3['sum'];
        $row4 = mysqli_fetch_array($salesWk4);
        $total4 = $row4['sum'];
        $row5 = mysqli_fetch_array($expensesWk1);
        $total5 = $row5['sum'];
        $row6 = mysqli_fetch_array($expensesWk2);
        $total6 = $row6['sum'];
        $row7 = mysqli_fetch_array($expensesWk3);
        $total7 = $row7['sum'];
        $row8 = mysqli_fetch_array($expensesWk4);
        $total8 = $row8['sum'];
        array_push($salesExpensesTotal, $total1);
        array_push($salesExpensesTotal, $total5);
        array_push($salesExpensesTotal, $total2);
        array_push($salesExpensesTotal, $total6);
        array_push($salesExpensesTotal, $total3);
        array_push($salesExpensesTotal, $total7);
        array_push($salesExpensesTotal, $total4);
        array_push($salesExpensesTotal, $total8);
       $array = json_encode($salesExpensesTotal);
        echo $array;
}
else if($where == 'salescomparison' )
{  
    $titleComparison = array('Day');
    $fiveDaysAgo = date('d/m/Y', strtotime("-5 days"));
    $fourDaysAgo = date('d/m/Y', strtotime("-4 days"));
    $threeDaysAgo = date('d/m/Y', strtotime("-3 days"));
    $twoDaysAgo = date('d/m/Y', strtotime("-2 days"));
    $yesterday = "Yesterday";
    $today = "Today";
    $salesComparisonFiveDaysAgo = array($fiveDaysAgo);
    $salesComparisonFourDaysAgo = array($fourDaysAgo);
    $salesComparisonThreeDaysAgo = array($threeDaysAgo);
    $salesComparisonTwoDaysAgo = array($twoDaysAgo);
    $salesComparisonYesterday = array($yesterday);
    $salesComparisonToday = array($today);
    foreach($distributionComparisonFiveDaysAgo as $row){
      $name = $row['deliverer'];
      $sum = $row['count'];
      array_push($titleComparison,$name);
      array_push($salesComparisonFiveDaysAgo,$sum);
    }
    foreach($distributionComparisonThreeDaysAgo as $row){
      $name = $row['deliverer'];
      $sum = $row['count'];
      array_push($salesComparisonThreeDaysAgo,$sum);
    }
    array_push($titleComparison,'Average');
    $arrayTitle = json_encode($titleComparison);
    $row1 = mysqli_fetch_array($distributionTotalThreeDaysAgo);
    $threeDaysAgoSum = $row1['count'];
    array_push($salesComparisonThreeDaysAgo,$threeDaysAgoSum);
    $row3 = mysqli_fetch_array($distributionTotalFiveDaysAgo);
    $fiveDaysAgoSum = $row3['count'];
    array_push($salesComparisonThreeDaysAgo,$fiveDaysAgoSum);
    $finalArray = array($arrayTitle,$salesComparisonFiveDaysAgo,$salesComparisonThreeDaysAgo);
    $array = json_encode($finalArray);
    echo $array;
}
?>