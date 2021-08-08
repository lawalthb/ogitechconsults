

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
  <h2>Sub Admins</h2>
  <div class="w3-container">
   <p><button class="w3-button w3-black w3-round w3-right" onclick="document.getElementById('add_user_modal').style.display='block'" title="Login">Add New</button></p><br><br>

   <table id="employee_data" class="table table-striped table-bordered">
    <thead>
      <tr class="w3-light-grey">
      <th>SN</th>
        <th>Name</th>
       
        <th>Email</th>
        <th>Username</th>
        
        
        <th>Total Sales</th>
        <th>Account Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php
$sql = "SELECT * FROM `admins_tb` where deleted=0 and admin_id !=1";
$result = mysqli_query($conn, $sql);
$sn= 1;
if (mysqli_num_rows($result) > 0) {
  // output data of each row

  while($row = mysqli_fetch_assoc($result)) {
    ?>
<tr class="w3-light">
<td><?=$sn?></td>
        <td><?=$row['firstname']." ".$row['lastname'];?></td>
      
        <td><?=$row['email'];?></td>
        <td><?=$row['username'];?></td>
        
        
        
        <td><?php $u_id =  $row['admin_id'];
        
        $sql7 = "SELECT sum(total_amount) as user_sum FROM `sales_tb` WHERE `user_id` =  $u_id ";
        $result7 = mysqli_query($conn, $sql7);
       $num =  mysqli_num_rows($result7);
        if($num > 0){
          $row7 = mysqli_fetch_assoc($result7);
          echo  "N".number_format($row7['user_sum']);
        }else{
          echo  "...";
        }
       
        
        ?></td>
        <td><?php $status = $row['status'];
        if($status == 1){ echo "Active" ; }else{ echo "Deactive";}  ?></td>
        <td><a href="#"  class="edit_subadmin"  firstname="<?=$row['firstname'];?>" lastname="<?=$row['lastname'];?>" email="<?=$row['email'];?>"  username="<?=$row['username'];?>" edit_id="<?=$row['admin_id'];?>"> <i class="material-icons">edit</i></a> |
        <a href="sub_admins.php?delete=<?=$row['admin_id'];?>" class="vendor_delete" onClick="return confirm('Are you sure \n you want to delete this Sales Rep.? ');"   delete="<?=$row['admin_id'];?>" ><i class="material-icons">delete_forever</i></a></td>
      </tr>

    <?php
    $sn++;
  }
} else {
  echo "No Record";
}

    ?>

<th>SN</th>
        <th>Name</th>
      
        <th>Email</th>
      
        <th>Username</th>
        <th>Total Sales</th>
        <th>Account Status</th>
        <th>Action</th>
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



<!-- vendors Modal -->
<!-- <?php include 'user_add_modal.php';?> -->
<?php include 'subadmin_edit_modal.php';?>


<!-- Search Modal -->
<?php include '../modal_search.php';?>
<!-- Search Modal -->
<?php include 'modal_add_subadmin.php';?>


<script src="../js/js_script.js"></script>

</body>

</html>
<?php
if (isset($_GET["delete"])) {
  
  
  $admin_id = trim($_GET["delete"]);
  
  
     $sql = "UPDATE `admins_tb` SET `deleted` = '1' WHERE `admins_tb`.`admin_id` = $admin_id ";
    //die();
if (mysqli_query($conn, $sql)){ 
   
  ?>
  <script>
  window.location.href = "sub_admins.php?msg=suc";

  </script>
    <?php
  
}
}


?>