function setTime() {
var d = new Date(),
  el = document.getElementById("time");

  el.innerHTML = formatAMPM(d);

setTimeout(setTime, 1000);
}

function formatAMPM(date) {
  var hours = date.getHours(),
    minutes = date.getMinutes(),
    seconds = date.getSeconds(),
    ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
  return strTime;
}

setTime();

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Products', 'Number of products sold'],
         ['Jahazi Flour', 132],
          ['Dola Flour', 67],
          ['Yellow Beans', 50],
          ['Salit Oil', 70],
          ['Cosmo Flour', 70],
          ['Others', 90]
        ]);
        var options = {
          title: 'Fast moving products',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  1: {offset: 0.2},
                    4: {offset: 0.1},
                    0: {offset: 0.2},
                    2: {offset: 0.1},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Royson', 'Ken', 'Reuben', 'Damaris', 'George', 'Average'],
          ['2004/06/05',  165,      938,         522,             998,           450,      614.6],
          ['2005/06/06',  135,      1120,        599,             1268,          288,      682],
          ['2006/06/07',  157,      1167,        587,             807,           397,      623],
          ['2007/06/08',  139,      1110,        615,             968,           215,      609.4],
          ['2008/06/09',  136,      691,         629,             1026,          366,      569.6]
        ]);

        var options = {
          title : 'Weekly Sales Made per Deliverer',
          vAxis: {title: 'Sales'},
          hAxis: {title: 'Day'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

 $(document).ready(function(){
         $(".paginate").DataTable({
          "ordering": false
         });

       });

   $(document).ready(function(){
         $("#customerOrderSearch").DataTable({
          "ordering": false,
          "pageLength": 5,
          "lengthChange": false,
          "info": false,
           "oLanguage": {
            "sSearch": "<i class='fa fa-search'></i>&ensp;Customer Search:",
            "sZeroRecords": "Customer Not Found"
          }
         });
       });

    $(document).ready(function(){
         $("#productOrderSearch").DataTable({
          "ordering": false,
          "pageLength": 5,
          "lengthChange": false,
          "info": false,
           "oLanguage": {
          "sSearch": "<i class='fa fa-search'></i>&ensp;Product Search:",
          "sZeroRecords": "Product Not Found"
        }
         });
       });

       $(document).ready(function(){
            $('#customerSearch').keyup(function(){
            var txt = $('#customerSearch').val();
            var where = 'customer';
            if(txt != '')
            {
              $.ajax({
                url: 'search.php',
                type:"post",
                data:{search:txt,where:where},
                dataType:"text",
                success:function(data)
                {
                  $('#customer_results').html(data);
                }
              });
            }
            else
            {
              $('#customer_results').html('');
              $.ajax({
                url: 'search.php',
                type:"post",
                data:{search:txt,where:where},
                dataType:"text",
                success:function(data)
                {
                  $('#customer_results').html('');
                }
              });
            }
         });
            $(document).on('click','a',function(){
        $("#customerSearch").val($(this).find('.idX').text());
        $("#customer_results").html('');
        var customerId = $('#customerSearch').val();
           var where = 'customerDetails';
           $.post("search.php",{customerId:customerId,where:where},
            function(result){var data = $.parseJSON(result);
              var customerDetails = "";
              var Name = data[0].Name;
               var Location = data[0].Location;
                var Deliverer = data[0].Deliverer;
            customerDetails += "<h5>Confirm Customer Details</h5>&emsp;&emsp;-";
            customerDetails += "&emsp;&emsp;Name: ";
            customerDetails += Name;
             customerDetails += "<br>&emsp;&emsp;&emsp;&emsp;&ensp;Location: ";
            customerDetails += Location;
             customerDetails += "<br>&emsp;&emsp;&emsp;&emsp;&ensp;Deliverer: ";
            customerDetails += Deliverer;
            if ($('#customerDetails').html('')){
            $("#customerDetails").append(customerDetails);
          }
          });
       });
        });

       function selectCustomer(selection) {
        var id = selection.value;
        var name = $(`#customerName${id}`).text();
        var location = $(`#customerLocation${id}`).text();
        var number = $(`#customerNumber${id}`).text();
        var deliverer = $(`#customerDeliverer${id}`).text();
        var customerDetails = "";
        customerDetails += "<h5>Confirm Customer Details</h5>&emsp;&emsp;-";
            customerDetails += "&emsp;&emsp;Name: ";
            customerDetails += name;
             customerDetails += "<br>&emsp;&emsp;&emsp;&emsp;&ensp;Location: ";
            customerDetails += location;
            customerDetails += "<br>&emsp;&emsp;&emsp;&emsp;&ensp;Contact: ";
            customerDetails += number;
             customerDetails += "<br>&emsp;&emsp;&emsp;&emsp;&ensp;Deliverer: ";
            customerDetails += deliverer;
            if ($('#customerDetails').html('')){
            $("#customerDetails").append(customerDetails);
          }
}

       $(document).ready(function(){
        var txt2 = $('#customerSearch').val();
            $('#productSearch').keyup(function(){
            var txt = $('#productSearch').val();
            var where = 'product';
            if(txt != '')
            {
              $.ajax({
                url: 'search.php',
                type:"post",
                data:{search2:txt,where:where},
                dataType:"text",
                success:function(data)
                {
                  $('#product_results').html(data);
                }
              });
            }
            else
            {
              $('#product_results').html('');
              $.ajax({
                url: 'search.php',
                type:"post",
                data:{search2:txt,where:where},
                dataType:"text",
                success:function(data)
                {
                  $('#product_results').html('');
                }
              });
            }
         });
            $(document).on('click','#selected2',function(){
        $("#productSearch").val($(this).text());
        $("#product_results").html('');
         $("#customerSearch").val(txt2.text());
       });
        });

       
         $(document).ready(function(){
        var txt = $('#productSearch').val();
        var button = document.getElementById('addToCart');
          if ($('#product_results').html('') && txt != '') {
            button.disabled = false;
          }
          else{
            button.disabled = true;
          }
       });



       $(document).ready(function(){
        $('#addToCart').click(function(){
           var productName = $('#productSearch').val();
           var productQty = $('#orderQty').val();
           var where = 'cart';
           $.post("search.php",{productName:productName,where:where},
            function(result){var data = $.parseJSON(result);
              var Quantity = data[0].Quantity;
              alert(Quantity);
              alert(productQty);
               if (productQty > Quantity) {
            var productDetails = "";
            var id = data[0].id;
              var Price = data[0].Price;
                var Total = Price * productQty;
                var initial = $('#cartTotal').html();
                var Cost = +initial + +Total;
                $('#cartTotal').html(Cost);
                productDetails += "<tr>";
                productDetails += `<th id="id${id}" class='uneditable'>${id}</th>`;
                productDetails += `<td id="productName${id}" class='uneditable'>${productName}</td>`;
                productDetails += `<td id="Price${id}" class='uneditable'>${Price}</td>`;
                productDetails += `<td id="productQty${id}" class='editable'>${productQty}</td>`;
                productDetails += `<td class='uneditable'><button onclick="deleteCart();" type='button' class='btn btn-danger btn-sm deleteFromCart' id="deleteFromCart${id}"><i class='fa fa-times-circle'></i>&ensp;Remove</button></td>`;
                productDetails += `<td id="Total${id}" class='uneditable'>${Total}</td>`;
                productDetails += "</tr>";
                $("#cartData").append(productDetails);
              }
              else{
                alert("Quantity of Product ordered is currently unavailable.");
              }
            });
        });
      });

       var cartItems = new Array();
       function cartArray(Id){
          var id = Id;
          var productId = $(`#id${id}`).text();
          var productName = $(`#name${id}`).text();
          var productPrice = $(`#sp${id}`).text();
          var quantity = '1';
           cartItems.push([productId,productName, productPrice,quantity]);
               alert(cartItems);
       };


   function deleteCart(){
    var el = $(this);
    var id = el.attr("id");
    alert(`#id${id}`);
      bootbox.confirm('Do you really want to remove the seleted item from the cart?',function(result)
        {if(result){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();

    });
  }
 });
  }

         $(document).ready(function(){
        $('.completeOrder').click(function(){
            alert("Weeb");
        });
      });



       function fineCustomer(idx){
           var id = idx;
           var balance = $(`#balance${id}`).text();
              var where = 'fine';
              $.post("save.php",{id:id,balance:balance,where:where},
              function(result){
                if (result == "positive") {
                  alert("Customer has no negative balance. Action not allowed.");
                }
                if (result == "exists") {
                  alert("Customer has already been fined. Action not allowed.");
                }
              });
       }

       function deleteOrder(idx){
        var id = idx;
        var cost = $(`#cost${id}`).text();
        var where = 'order';
            bootbox.confirm('Do you really want to delete the selected order?',function(result)
        {if(result){
          $.post("delete.php",{id:id,cost:cost,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
       }


   $('#cartEditable').editableTableWidget();
  $('#cartEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#cartEditable td').on('change', function(evt, newValue) {    
    return true;
});

  $('#customersEditable').editableTableWidget();
  $('#customersEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#customersEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var name = $(`#name${rowx}`).text();
  var number = $(`#number${rowx}`).text();
  var location = $(`#location${rowx}`).text();
  var deliverer = $(`#deliverer${rowx}`).text();
  var note = $(`#note${rowx}`).text();
  var where = 'customer';
  $.post("save.php",{id:id,name:name,location:location,number:number,deliverer:deliverer,note:note,where:where},
  function(result){});
});


  $('#stockEditable').editableTableWidget();
  $('#stockEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#stockEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var category = $(`#category${rowx}`).text();
  var name = $(`#name${rowx}`).text();
  var bp = $(`#bp${rowx}`).text();
  var sp = $(`#sp${rowx}`).text();
  var qty = $(`#qty${rowx}`).text();
  var where = 'stock';
  $.post("save.php",{id:id,name:name,bp:bp,category:category,qty:qty,sp:sp,where:where},
  function(result){alert(result);});
});


$('#blacklistEditable').editableTableWidget();
  $('#blacklistEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#blacklistEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var location = $(`#location${rowx}`).text();
  var number = $(`#number${rowx}`).text();
  var balance = $(`#balance${rowx}`).text();
  var where = 'blacklist';
  $.post("save.php",{id:id,location:location,number:number,balance:balance,where:where},
  function(result){});
});  


$('#categoriesEditable').editableTableWidget();
  $('#categoriesEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#categoriesEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var name = $(`#category${rowx}`).text();
  var where = 'categories';
  $.post("save.php",{id:id,name:name,where:where},
  function(result){});
}); 

$('#suppliersEditable').editableTableWidget();
  $('#suppliersEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#suppliersEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var contact = $(`#contact${rowx}`).text();
  var where = 'suppliers';
  $.post("save.php",{id:id,contact:contact,where:where},
  function(result){});
});  

