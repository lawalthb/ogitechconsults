

<?php include '../connection.php';?>

<?php include 'header.php';?>
<!-- Sidebar/menu -->
<?php include 'sidebar.php';?>
<?php include 'admin_sub_header.php';?>

  <div class="w3-row w3-grayscale">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">


             <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
             <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
             <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
             <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
            <script src=" https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
      <!-- Product grid -->
      <div class="w3-container">
        
<h2>Dashboard</h2>
<p class="w3-large"><a href="customer_orders.php">Click to view order</a></p>
</div>

<div class="w3-row " >
<div class="w3-quarter w3-container w3-border w3-margin" >
  <h2>Total Sales</h2>  
  <p>N<?php 
            $sql3 = "SELECT sum(total_amount) as sum_sales FROM `sales_tb`";
            $result3 = mysqli_query($conn, $sql3);
            
            $row3 = mysqli_fetch_assoc($result3);
            echo number_format($row3['sum_sales'],2);
      ?></p>
  <p><a href="sales.php">View</a></p>
</div>
<div class="w3-quarter w3-container w3-border w3-margin">
  <h2>Today's Sales</h2>
  <p>N <?php 
    $todays_date = date('Y-m-d');
            $sql4 = "SELECT sum(total_amount) as sum_sales FROM `sales_tb` WHERE `date` BETWEEN '$todays_date' AND '$todays_date'";
            $result4 = mysqli_query($conn, $sql4);
            
            $row4 = mysqli_fetch_assoc($result4);
            echo number_format($row4['sum_sales'],2);
      ?></p>
  <p><a href="sales.php">View</a></p>
</div>
<div class="w3-quarter w3-container w3-border w3-margin">
  <h2>Total Purchase</h2>
  <p>N <?php 
            $sql3 = "SELECT sum(amount_in) as sum_payment FROM `payment_tb`";
            $result3 = mysqli_query($conn, $sql3);
            $row3 = mysqli_fetch_assoc($result3);
            echo number_format($row3['sum_payment'],2);
      ?></p>
  <p><a href="stock.php">View</a></p>
</div>
<div class="w3-quarter w3-container w3-border w3-margin">
  <h2>Today Purchase</h2>
  <p>N <?php 
    $todays_date = date('Y-m-d');
            $sql4 = "SELECT sum(amount_in) as sum_payment FROM `payment_tb` WHERE `date` BETWEEN '$todays_date' AND '$todays_date'";
            $result4 = mysqli_query($conn, $sql4);
            
            $row4 = mysqli_fetch_assoc($result4);
            echo number_format($row4['sum_payment'],2);
      ?></p>
  <p><a href="stock.php">View</a></p>
</div>

<div class="w3-quarter w3-container w3-border w3-margin">
  <h2>Total Users</h2>  
  <p><?php  $sql5 = "SELECT *   FROM `users_tb` ";
            $result5 = mysqli_query($conn, $sql5);
            $t_sum= mysqli_num_rows($result5);
            $row5 = mysqli_fetch_assoc($result5);
            echo $t_sum;
           
            ?></p>
  <p><a href="users.php">View</a></p>
</div>
<div class="w3-quarter w3-container w3-border w3-margin">
  <h2>Total Item</h2>
  <p><?php  $sql6 = "SELECT *   FROM `products_tb` ";
            $result6 = mysqli_query($conn, $sql6);
            $t_sum= mysqli_num_rows($result6);
            //$row6 = mysqli_fetch_assoc($result6);
            echo $t_sum;
           
            ?></p>
  <p><a href="products.php">View</a></p>
</div>
<div class="w3-quarter w3-container w3-border w3-margin">
  <h2>Total Vendors</h2>
  <p><?php  $sql7 = "SELECT *   FROM `vendors_tb` ";
            $result7 = mysqli_query($conn, $sql7);
            $t_sum= mysqli_num_rows($result7);
            //$row6 = mysqli_fetch_assoc($result6);
            echo $t_sum;
           
            ?></p>
  <p><a href="vendors.php">View</a></p>
</div>
<div class="w3-quarter w3-container w3-border w3-margin">
  <h2>Total Sales Rep.</h2>
  <p><?php  $sql8 = "SELECT *   FROM `admins_tb` where `admin_type` = 'sales_rep' ";
            $result8 = mysqli_query($conn, $sql8);
            $t_sum= mysqli_num_rows($result8);
            //$row6 = mysqli_fetch_assoc($result6);
            echo $t_sum;
           
            ?></p>
  <p><a href="sub_admins.php">View</a></p>
</div>

</div>
<div class="w3-container">
<h2>Low Items in stock</h2>
  <p>When item is zero, the item can not be sold</p>
  
  <table class="w3-table w3-striped">
    <tr>
      <th>Item Name</th>
      <th>Vendor Name</th>
      <th>Department</th>
      <th>Level</th>
      <th>Quantity</th>
    </tr>
    <?php
$sql = "SELECT * FROM `products_tb` where `qty` <=5 limit 10 ";
$result = mysqli_query($conn, $sql);
$sn= 1;
if (mysqli_num_rows($result) > 0) {
  // output data of each row

  while($row = mysqli_fetch_assoc($result)) {
    ?>
    
    <tr>
      <td><?=$row['product_name'];?></td>
      <td><?php $vendor= $row['vendor_id'];
        $sql2 = "SELECT * FROM `vendors_tb` WHERE `vendor_id` =  $vendor ";
        $result2 = mysqli_query($conn, $sql2);
        mysqli_num_rows($result2);
        $row2 = mysqli_fetch_assoc($result2);
        $vendor_name =  $row2['name']; 
        echo $row2['title']." ".$row2['name'];

        ?></td>
      <td><?php $department= $row['department_id'];
        $sql2 = "SELECT * FROM `departments_tb` WHERE `department_id` =  $department ";
        $result2 = mysqli_query($conn, $sql2);
        mysqli_num_rows($result2);
        $row2 = mysqli_fetch_assoc($result2);
        $department_name = $row2['name'];
        echo $row2['name'];

        ?></td>
      <td><?=$row['level'];?></td>
      <td><?=$row['qty'];?></td>
    </tr>
    <?php
   // $sn++;
  }
} else {
  echo "No Record";
}

    ?>
  </table>
</div>
     <br> <br>
     <script>



     $(document).ready(function() {
    $('#employee_data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
     </script>

    </div>

<!-- Edit user Modal -->
<?php include 'admin_edit_modal.php';?>
<!-- viewcart Modal -->
<?php include '../modal_view_cart.php';?>



<!-- Search Modal -->
<?php include '../modal_search.php';?>
<!-- Search Modal -->



<script src="../js/js_script.js"></script>

</body>

</html>
