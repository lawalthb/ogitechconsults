

<?php include '../connection.php';?>

<?php include 'header.php';?>
<!-- Sidebar/menu -->
<?php include 'sidebar.php';?>
<?php include 'admin_sub_header.php';?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <!-- Product grid -->
  <h2>Vendors</h2>
  <div class="w3-container">
   <p><button class="w3-button w3-black w3-round w3-right" onclick="document.getElementById('add_vendors_modal').style.display='block'" title="Login">Add New</button></p><br><br>

   <table id="employee_data" class="table table-striped table-bordered">
    <thead>
      <tr class="w3-light-grey">
      <th>SN</th>
        <th>Title</th>
        <th>Full Name</th>
        <th>Department</th>
        <th>Email</th>
        <th>Status</th>
        <th>Balance</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php
$sql = "SELECT * FROM `vendors_tb` ";
$result = mysqli_query($conn, $sql);
$sn= 1;
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    ?>

<tr class="w3-light">
<td><?=$sn?></td>
        <td><?=$row['title'];?></td>
        <td><a href="vendor_payment.php?vendor_id=<?=$row['vendor_id'];?>" ><?=$row['name'];?></a></td>
        <td><?php $department= $row['department_id'];
        $sql2 = "SELECT * FROM `departments_tb` WHERE `department_id` =  $department ";
        $result2 = mysqli_query($conn, $sql2);
        mysqli_num_rows($result2);
        $row2 = mysqli_fetch_assoc($result2);
        echo $row2['name'];

        ?></td>
        <td><?=$row['email'];?></td>
        <td><?php $status = $row['status'];
        if($status == 1){ echo "Active" ; }else{ echo "Deactive";}  ?></td>

        <td>N 
        <?php $pd_id =  $row['vendor_id'];
  $sql_qin = "SELECT sum(`amount_in`) as sum_in FROM `payment_tb` WHERE `vendor_id` = $pd_id";
  $result_qin = mysqli_query($conn, $sql_qin);
  $row_qin = mysqli_fetch_assoc($result_qin);
    $row_qin['sum_in'];

   $pd_id =  $row['vendor_id'];
  $sql_qout = "SELECT sum(`amount_out`) as sum_out FROM `payment_tb` WHERE `vendor_id` = $pd_id";
  $result_qout = mysqli_query($conn, $sql_qout);
  $row_qout = mysqli_fetch_assoc($result_qout);
    $row_qout['sum_out'];

$qty_balance = $row_qin['sum_in'] - $row_qout['sum_out'];

 


  echo number_format($qty_balance,2);
  ?></td>
        
       
  
        <td><a href="#"  class="vendor_edit" department="<?=$row['department'];?>" name="<?=$row['name'];?>" email="<?=$row['email'];?>" title="<?=$row['title'];?>" edit_id="<?=$row['vendor_id'];?>" ><i class="material-icons">edit</i></a> |
        <a href="#" class="vendor_delete" department="<?=$row['department'];?>" name="<?=$row['name'];?>"  delete_id="<?=$row['vendor_id'];?>" ><i class="material-icons">delete_forever</i></a> |
        <a href="#" class="add_pay_modal" department="<?=$row['department'];?>" name="<?=$row['name'];?>"  vendor_id="<?=$row['vendor_id'];?>" ><i class="material-icons">price_change</i></a>
        </td>

        
      </tr>

    <?php
    $sn++;
  }
} else {
  echo "No Record";
}

    ?>


  </table>
</div>
 <br> <br>
 <script>
 $(document).ready(function(){
      $('#employee_data').DataTable();
 });
 </script>
  <!-- Footer -->
  <?php include '../footer.php';?>



  <!-- End page content -->
</div>

<!-- viewcart Modal -->
<?php include '../modal_view_cart.php';?>
<!-- Login Modal -->
<?php include 'modal_admin_login.php';?>

<!-- vendors Modal -->
<?php include 'vendor_add_modal.php';?>
<?php include 'vendor_edit_modal.php';?>
<?php include 'vendor_delete_modal.php';?>
<?php include 'stock_add_payment_modal.php';?>

<!-- Search Modal -->
<?php include '../modal_search.php';?>
<!-- Search Modal -->
<?php include 'modal_add_product.php';?>


<script src="../js/js_script.js"></script>

</body>

</html>
