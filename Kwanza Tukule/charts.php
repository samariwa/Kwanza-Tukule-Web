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
if($where == 'salescomparison' )
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