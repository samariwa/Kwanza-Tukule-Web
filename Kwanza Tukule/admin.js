$(function() {
    "use strict";
    $(function() {
        $(".preloader").fadeOut();
    });

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
         var where = 'fastmoving';
       $.post("charts.php",{where:where},
        function(result){
          var data = $.parseJSON(result);
          var data0 = data[0][0];
          var data1 = data[0][1];
          var data2 = data[1][0];
          var data3 = data[1][1];
          var data4 = data[2][0];
          var data5 = data[2][1];
          var data6 = data[3][0];
          var data7 = data[3][1];
          var data8 = data[4][0];
          var data9 = data[4][1];
          var data10 = data[5][0];
          var data11 = data[5][1];
          var data12 = data[6][0];
          var data13 = data[6][1];
        var data = google.visualization.arrayToDataTable([
          [data0, data1],
         [data2, parseInt(data3)],
          [data4, parseInt(data5)],
          [data6, parseInt(data7)],
          [data8, parseInt(data9)],
          [data10, parseInt(data11)],
          [data12, parseInt(data13)],
        ]);
        var options = {
          title: 'Fast moving products',
          legend: 'none',
           is3D:true,
          pieSliceText: 'label',
          slices: {  1: {offset: 0.2},
                    4: {offset: 0.1},
                    0: {offset: 0.2},
                    2: {offset: 0.1},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        });
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var where = 'salescomparison';
       $.post("charts.php",{where:where},
        function(result){
          //alert(result);
                   var data = google.visualization.arrayToDataTable([
          ['Day', 'Royson', 'Ken', 'Reuben', 'Damaris', 'George', 'Average'],
          ['07/08/2020',  165,      938,         522,             998,           450,      614.6],
          ['08/08/2020',  135,      1120,        599,             1268,          288,      682],
          ['09/08/2020',  157,      1167,        587,             807,           397,      623],
          ['10/08/2020',  139,      1110,        615,             968,           215,      609.4],
          ['Yesterday',  136,      691,         629,             1026,          366,      569.6],
          ['Today',  136,      691,         629,             1026,          366,      569.6],
        ]);

        var options = {
          title : 'Weekly Sales Made per Deliverer',
          vAxis: {title: 'Sales'},
          hAxis: {title: 'Day'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        });
      }

      google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawExpenditureChart);
    function drawExpenditureChart() {
      var data = google.visualization.arrayToDataTable([
        ["Expense", "Amount", { role: "style" } ],
        ["Electricity", 24000, "#b87333"],
        ["Rent", 72000, "silver"],
        ["Premises Service", 20000, "gold"],
        ["Vehicle Service", 50000, "color: #e5e4e2"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Expenditure comparison for the month",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawKeyCustomersChart);
      function drawKeyCustomersChart() {
        var where = 'biggestPayers';
       $.post("charts.php",{where:where},
        function(result){
          var data = $.parseJSON(result);
          var data0 = data[0][0];
          var data1 = data[0][1];
          var data2 = data[1][0];
          var data3 = data[1][1];
          var data4 = data[2][0];
          var data5 = data[2][1];
          var data6 = data[3][0];
          var data7 = data[3][1];
          var data8 = data[4][0];
          var data9 = data[4][1];
        var data = google.visualization.arrayToDataTable([
          [data0, data1],
         [data2, parseInt(data3)],
          [data4, parseInt(data5)],
          [data6, parseInt(data7)],
          [data8, parseInt(data9)]
        ]);

        var options = {
          title: 'Biggest payers of the month',
          width:500,
        };

        var chart = new google.visualization.PieChart(document.getElementById('keyCutomersChart'));
        chart.draw(data, options);
        });
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawRevenueExpenseChart);

      function drawRevenueExpenseChart() {
        var where = 'salesExpenses';
       $.post("charts.php",{where:where},
        function(result){
          var data = $.parseJSON(result);
          var data0 = data[0];
          var data1 = data[1];
          var data2 = data[2];
          var data3 = data[3];
          var data4 = data[4];
          var data5 = data[5];
          var data6 = data[6];
          var data7 = data[7];
        var data = google.visualization.arrayToDataTable([
          ['Week', 'Sales', 'Costs'],
          ['Week 1',  parseInt(data0),  parseInt(data1)],
          ['Week 2', parseInt(data2),   parseInt(data3)],
          ['Week 3', parseInt(data4),    parseInt(data5)],
          ['Week 4', parseInt(data6),    parseInt(data7)]
        ]);

        var options = {
          title: 'Sales & Variable-Costs Comparison for the month',
          hAxis: {title: 'Week',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_divide'));
        chart.draw(data, options);
        });
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawProfitChart);

      function drawProfitChart() {
        var where = 'profit/loss';
       $.post("charts.php",{where:where},
        function(result){
           var data = $.parseJSON(result);
          var data0 = data[0];
          var data1 = data[1];
          var data2 = data[2];
          var data3 = 0;
          var data4 = 0;
          if (data0 > 0 && data2 > 0) {
          var data = google.visualization.arrayToDataTable([
          ['Title', 'Amount'],
          ['Gross Profit',  parseInt(data0)],
          ['Expenditure',  parseInt(data1)],
          ['Net Profit', parseInt(data2)],
        ]);

        var options = {
          title: 'Profit for the month',
          pieHole: 0.7,
          pieSliceText:'none',

        };
          }
          else if (data0 < 0 && data2 < 0) {
            data3 = data3 - data0;
            data4 = parseInt(data1) + parseInt(data3);
            var data = google.visualization.arrayToDataTable([
          ['Title', 'Amount'],
          ['Gross Loss',  parseInt(data3)],
          ['Expenditure',  parseInt(data1)],
          ['Net Loss', parseInt(data4)],
        ]);

        var options = {
          title: 'Loss for the month',
          pieHole: 0.7,
          pieSliceText:'none',

        };
          }
         else if (data0 > 0 && data2 < 0) {
            data4 = parseInt(data1) - parseInt(data0);
            var data = google.visualization.arrayToDataTable([
          ['Title', 'Amount'],
          ['Gross Profit',  parseInt(data0)],
          ['Expenditure',  parseInt(data1)],
          ['Net Loss', parseInt(data4)],
        ]);

        var options = {
          title: 'Loss for the month',
          pieHole: 0.7,
          pieSliceText:'none',

        };
          }
        var chart = new google.visualization.PieChart(document.getElementById('profitchart'));
        chart.draw(data, options);
        });
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSalesChart);

      function drawSalesChart() {
        var where = 'salesTotal';
       $.post("charts.php",{where:where},
        function(result){
          var data = $.parseJSON(result);
          var data0 = data[0];
          var data1 = data[1];
          var data2 = data[2];
          var data3 = data[3];
        var data = google.visualization.arrayToDataTable([
          ['Week ', 'Sales'],
          ['Week 1',  parseInt(data0)],
          ['Week 2',  parseInt(data1)],
          ['Week 3',  parseInt(data2)],
          ['Week 4',  parseInt(data3)]
        ]);

        var options = {
          title: 'Total sales value for the month',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
        });
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
});
/*
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
*/

$('.salesTab').on('click', function(){
    $('.salesTab').removeClass('selected');
    $('.tab-pane fade').removeClass('show active');
    $(this).addClass('selected');
    $('.tab-pane fade').addClass('active');
});

function updateProfile(){
  var username = $(`#username`).val();
  var email = $(`#email`).val();
  var number = $(`#number`).val();
  var nationalid = $(`#nationalid`).val();
  var staffid = $(`#staffid`).text();
   var where = 'profile';
  $.post("save.php",{staffid:staffid,username:username,email:email,number:number,nationalid:nationalid,where:where},
  function(result){if (result == 'saved') {alert("Profile Updated");}});
}

var customerArr = new Array();
function selectCustomer(selection) {
        var id = selection.value;
        customerArr.push(id);
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

       var cartItems = new Array();
       function cartArray(Id){
          var id = Id;
          var productId = $(`#id${id}`).text();
          var productName = $(`#name${id}`).text();
          var productPrice = $(`#sp${id}`).text();
          var quantity = '1';
          var discount = '0';
          var button = document.getElementById(id);
          button.disabled = true;
           cartItems.push([productId,productName, productPrice,quantity, discount]);
               populateCart();
       };


       function populateCart(){
        productDetails = "";
        var initial = $('#cartTotal').html();
        for (var i = 0; i < cartItems.length; i++) {
          var id =cartItems[i][0];
          var price = cartItems[i][2];
          var name = cartItems[i][1];
          var qty = cartItems[i][3];
          var discount = cartItems[i][4];
          var cost = price - discount;
          var subTotal = cost  * qty;
          var Total = +initial + +subTotal;
          $('#cartTotal').html(Total);
          productDetails += `<tr style="text-align: center;">
           <td class="uneditable">${id}</td>
            <td class="uneditable">${cartItems[i][1]}</td>
             <td class="uneditable" id="price${id}">${price}</td>
              <td class="editable" id="quantity${id}">${qty}</td>
              <td class="editable" id="discount${id}">${discount}</td>
               <td> <button class="btn"><i onclick="upQuantity(${id},${price},${qty})" class='fa fa-plus'></i></button><button class="btn"><i onclick="downQuantity(${id},${price},${qty})" class='fa fa-minus'></i></button><button onclick="deleteCart(${id},this,${price},${qty})"  type='button' class='btn btn-danger btn-sm deleteFromCart' ><i class='fa fa-times-circle'></i>&ensp;Remove</button></td>
              <td class="uneditable" id="subTotal${id}">${subTotal}</td>
                 </tr>`;
                 $('#cartData').html(productDetails);
         $('#cartEditable').editableTableWidget();
          $('#cartEditable td.uneditable').on('change', function(evt, newValue) {
          return false;
        });
          $('#cartEditable td').on('change', function(evt, newValue) {
            for (var i = 0; i < cartItems.length; i++) {
              if (parseInt($(`#quantity${cartItems[i][0]}`).html()) == newValue) {
                if (newValue <= parseInt($(`#qty${cartItems[i][0]}`).html())) {
                  var cost = parseInt($(`#price${cartItems[i][0]}`).html()) - parseInt($(`#discount${cartItems[i][0]}`).html());
                  newSub = newValue * cost;
                  cartItems[i][3] = newValue;
                  $(`#subTotal${cartItems[i][0]}`).html(newSub);
                } else {
                  alert('Quantity Not Available');
                  return false;
                }
              }
              if (parseInt($(`#discount${cartItems[i][0]}`).html()) == newValue) {
                if (newValue <= parseInt($(`#price${cartItems[i][0]}`).html())) {
                  var cost = parseInt($(`#price${cartItems[i][0]}`).html()) - newValue;
                  newSub2 = parseInt($(`#quantity${cartItems[i][0]}`).html()) * cost;
                  cartItems[i][4] = newValue;
                  $(`#subTotal${cartItems[i][0]}`).html(newSub2);
                } else {
                  alert('Discount cannot be greater than unit price.');
                  return false;
                }
              }
            }
            calculateTotal();
        });
        }
       }

       function calculateTotal(){
         var total=0;
         for (var i = 0; i < cartItems.length; i++) {
           total = total + parseInt($(`#subTotal${cartItems[i][0]}`).html());
         }
         $(`#cartTotal`).html(total)
       }
       function upQuantity(a,b,c){
         for (var i = 0; i < cartItems.length; i++) {
           if (cartItems[i][0]==a) {
             currentQ = cartItems[i][3];
             newQ = parseInt(currentQ) + 1;
             if (newQ <= parseInt($(`#qty${cartItems[i][0]}`).html())) {
               cartItems[i][3] = newQ;
             }else {
               alert('Quantity Not Available');
             }

           }
         }
         populateCart();
         calculateTotal();
       }
       function downQuantity(a,b,c){
         for (var i = 0; i < cartItems.length; i++) {
           if (cartItems[i][0]==a) {
             currentQ = cartItems[i][3];
             if (currentQ > 1) {
               newQ = parseInt(currentQ) - 1;
               cartItems[i][3] = newQ;
             }else {
               alert('Quantity cannot be below 1');
             }
           }
         }
         populateCart();
         calculateTotal();
       }

   /* function sumCart(){
      var table = document.getElementById("cartEditable");
      var sum = 0;
      for(var i =1; i < table.rows.length; i++){
        sum = sum + parseInt(table.rows[i].cells[5].innerHTML);
      }
      $('#cartTotal').html(sum);
    }
*/


   function deleteCart(id,item,price,qty){
    var el = item;
    var id = id;
    var subTotal = price * qty;
     var initial = $('#cartTotal').html();
     var Total = +initial - +subTotal;
      bootbox.confirm('Do you really want to remove the seleted item from the cart?',function(result)
        {if(result){
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800,function(){
                $(this).remove();
     });
        $('#cartTotal').html(Total);
        var button = document.getElementById(id);
        button.disabled = false;
        var position = cartItems.indexOf(id);
        cartItems.splice([0]);
    }
  });
}

function getIndexOfProduct(arr, k) {
  for (var i = 0; i < arr.length; i++) {
    var index = arr[i].indexOf(k);
    if (index > -1) {
      return [i, index];
    }
  }
}

         $(document).ready(function(){
        $('.completeOrder').click(function(){
            completeOrderBalance(customerArr[0],cartItems);
        });
      });


      function completeOrderBalance(custID,cartArr){
        for (var i = 0; i < cartArr.length; i++) {
          var stockID = cartArr[i][0];
          $.post("add.php",{where:'order',price:cartArr[i][2],quantity:cartArr[i][3], discount:cartArr[i][4] ,customer:custID, stockid:cartArr[i][0], lateOrder:$(`#deliveryDate`).val()},
          function(result){
            if (result=='success') {
                cartArr.shift();
            }
            else if(result=='unavailable'){
                alert("Quantity for stock id "+ stockID +" reduced below ordered quantity in ordering process. Order for the prodcust could not be completed.");
            }
          });
        }
          alert("Order Successfully Added");
      }

      function fineCustomerLastMonth(idx){
           var id = idx;
           var balance = $(`#balanceLastMonth${id}`).text();
              var where = 'fine';
              $.post("save.php",{id:id,balance:balance,where:where},
              function(result){
                //alert(result);
                location.reload(true);
                var obj = parseJSON(result);
              //  alert(`Message: ${obj.msg}`);
              });
       }


       function fineCustomerYesterday(idx){
           var id = idx;
           var balance = $(`#balanceYesterday${id}`).text();
              var where = 'fine';
              $.post("save.php",{id:id,balance:balance,where:where},
              function(result){
                //alert(result);
                location.reload(true);
                var obj = parseJSON(result);
              //  alert(`Message: ${obj.msg}`);
              });
       }

       function fineCustomerToday(idx){
           var id = idx;
           var balance = $(`#balanceToday${id}`).text();
              var where = 'fine';
              $.post("save.php",{id:id,balance:balance,where:where},
              function(result){
                //alert(result);
                location.reload(true);
                var obj = parseJSON(result);
              //  alert(`Message: ${obj.msg}`);
              });
       }

       function fineCustomerTomorrow(idx){
           var id = idx;
           var balance = $(`#balanceTomorrow${id}`).text();
              var where = 'fine';
              $.post("save.php",{id:id,balance:balance,where:where},
              function(result){
                //alert(result);
                location.reload(true);
                var obj = parseJSON(result);
              //  alert(`Message: ${obj.msg}`);
              });
       }

       function deleteOrderLastMonth(order,idx){
        var id = idx;
        var el = order;
        var cost = $(`#costLastMonth${id}`).text();
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

       function deleteOrderNextMonth(order,idx){
        var id = idx;
        var el = order;
        var cost = $(`#costNextMonth${id}`).text();
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

       function deleteOrderYesterday(order,idx){
        var id = idx;
        var el = order;
        var cost = $(`#costYesterday${id}`).text();
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

       function deleteOrderToday(order,idx){
        var id = idx;
        var el = order;
        var cost = $(`#costToday${id}`).text();
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

       function deleteOrderTomorrow(order,idx){
        var id = idx;
        var el = order;
        var cost = $(`#costTomorrow${id}`).text();
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
  var restock_Level = $(`#restock_Level${rowx}`).text();
  var where = 'stock';
  $.post("save.php",{id:id,name:name,bp:bp,restock_Level:restock_Level,category:category,qty:qty,sp:sp,where:where},
  function(result){});
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

  $('#damagedEditable').editableTableWidget();
  $('#damagedEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#damagedEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var qty = $(`#newDamaged${rowx}`).text();
  var where = 'damaged';
  $.post("save.php",{id:id,qty:qty,where:where},
  function(result){
    location.reload(true);
  });
});

  $('#leftoversEditable').editableTableWidget();
  $('#leftoversEditable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#leftoversEditable td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#id${rowx}`).text();
  var difference = $(`#difference${rowx}`).text();
  var where = 'leftovers';
  $.post("save.php",{id:id,difference:difference,where:where},
  function(result){
    location.reload(true);
  });
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

  $('#salesEditableLastMonth').editableTableWidget();
  $('#salesEditableLastMonth td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#salesEditableLastMonth td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#idLastMonth${rowx}`).text();
  var qty = $(`#qtyLastMonth${rowx}`).text();
  var mpesa = $(`#mpesaLastMonth${rowx}`).text();
  var cash = $(`#cashLastMonth${rowx}`).text();
  var date = $(`#dateLastMonth${rowx}`).text();
  var banked = $(`#bankedLastMonth${rowx}`).text();
  var slip = $(`#slipLastMonth${rowx}`).text();
  var banker = $(`#bankerLastMonth${rowx}`).text();
  var where = 'orders';
  $.post("save.php",{id:id,qty:qty,mpesa:mpesa,cash:cash,date:date,banked:banked,slip:slip,banker:banker,where:where},
  function(result){
    location.reload(true);
  });
});

  $('#salesEditableNextMonth').editableTableWidget();
  $('#salesEditableNextMonth td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#salesEditableNextMonth td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#idNextMonth${rowx}`).text();
  var qty = $(`#qtyNextMonth${rowx}`).text();
  var mpesa = $(`#mpesaNextMonth${rowx}`).text();
  var cash = $(`#cashNextMonth${rowx}`).text();
  var date = $(`#dateNextMonth${rowx}`).text();
  var banked = $(`#bankedNextMonth${rowx}`).text();
  var slip = $(`#slipNextMonth${rowx}`).text();
  var banker = $(`#bankerNextMonth${rowx}`).text();
  var where = 'orders';
  $.post("save.php",{id:id,qty:qty,mpesa:mpesa,cash:cash,date:date,banked:banked,slip:slip,banker:banker,where:where},
  function(result){
    location.reload(true);
  });
});

  $('#salesEditableYesterday').editableTableWidget();
  $('#salesEditableYesterday td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#salesEditableYesterday td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#idYesterday${rowx}`).text();
  var qty = $(`#qtyYesterday${rowx}`).text();
  var mpesa = $(`#mpesaYesterday${rowx}`).text();
  var cash = $(`#cashYesterday${rowx}`).text();
  var date = $(`#dateYesterday${rowx}`).text();
  var banked = $(`#bankedYesterday${rowx}`).text();
  var slip = $(`#slipYesterday${rowx}`).text();
  var banker = $(`#bankerYesterday${rowx}`).text();
  var where = 'orders';
  $.post("save.php",{id:id,qty:qty,mpesa:mpesa,cash:cash,date:date,banked:banked,slip:slip,banker:banker,where:where},
  function(result){
    location.reload(true);
  });
});

  $('#salesEditableToday').editableTableWidget();
  $('#salesEditableToday td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#salesEditableToday td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#idToday${rowx}`).text();
  var qty = $(`#qtyToday${rowx}`).text();
  var mpesa = $(`#mpesaToday${rowx}`).text();
  var cash = $(`#cashToday${rowx}`).text();
  var date = $(`#dateToday${rowx}`).text();
  var banked = $(`#bankedToday${rowx}`).text();
  var slip = $(`#slipToday${rowx}`).text();
  var banker = $(`#bankerToday${rowx}`).text();
  var where = 'orders';
  $.post("save.php",{id:id,qty:qty,mpesa:mpesa,cash:cash,date:date,banked:banked,slip:slip,banker:banker,where:where},
  function(result){
    location.reload(true);
  });
});

  $('#salesEditableTomorrow').editableTableWidget();
  $('#salesEditableTomorrow td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#salesEditableTomorrow td').on('change', function(evt, newValue) {
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;
  var id = $(`#idTomorrow${rowx}`).text();
  var qty = $(`#qtyTomorrow${rowx}`).text();
  var mpesa = $(`#mpesaTomorrow${rowx}`).text();
  var cash = $(`#cashTomorrow${rowx}`).text();
  var date = $(`#dateTomorrow${rowx}`).text();
  var banked = $(`#bankedTomorrow${rowx}`).text();
  var slip = $(`#slipTomorrow${rowx}`).text();
  var banker = $(`#bankerTomorrow${rowx}`).text();
  var where = 'orders';
  $.post("save.php",{id:id,qty:qty,mpesa:mpesa,cash:cash,date:date,banked:banked,slip:slip,banker:banker,where:where},
  function(result){
    location.reload(true);
  });
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
  function(result){
  });
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
  function(result){
  });
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
          location.reload(true);
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
        var restock = $('#restock').val();
        var where = 'stock';
        $.post("add.php",{name:name,category:category,supplier:supplier,restock:restock,received:received,expiry:expiry,bp:bp,sp:sp,qty:qty,where:where},
        function(result){
         if (result == 'success') {
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
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
          location.reload(true);
         });
       });

  $(document).on('click','.addPurchase',function(){
        var where = 'purchase';
        var el = $(this);
        var id = el.attr("id");
        var received = $(`#received${id}`).val();
        var qty = $(`#qty${id}`).val();
         var bp = $(`#bp${id}`).val();
        var sp = $(`#sp${id}`).val();
        var expiry = $(`#expiry${id}`).val();
        $.post("add.php",{id:id,received:received,qty:qty,bp:bp,sp:sp,expiry:expiry,where:where},
        function(result){
          location.reload(true);
         });
       });

  $(document).on('click','.addService',function(){
        var where = 'service';
        var el = $(this);
        var id = el.attr("id");
        var now = $(`#now${id}`).val();
        var note = $(`#note${id}`).val();
         var next = $(`#next${id}`).val();
        $.post("save.php",{id:id,now:now,note:note,next:next,where:where},
        function(result){
          location.reload(true);
         });
       });

  $(document).on('click','.addInspection',function(){
        var where = 'inspection';
        var el = $(this);
        var id = el.attr("id");
        var now = $(`#Now${id}`).val();
        var note = $(`#Note${id}`).val();
         var next = $(`#Next${id}`).val();
        $.post("save.php",{id:id,now:now,note:note,next:next,where:where},
        function(result){
           location.reload(true);
         });
       });

   $(document).on('click','.saveDriver',function(){
        var where = 'driver';
        var el = $(this);
        var id = el.attr("id");
        var driver = $(`#driver${id}`).val();
        $.post("save.php",{id:id,driver:driver,where:where},
        function(result){
           alert("Vehicle driver Successfully changed");
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
