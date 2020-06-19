<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
          <hr/>
        <p class="text-center">&copy; 2020 - Kwanza Tukule Foods Ltd. All Rights Reserved.</p>   
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <link type="text/css" rel="stylesheet" href="js/effects.css"/>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
        <script type="jquery.js"></script>
              <!--incase you want to add javascript-->
              <!-- MDBootstrap Datatables  -->
    <script src="assets/js/main.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>  
      <script src="https://raw.githubusercontent.com/TriadSyndicate/FKF-Editable-Table-Premier-League/master/mindmup-editabletable.js"></script>
        <script src="assets/js/mindmup-editabletable.js"></script>
     <script type="text/javascript">
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
       $(document).ready(function(){
         $(".paginate").DataTable({
          "ordering": false
         });

       });
       $(document).ready(function(){
            $('#customerSearch').keyup(function(){
            var txt = $('#customerSearch').val();
            if(txt != '')
            {
              $.ajax({
                url: 'customerSearch.php',
                type:"post",
                data:{search:txt},
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
                url: 'customerSearch.php',
                type:"post",
                data:{search:txt},
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
       });
        });
       $(document).ready(function(){
            $('#productSearch').keyup(function(){
            var txt = $('#productSearch').val();
            if(txt != '')
            {
              $.ajax({
                url: 'stockSeach.php',
                type:"post",
                data:{search2:txt},
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
                url: 'stockSearch.php',
                type:"post",
                data:{search2:txt},
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
       });
        });
  $('#editable').editableTableWidget();
  $('#editable td.uneditable').on('change', function(evt, newValue) {
  return false;
});
  $('#editable td').on('change', function(evt, newValue) {
  alert(JSON.stringify(evt.target._DT_CellIndex.row));
   alert(newValue);
   var rowx = parseInt(evt.target._DT_CellIndex.row)+1;

});
     </script>             
      </body>
</html>