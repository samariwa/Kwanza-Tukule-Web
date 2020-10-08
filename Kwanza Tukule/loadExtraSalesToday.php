<?php
 include('queries.php');
 session_start();
$view = $_SESSION['role'];
 ?>
<table id="extraSalesEditableToday" class="table table-striped table-hover table-responsive  paginate" style="display:block;overflow-x:scroll;overflow-y:scroll;text-align: center;">
      <caption>Sales Done Today</caption>
  <thead class="thead-dark">
    <tr>
      <th scope="col" width="5%">#</th>
      <th scope="col" width="5%">Sales Person</th>
      <th scope="col" width="10%">Contact No.</th>
      <th scope="col" width="20%">Product</th>
      <th scope="col"width="5%">Quantity</th>
      <th scope="col"width="5%">Cost</th>
      <th scope="col"width="5%">Discount</th>
      <th scope="col"width="5%">C/F/Debt</th>
      <?php
       if ($view == 'Software' || $view == 'Director' || $view == 'CEO' || $view == 'Data Entry Clerk' || $view == 'Stores Manager' || $view == 'Stores Supervisor') {

        ?>
      <th scope="col"width="5%">MPesa</th>
      <th scope="col"width="5%">Deposit</th>
      <th scope="col"width="5%">Balance</th>
      <th scope="col"width="5%">Returned</th>
      <th scope="col"width="5%">Banked</th>
      <th scope="col"width="5%">Slip No.</th>
      <th scope="col"width="5%">Banked By</th>
      <th scope="col"width="30%"></th>
      <?php
       }
      ?>
    </tr>
  </thead>
  <tbody >
    <?php
        $count = 0;
        foreach($extraSalesListToday as $row){
         $count++;
         $id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $contact = $row['Number'];
        $product = $row['name'];
        $qty = $row['Quantity'];
        $selling_price = mysqli_query($connection,"SELECT Selling_price FROM (SELECT s.Name as sname,sf.Selling_price as Selling_Price, sf.Created_at,ROW_NUMBER() OVER (PARTITION BY s.id ORDER BY sf.Created_at DESC) as rn FROM stock s JOIN stock_flow sf ON s.id = sf.Stock_id join sales sl on s.id = sl.Stock_id ) q WHERE rn = 1 AND sname = '$product'")or die($connection->error);
         $row2 = mysqli_fetch_array($selling_price);
        $price = $row2['Selling_price'];
        $discount = $row['Discount'];
        $newCost = $price - $discount;
        $cost = $qty * $newCost; 
        $debt = $row['Debt'];
        $mpesa = $row['MPesa'];
        $cash = $row['Cash'];
        $balance = ($mpesa + $cash) + $debt - $cost;
        $returned = $row['Returned'];
        $banked = $row['Banked'];
        $slip = $row['Slip_Number'];
        $banked_by = $row['Banked_By'];
      ?>
    <tr>
      <th scope="row" class="uneditable" id="idToday<?php echo $count; ?>"><?php echo $id; ?></th>
      <?php
        if ($balance == "0.0" ) {
       ?>
      <td style = "background-color: #2ECC71;color: white"class="uneditable" id="nameToday<?php echo $count; ?>"><?php echo $firstname.' '.$lastname; ?></td>
      <?php
       }
        if ($balance  < "0.0" && $balance  >= "-5000.0" ) {
       ?>
      <td style = "background-color: grey;color: white"class="uneditable" id="nameToday<?php echo $count; ?>"><?php echo $firstname.' '.$lastname; ?></td>
      <?php
       }
        if ($balance > "0.0" ) {
       ?>
      <td style = "background-color: orange;color: white"class="uneditable" id="nameToday<?php echo $count; ?>"><?php echo $firstname.' '.$lastname; ?></td>
      <?php
       }
        if ($balance < "-5000.0" ) {
       ?>
      <td style = "background-color: red;color: white"class="uneditable" id="nameToday<?php echo $count; ?>"><?php echo $firstname.' '.$lastname; ?></td>
      <?php
       }
      ?>
      <td class="uneditable" id="numberToday<?php echo $count; ?>"><?php echo $contact; ?></td>
      <td class="uneditable" id="productToday<?php echo $count; ?>"><?php echo $product; ?></td>
      <td class="editable" id="qtyToday<?php echo $count; ?>"><?php echo $qty; ?></td>
      <td class="uneditable" id="costToday<?php echo $id; ?>"><?php echo $cost; ?></td>
      <td class="editable" id="discountToday<?php echo $count; ?>"><?php echo $discount; ?></td>
      <td class="uneditable" id="debtToday<?php echo $count; ?>"><?php echo $debt; ?></td>
       <?php
       if ($view == 'Software' || $view == 'Director' || $view == 'CEO' || $view == 'Data Entry Clerk' || $view == 'Stores Manager' || $view == 'Stores Supervisor') {

        ?>
      <td class="editable" id="mpesaToday<?php echo $count; ?>"><?php echo $mpesa; ?></td>
      <td class="editable" id="cashToday<?php echo $count; ?>"><?php echo $cash; ?></td>
      <td class="uneditable" id="balanceToday<?php echo $id; ?>"><?php echo $balance; ?></td>
      <td class="editable" id="returnedToday<?php echo $count; ?>"><?php echo $returned; ?></td>
      <td class="editable" id="bankedToday<?php echo $count; ?>"><?php echo $banked; ?></td>
      <td class="editable" id="slipToday<?php echo $count; ?>"><?php echo $slip; ?></td>
      <td class="editable" id="bankerToday<?php echo $count; ?>"><?php echo $banked_by; ?></td>
       <td>
          <?php
       if ($view == 'Software'  || $view == 'CEO' || $view == 'Director' || $view == 'Stores Manager') {

        ?>
          <button id="<?php echo $id; ?>" data_id="<?php echo $id; ?>" class="btn btn-danger btn-sm active deleteSalesToday" role="button" aria-pressed="true" onclick="deleteSalesToday(this,<?php echo $id; ?>)"><i class="fa fa-trash"></i>&ensp;Delete</button>
          <?php
          }
          ?>
       </td>
       <?php
         }
       ?>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
 <script src="assets/js/mindmup-editabletable.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript">
  $('#extraSalesEditableToday').editableTableWidget();
  $('#extraSalesEditableToday td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#extraSalesEditableToday td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#idToday${rowx}`).text();
  var qty = $(`#qtyToday${rowx}`).text();
  var mpesa = $(`#mpesaToday${rowx}`).text();
  var cash = $(`#cashToday${rowx}`).text();
  var discount = $(`#discountToday${rowx}`).text();
  var banked = $(`#bankedToday${rowx}`).text();
  var returned = $(`#returnedToday${rowx}`).text();
  var slip = $(`#slipToday${rowx}`).text();
  var banker = $(`#bankerToday${rowx}`).text();
  var where = 'sales';
  $.post("save.php",{id:id,qty:qty,mpesa:mpesa,discount:discount,cash:cash,banked:banked,returned:returned,slip:slip,banker:banker,where:where},
  function(result){
     if (result == 'Unavailable') {
      alert("Quantity Entered Unavailable");
    }
    else{
      $('#extraSalesEditableToday').load("loadExtraSalesToday.php");
  }
  });
});
</script>