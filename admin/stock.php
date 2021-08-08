

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
      <h2>Stock</h2>
      <div class="w3-container " style="overflow: scroll;">
      <?php if($admin_type ==1){
?>
  <p>
    <button class="w3-button w3-black w3-round w3-right" onclick="document.getElementById('add_modal').style.display='block'" title="Login">Add Stock</button></p>
    <?php
}
?><br><br>

       <table id="employee_data" class="table  table-bordered w3-table w3-striped">
        <thead>
          <tr class="w3-light-grey">
          <th>SN</th>
          <th>Item</th>
            <th>Vendor</th>
            <th>Qty In</th>
            <th>Qty Out</th>
            <th>Qty Balance</th>
           
          </tr>
        </thead>
        <?php
        $firstname = @$_COOKIE[firstname];
        if($firstname == "") {
                echo "<script>
        window.location.replace('index.php');
                </script>";
                }
      $sql = "SELECT * FROM `products_tb`  
              ORDER BY `products_tb`.`product_name` ASC";
         
    $result = mysqli_query($conn, $sql);
    $sn= 1;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $tot =0;
      while($row = mysqli_fetch_assoc($result)) {
        ?>

    <tr class="w3-light">
    <td><?=$sn?></td>

  <td><a href="item_stock.php?item_id=<?=$row['product_id'];?>"><?=$row['product_name'];?></a></td>
  <td><?php  $pd_id = $row['vendor_id'];
   $sql_v = "SELECT `vendor_id`, `title`, `name` FROM `vendors_tb` WHERE `vendor_id` = $pd_id ";
  $result_v = mysqli_query($conn, $sql_v);
 $row_v = mysqli_fetch_assoc($result_v);
  echo $row_v['name'];
 
  ?></td>
  <td><?php $pd_id =  $row['product_id'];
  $sql_qin = "SELECT sum(`item_in`) as sum_in FROM `stock_tb` WHERE `item_id` = $pd_id";
  $result_qin = mysqli_query($conn, $sql_qin);
  $row_qin = mysqli_fetch_assoc($result_qin);
   echo $row_qin['sum_in'];

  ?></td>
  
  <td><?php $pd_id =  $row['product_id'];
  $sql_qout = "SELECT sum(`item_out`) as sum_out FROM `stock_tb` WHERE `item_id` = $pd_id";
  $result_qout = mysqli_query($conn, $sql_qout);
  $row_qout = mysqli_fetch_assoc($result_qout);
   echo $row_qout['sum_out'];

$qty_balance = $row_qin['sum_in'] - $row_qout['sum_out'];

  ?></td>


  <td><?=number_format($qty_balance,2);?></td>

          </tr>

        <?php
        $sn++;
        //$tot =$tot+$row['total_amount'];
      }
    } else {
      echo "No Record";
    }

        ?>

        <tfooter>
          <tr class="w3-light-grey">
          <th>SN</th>
          <th>Item</th>
            <th>Vendor</th>
            <th>Qty In</th>
            <th>Qty Out</th>
            <th>Qty Balance</th>
          </tr>

        </tfooter>


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


<!-- viewcart Modal -->
<?php include '../modal_view_cart.php';?>

<?php include 'stock_add_modal.php';?>
<?php include 'stock_edit_modal.php';?>
<?php include 'stock_delete_modal.php';?>


<!-- Search Modal -->
<?php include '../modal_search.php';?>
<!-- Search Modal -->


<?php
if(isset($_GET['msg'])){

    echo "<script> alert('Successful');
    window.history.replaceState(null, null, window.location.pathname);
    </script>";

}

?>
<script src="../js/js_script.js"></script>

</body>

</html>
