

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
  <h2>Products</h2>
  <div class="w3-container">
   <p><button class="w3-button w3-black w3-round w3-right" onclick="document.getElementById('add_modal').style.display='block'" title="Login">Add New</button></p><br><br>

   <table id="employee_data" class="table table-striped table-bordered">
    <thead>
      <tr class="w3-light-grey">
      <th>SN</th>
        <th>Name</th>
        <th>Unit</th>
        <th>Selling Rate</th>
        <th>Purchase Rate</th>
        <th>Vendor</th>
        <th>Department</th>
        <th>Level</th>
        <th>No. Sold</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php
$sql = "SELECT * FROM `products_tb` ";
$result = mysqli_query($conn, $sql);
$sn= 1;
if (mysqli_num_rows($result) > 0) {
  // output data of each row

  while($row = mysqli_fetch_assoc($result)) {
    ?>
<tr class="w3-light">
<td><?=$sn?></td>
        <td><?=$row['product_name'];?></td>
        <td><?=$row['unit'];?></td>
        <td>₦<?=$row['sell_rate'];?></td>
        <td>₦<?=$row['purchase_rate'];?></td>
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
       <td>no sold</td>
        <td><?php $status = $row['status'];
        if($status == 1){ echo "Active" ; }else{ echo "Deactive";}  ?></td>
        <td><a href="#"  class="product_edit" description="<?=$row['description'];?>"  vendor_name="<?=$vendor_name;?>"  department_name="<?=$department_name;?>" vendor_id="<?=$row['vendor_id'];?>"  department_id="<?=$row['department_id'];?>" name="<?=$row['product_name'];?>" sell_rate="<?=$row['sell_rate'];?>" purchase_rate="<?=$row['purchase_rate'];?>" edit_id="<?=$row['product_id'];?>"> <i class="material-icons">edit</i></a> |
        <a href="#" class="product_delete" department="<?=$row['department'];?>" name="<?=$row['name'];?>"  delete_id="<?=$row['product_id'];?>" ><i class="material-icons">delete_forever</i></a></td>
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
<?php include 'product_add_modal.php';?>
<?php include 'product_edit_modal.php';?>
<?php include 'product_delete_modal.php';?>

<!-- Search Modal -->
<?php include '../modal_search.php';?>

<!-- Search Modal -->
<?php include 'modal_add_product.php';?>


<script src="../js/js_script.js"></script>

</body>

</html>
