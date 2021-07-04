

<?php include 'connection.php';?>

<?php include 'header.php';?>
<!-- Sidebar/menu -->
<?php include 'sidebar.php';?>

<!-- Top menu on small screens -->
<?php include 'users_sub_header.php';?>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
               <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
               <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
               <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <!-- Product grid -->
      <h2>My Orders</h2>
      <div class="w3-container"  style="overflow: scroll;">
       <p><a href="order_history.php?sales_status=2"><button class="w3-button w3-black w3-round "title="Purchased">Purchased</button></a>&nbsp;
         <a href="order_history.php?sales_status=1"><button class="w3-button w3-black w3-round "title="Waiting">Waiting</button></a>&nbsp;
       <a href="order_history.php?sales_status=3"><button class="w3-button w3-black w3-round "title="Rejected">Rejected</button></a>&nbsp;
      <a href="order_history.php?sales_status=0"><button class="w3-button w3-black w3-round " title="All">All</button></a>
    </p><br><br>
    <script>
$(document).ready(function(){
setInterval(function(){
$("#order_page").load('order_refresh_page.php?sales_status=<?=$_GET["sales_status"]?>')
}, 2000);
});
</script>


<div id="order_page">

      
      </div>
    </div>
     <br>
     <div class="container">
    <p>You can make payment to these accounts below:<BR />
    1) OGITECH CONSULTANT, 123445565676, GT-BANK <BR />
  2) OGITECH CONSULTANT, 123445565676, ECO-BANK</p>
</div>
     <script>
     $(document).ready(function(){
          $('#employee_data').DataTable();
     });
     </script>

    </div>


  <!-- Footer -->
  <?php include 'footer.php';?>



  <!-- End page content -->
</div>
    </div>
  </div>
</div>
<!-- viewcart Modal -->

<!-- Login Modal -->
<?php include 'modal_login.php';?>

<!-- Register Modal -->
<?php include 'modal_register.php';?>

<!-- Search Modal -->
<?php include 'modal_search.php';?>
<?php include 'order_remove_modal.php';?>



<script src="js/js_script.js"></script>
</body>
</html>