$('#vehiclesEditable').editableTableWidget();
  $('#vehiclesEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#vehiclesEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var route = $(`#route${rowx}`).text();
  var where = 'vehicles';
  $.post("save.php",{id:id,route:route,where:where},
  function(result){});
});  

  $('#deliverersEditable').editableTableWidget();
  $('#deliverersEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#deliverersEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var contact = $(`#contact${rowx}`).text();
  var staffId = $(`#staffId${rowx}`).text();
  var nationalId = $(`#nationalId${rowx}`).text();
  var salary = $(`#salary${rowx}`).text();
  var where = 'deliverer';
  $.post("save.php",{id:id,contact:contact,staffId:staffId,nationalId:nationalId,salary:salary,where:where},
  function(result){});
});  

   $('#cooksEditable').editableTableWidget();
  $('#cooksEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#cooksEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var contact = $(`#contact${rowx}`).text();
  var staffId = $(`#staffId${rowx}`).text();
  var nationalId = $(`#nationalId${rowx}`).text();
  var salary = $(`#salary${rowx}`).text();
  var where = 'cook';
  $.post("save.php",{id:id,contact:contact,staffId:staffId,nationalId:nationalId,salary:salary,where:where},
  function(result){});
});

$('#officeEditable').editableTableWidget();
  $('#officeEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#officeEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var contact = $(`#contact${rowx}`).text();
  var staffId = $(`#staffId${rowx}`).text();
  var nationalId = $(`#nationalId${rowx}`).text();
  var salary = $(`#salary${rowx}`).text();
  var role = $(`#role${rowx}`).text();
  var where = 'office';
  $.post("save.php",{id:id,contact:contact,staffId:staffId,nationalId:nationalId,salary:salary,role:role,where:where},
  function(result){});
});  

  $('#salesEditable').editableTableWidget();
  $('#salesEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});  

  $('#salesEditable').editableTableWidget();
  $('#salesEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#salesEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var qty = $(`#qty${rowx}`).text();
  var mpesa = $(`#mpesa${rowx}`).text();
  var cash = $(`#cash${rowx}`).text();
  var date = $(`#date${rowx}`).text();
  var banked = $(`#banked${rowx}`).text();
  var slip = $(`#slip${rowx}`).text();
  var banker = $(`#banker${rowx}`).text();
  var where = 'orders';
  $.post("save.php",{id:id,qty:qty,mpesa:mpesa,cash:cash,date:date,banked:banked,slip:slip,banker:banker,where:where},
  function(result){});
}); 

   $('#expenseHeadingEditable').editableTableWidget();
  $('#expenseHeadingEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#expenseHeadingEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var name = $(`#name${rowx}`).text();
  var where = 'expenseHeading';
  $.post("save.php",{id:id,name:name,where:where},
  function(result){});
}); 

  $('#expensesEditable').editableTableWidget();
  $('#expensesEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#expensesEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var party = $(`#party${rowx}`).text();
   var total = $(`#total${rowx}`).text();
    var paid = $(`#paid${rowx}`).text();
     var due = total - paid;
     var date = $(`#date${rowx}`).text();
  var where = 'expense';
  $.post("save.php",{id:id,party:party,total:total,paid:paid,due:due,date:date,where:where},
  function(result){});
}); 

  $(document).on('click','#addCustomer',function(){
        var name = $('#name').val();
        var number = $('#number').val();
        var location = $('#location').val();
        var deliverer = $('#deliverer').val();
        var where = 'customer';
        $.post("add.php",{name:name,number:number,location:location,deliverer:deliverer,where:where},
        function(result){
         if (result == 'success') {
          alert('Customer Added Successfully');
         }
          else if (result == 'exists') {
          alert('Customer Already Exists');
         }
           else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addStock',function(){
        var name = $('#name').val();
        var category = $('#category').val();
        var supplier = $('#supplier').val();
        var received = $('#received').val();
        var expiry = $('#expiry').val();
        var bp = $('#bp').val();
        var sp = $('#sp').val();
        var qty = $('#qty').val();
        var where = 'stock';
        $.post("add.php",{name:name,category:category,supplier:supplier,received:received,expiry:expiry,bp:bp,sp:sp,qty:qty,where:where},
        function(result){
         if (result == 'success') {
          alert('Stock Added Successfully');
         }
          else if (result == 'exists') {
          alert('Stock Already Exists');
         }
         else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addCategory',function(){
        var category = $('#category').val();
        var where = 'categories';
        $.post("add.php",{category:category,where:where},
        function(result){
         if (result == 'success') {
          alert('Category Added Successfully');
         }
          else if (result == 'exists') {
          alert('Category Already Exists');
         }
         else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addSupplier',function(){
        var name = $('#name').val();
         var contact = $('#contact').val();
        var where = 'supplier';
        $.post("add.php",{name:name,contact:contact,where:where},
        function(result){
         if (result == 'success') {
          alert('Supplier Added Successfully');
         }
          else if (result == 'exists') {
          alert('Supplier Already Exists');
         }
           else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addNote',function(){
        var title = $('#title').val();
         var message = $('#body').val();
         var radios = document.getElementsByName('access');
          for (var i = 0, length = radios.length; i < length; i++) {
          if (radios[i].checked) {
            var access = radios[i].value;
          }
         }
        var where = 'note';
        $.post("add.php",{title:title,message:message,access:access,where:where},
        function(result){
         if (result == 'success') {
          alert('Note Added Successfully');
         }
           else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addVehicle',function(){
        var type = $('#type').val();
         var driver = $('#driver').val();
         var reg = $('#reg').val();
         var route = $('#route').val();
        var where = 'vehicles';
        $.post("add.php",{type:type,driver:driver,reg:reg,route:route,where:where},
        function(result){
         if (result == 'success') {
          alert('Vehicle Added Successfully');
         }
          else if (result == 'exists') {
          alert('Vehicle Already Exists');
         }
          else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addExpense',function(){
        var heading = $('#heading').val();
         var party = $('#party').val();
         var total = $('#total').val();
         var paid = $('#paid').val();
         var due = total - paid;
         var date = $('#date').val();
        var where = 'expense';
        $.post("add.php",{heading:heading,party:party,total:total,paid:paid,due:due,date:date,where:where},
        function(result){
         if (result == 'success') {
          alert('Expense Added Successfully');
         }
          else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addExpenseHeading',function(){
        var heading = $('#heading').val();
        var where = 'expenseHeading';
        $.post("add.php",{heading:heading,where:where},
        function(result){
          alert(result);
         if (result == 'success') {
          alert('Expense Heading Added Successfully');
         }
          else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addDeliverer',function(){
        var fname = $('#fname').val();
         var lname = $('#lname').val();
         var contact = $('#contact').val();
         var staffId = $('#staffId').val();
         var nationalId = $('#nationalId').val();
         var yob = $('#yob').val();
         var gender = $('#gender').val();
         var salary = $('#salary').val();
        var where = 'deliverer';
        $.post("add.php",{fname:fname,lname:lname,contact:contact,staffId:staffId,nationalId:nationalId,yob:yob,gender:gender,salary:salary,where:where},
        function(result){
         if (result == 'success') {
          alert('Deliverer Added Successfully');
         }
          else if (result == 'exists') {
          alert('Deliverer Already Exists');
         }
          else{
          alert("Something went wrong");
         }
         });
       });

  $(document).on('click','#addCook',function(){
        var fname = $('#fname').val();
         var lname = $('#lname').val();
         var contact = $('#contact').val();
         var staffId = $('#staffId').val();
         var nationalId = $('#nationalId').val();
         var yob = $('#yob').val();
         var gender = $('#gender').val();
         var salary = $('#salary').val();
        var where = 'cook';
        $.post("add.php",{fname:fname,lname:lname,contact:contact,staffId:staffId,nationalId:nationalId,yob:yob,gender:gender,salary:salary,where:where},
        function(result){
         if (result == 'success') {
          alert('Cook Added Successfully');
         }
          else if (result == 'exists') {
          alert('Cook Already Exists');
         }
          else{
          alert("Something went wrong");
         }
         });
       });

   $(document).on('click','#addOfficeStaff',function(){
        var fname = $('#fname').val();
         var lname = $('#lname').val();
         var contact = $('#contact').val();
         var staffId = $('#staffId').val();
         var nationalId = $('#nationalId').val();
         var yob = $('#yob').val();
         var gender = $('#gender').val();
         var role = $('#role').val();
         var salary = $('#salary').val();
        var where = 'office';
        $.post("add.php",{fname:fname,lname:lname,contact:contact,staffId:staffId,nationalId:nationalId,yob:yob,role:role,gender:gender,salary:salary,where:where},
        function(result){
         if (result == 'success') {
          alert('Office Staff Added Successfully');
         }
          else if (result == 'exists') {
          alert('Office Staff Already Exists');
         }
          else{
          alert("Something went wrong");
         }
         });
       });

  $(document).ready(function(){
    $('.deleteCustomer').click(function(){
      var el = $(this);
      var where = 'customer';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected customer?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

  $(document).ready(function(){
    $('.deleteStock').click(function(){
      var el = $(this);
      var where = 'stock';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected stock?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

  $(document).ready(function(){
    $('.deleteBlacklist').click(function(){
      var el = $(this);
      var where = 'blacklist';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected blacklisted customer?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

  $(document).ready(function(){
    $('.deleteExpenseHeading').click(function(){
      var el = $(this);
      var where = 'expenseHeading';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected expense heading?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

  $(document).ready(function(){
    $('.deleteExpense').click(function(){
      var el = $(this);
      var where = 'expense';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected expense?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });


  $(document).ready(function(){
    $('.deleteCategory').click(function(){
      var el = $(this);
      var where = 'category';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected category?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

  $(document).ready(function(){
    $('.deleteSupplier').click(function(){
      var el = $(this);
      var where = 'supplier';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected supplier?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

   $(document).ready(function(){
    $('.deleteVehicle').click(function(){
      var el = $(this);
      var where = 'vehicle';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected vehicle?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

   $(document).ready(function(){
    $('.deleteDeliverer').click(function(){
      var el = $(this);
      var where = 'deliverer';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected deliverer?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

   $(document).ready(function(){
    $('.deleteCook').click(function(){
      var el = $(this);
      var where = 'cook';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected cook?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

   $(document).ready(function(){
    $('.deleteOffice').click(function(){
      var el = $(this);
      var where = 'office';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected office staff?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

   $(document).ready(function(){
    $('.deletePublicNote').click(function(){
      var el = $(this);
      var where = 'publicNote';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected note?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest(`#card${id}`).css('background','silver');
              $(el).closest(`#card${id}`).fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

   $(document).ready(function(){
    $('.deletePrivateNote').click(function(){
      var el = $(this);
      var where = 'privateNote';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to delete the selected note?',function(result)
        {if(result){
          $.post("delete.php",{id:id,where:where},
        function(result){  
          alert(result);
            if(result == 1){
              $(el).closest(`#card${id}`).css('background','silver');
              $(el).closest(`#card${id}`).fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

  $(document).ready(function(){
    $('.blacklistCustomer').click(function(){
      var el = $(this);
      var where = 'blacklist';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to blacklist the selected customer?',function(result)
        {if(result){
          $.post("blacklist_restore.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','gray');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
            else{
              alert("Error: Selected Customer hasn't made any order yet.");
            }
        });
      }});
    });
  });

  $(document).ready(function(){
    $('.restoreBlacklist').click(function(){
      var el = $(this);
      var where = 'restore';
      var id = el.attr("id");
      bootbox.confirm('Do you really want to restore the selected blacklisted customer?',function(result)
        {if(result){
          $.post("blacklist_restore.php",{id:id,where:where},
        function(result){  
            if(result == 1){
              $(el).closest('tr').css('background','lime');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
              });
            }
        });
      }});
    });
  });

  $(document).on('click','.editPublicNote',function(){
        var where = 'publicNote';
        var el = $(this);
        var id = el.attr("id");
        var title = $(`#title${id}`).val();
        var body = $(`#body${id}`).val();
        $.post("save.php",{id:id,title:title,body:body,where:where},
        function(result){
         });
       });

  $(document).on('click','.editPrivateNote',function(){
        var where = 'privateNote';
        var el = $(this);
        var id = el.attr("id");
        var title = $(`#title${id}`).val();
        var body = $(`#body${id}`).val();
        $.post("save.php",{id:id,title:title,body:body,where:where},
        function(result){
         });
       });

  $(document).on('click','.addPurchase',function(){
        var where = 'purchase';
        var el = $(this);
        var id = el.attr("id");
        alert(id);
        var received = $(`#received${id}`).val();
        var qty = $(`#qty${id}`).val();
         var bp = $(`#bp${id}`).val();
        var sp = $(`#sp${id}`).val();
        var expiry = $(`#expiry${id}`).val();
        $.post("add.php",{id:id,received:received,qty:qty,bp:bp,sp:sp,expiry:expiry,where:where},
        function(result){

         });
       });

 $(document).on('click','.printCustomers',function(){
                $.ajax({
                    url: 'customersPrint.php',
                    type: 'get',
                    dataType: 'html',
                    success:function(data) {
                        var mywindow = window.open('', 'Kwanza Tukule', 'height=400,width=600');
                        mywindow.document.write('<html><head><title></title>');
                        mywindow.document.write('</head><body>');
                        mywindow.document.write(data);
                        mywindow.document.write('</body></html>');
                        mywindow.document.close();
                        mywindow.focus();
                        mywindow.print();
                        mywindow.close();

                    }
        });
    });

 $(document).on('click','.printSales',function(){
                $.ajax({
                    url: 'salesPrint.php',
                    type: 'get',
                    dataType: 'html',
                    success:function(data) {
                        var mywindow = window.open('', 'Kwanza Tukule', 'height=400,width=600');
                        mywindow.document.write('<html><head><title></title>');
                        mywindow.document.write('</head><body>');
                        mywindow.document.write(data);
                        mywindow.document.write('</body></html>');
                        mywindow.document.close();
                        mywindow.focus();
                        mywindow.print();
                        mywindow.close();

                    }
        });
    });

  $(document).on('click','.printGatePass',function(){
         var deliverer = $(`#deliverer`).val();
        var time = $(`#gatePassTime`).val();
        $.post("gatePassPDF.php",{deliverer:deliverer,time:time},
        function(result){ var mywindow = window.open('', 'Kwanza Tukule', 'height=400,width=600');
                        mywindow.document.write('<html><head><title></title>');
                        mywindow.document.write('</head><body>');
                        mywindow.document.write(result);
                        mywindow.document.write('</body></html>');
                        mywindow.document.close();
                        mywindow.focus();
                        mywindow.print();
                        mywindow.close();
         });
       });

  $(document).on('click','.printDistribution',function(){
         var deliverer = $(`#deliverer`).val();
        var time = $(`#distributionTime`).val();
        $.post("distributionPDF.php",{deliverer:deliverer,time:time},
        function(result){
           var mywindow = window.open('', 'Kwanza Tukule', 'height=400,width=600');
                        mywindow.document.write('<html><head><title></title>');
                        mywindow.document.write('</head><body>');
                        mywindow.document.write(result);
                        mywindow.document.write('</body></html>');
                        mywindow.document.close();
                        mywindow.focus();
                        mywindow.print();
                        mywindow.close();
         });
       });

  
