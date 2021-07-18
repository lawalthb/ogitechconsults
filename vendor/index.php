

<?php include '../connection.php';?>
<?php
if(isset($_GET['vendor_mail'])){
$vendor_mail = $_GET['vendor_mail'];
setcookie('vendor_mail', $vendor_mail, time()+((86400*30)*12));
}elseif(isset($_COOKIE['vendor_mail'])){

  $vendor_mail = $_COOKIE['vendor_mail'];
}

?>

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
              <?php
                $sql2 = "SELECT * FROM `products_tb` 
               WHERE `product_id` =$_GET[item_id];";
              //  $_GET[item_id] ";
                 
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
              ?>
      <h2>Payment for : <?=$row2['product_name'];?></h2>
      <div class="w3-container " style="overflow: scroll;">

  
       <table id="employee_data" class="table  table-bordered w3-table w3-striped">
        <thead>
          <tr class="w3-light-grey">
          <th>SN</th>
          
            <th>Date</th>
            <th>Matric No.</th>
            <th>Qty In</th>
            <th>Qty Out</th>
            <th>Qty Balance</th>
           
          </tr>
        </thead>
     
        <?php
        
       if(!$vendor_mail){
        echo "<script>
       // window.history.replaceState(null, null, window.location.pathname);
       window.location.replace('index.php');

       </script>";
       }

$item_id = $_GET['item_id'];

$csql ="SELECT * FROM `products_tb` WHERE `vendor_email` LIKE '$vendor_mail' and `product_id` = $item_id";
$cresult = mysqli_query($conn, $csql);
if (mysqli_num_rows($cresult) > 0) {
      $sql = "SELECT * FROM `stock_tb` 
       WHERE `item_id` = $item_id 
              ORDER BY `stock_id` ASC";
         
    $result = mysqli_query($conn, $sql);
    $sn= 1;
    $qty_balance= 0;
    $runing_balance =0;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $tot =0;
      while($row = mysqli_fetch_assoc($result)) {
        ?>

    <tr class="w3-light">
    <td><?=$sn?></td>

 
  <td><?php  echo $row['date'];?></td>
  <td><?php  echo $row['mat_no'];?></td>
  <td><?php  echo $row['item_in'];?></td>
  
  <td><?php  echo $row['item_out'];

$qty_balance = $row['item_in'] - $row['item_out'];
$runing_balance =$runing_balance- $qty_balance 
  ?></td>


  <td><?=number_format($runing_balance,2);?></td>

          </tr>

        <?php
        $sn++;
        //$tot =$tot+$row['total_amount'];
      }
    } else {
      echo "No Record";
    }
  }else{
    echo  "Item not for you";
  }
        ?>

        <tfooter>
          <tr class="w3-light-grey">
          <th>SN</th>
         
            <th>Date</th>  
            <th>Matric No.</th>
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
