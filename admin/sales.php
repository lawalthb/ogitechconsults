

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
      <h2>Sales</h2>
      <div class="w3-container " style="overflow: scroll;">

    Date Range:
                               <form action="" name="form" method="post" >
                               <div class="row">

   								<div class="offset-md-1 col-md-8">
                                   <div class="input-daterange input-group" id="date-range">
                                       <input type="date" class="form-control" name="start" value="<?php if((isset($_POST['start']))) { echo $_POST['start']; }?>" >
                                       <span class="input-group-addon bg-primary b-0 text-white">to</span>
                                       <input type="date" class="form-control" name="end" value="<?php if((isset($_POST['end']))) { echo $_POST['end']; }?>" >
                                    <button type="submit" class="btn btn-primary">GET</button>
                                    </div>

                                  </div>

                               </div>
                             </form><br  />
By defualt is listing today records

       <table id="employee_data" class="table  table-bordered w3-table w3-striped">
        <thead>
          <tr class="w3-light-grey">
          <th>SN</th>

            <th>Order No.</th>
            <th>Email</th>
            <th>Name</th>
            <th>Matric No</th>
            <th>Product Name</th>
            <th>Level</th>
            <th>Quantity</th>
            <th>Rate ₦</th>
            <th>Total Amount ₦</th>
            <th>Date</th>

            <th>Slaes Status</th>
  <th>Refund</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
        $firstname = @$_COOKIE[firstname];
        if($firstname == "") {
                echo "<script>
        window.location.replace('index.php');
                </script>";
                }
if(isset($_POST['start']) and isset($_POST['end'])){
$start = $_POST['start'];
$end =  $_POST['end'];
}
else{
  $start = date("Y-m-d");
  $end =  date("Y-m-d");


}

        if(isset($_GET['sales_status'])){

          if($_GET['sales_status'] ==1 ){
               $sql = "SELECT * FROM `sales_tb` where `sales_status` = 1  and `date` BETWEEN '$start' AND '$end' ORDER BY `sales_tb`.`sales_id` DESC ";
          }elseif($_GET['sales_status'] ==2 ){
              $sql = "SELECT * FROM `sales_tb` where `sales_status` = 2  and `date` BETWEEN '$start' AND '$end' ORDER BY `sales_tb`.`sales_id` DESC ";

        }elseif($_GET['sales_status'] ==3 ){
            $sql = "SELECT * FROM `sales_tb` where `sales_status` = 3   and `date` BETWEEN '$start' AND '$end' ORDER BY `sales_tb`.`sales_id` DESC ";
        }
      }elseif(!isset($_GET['sales_status'])){
           $sql = "SELECT * FROM `sales_tb` where   `sales_status` = 2 and `date` BETWEEN '$start' AND '$end'  ORDER BY `sales_tb`.`sales_id` DESC ";
        }

    $result = mysqli_query($conn, $sql);
    $sn= 1;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $tot =0;
      while($row = mysqli_fetch_assoc($result)) {
        ?>

    <tr class="w3-light">
    <td><?=$sn?></td>

  <td><?=$row['order_no'];?></td>

            <td><?php  $user = $row['user_id'];
            $sql3 = "SELECT * FROM `users_tb` WHERE `user_id` =  $user  ";
            $result3 = mysqli_query($conn, $sql3);
            mysqli_num_rows($result3);
            $row3 = mysqli_fetch_assoc($result3);
            echo $row3['email'];


            ?></td>
            <td><?=$row3['firstname']." ". $row3['lastname'];?></td>
              <td><?=$row3['matric_no'];?></td>
            <td><?php $product_id= $row['product_id'];
            $sql2 = "SELECT * FROM `products_tb` WHERE `product_id` =  $product_id  ";
            $result2 = mysqli_query($conn, $sql2);
            mysqli_num_rows($result2);
            $row2 = mysqli_fetch_assoc($result2);
            echo $row2['product_name'];


            ?></td>
            <td><?=$row2['level'];?></td>
            <td><?=$row['qty'];?></td>
            <td><?=$row['rate'];?></td>
            <td><?=$row['total_amount'];?></td>
            <td><?=$row['date'];?></td>

            <td><?php $sales_status = $row['sales_status'];
            if($sales_status == 1){ echo "Waiting" ; }elseif($sales_status == 2){ echo "Purchased";} elseif($sales_status == 3){ echo "Rejected";}  ?></td>
            <td><button class="w3-button w3-black w3-round refund" order_no="<?=$row['order_no'];?>" title="Refund <?=$row['order_no'];?>">Refund</button>
               </td>

             <td>

            <a href="#" class="order_remove" title="Remove"  order_id="<?=$row['order_id'];?>" order_no="<?=$row['order_no'];?>" ><i class="material-icons">delete_forever</i></a></td>
          </tr>

        <?php
        $sn++;
        $tot =$tot+$row['total_amount'];
      }
    } else {
      echo "No Record";
    }

        ?>

        <tfooter>
          <tr class="w3-light-grey">
          <th>SN</th>

            <th>Order No.</th>
            <th>Email</th>
                <th>Name</th>
                <th>Matric No</th>
            <th>Product Name</th>
            <th>Level</th>
            <th>Quantity</th>
            <th>Rate ₦</th>
            <th>₦ <?=@number_format($tot,2)?></th>
            <th>Date</th>

            <th>Slaes Status</th>
<th>Refund</th>
            <th>Action</th>
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



<!-- Search Modal -->
<?php include '../modal_search.php';?>
<!-- Search Modal -->



<script src="../js/js_script.js"></script>

</body>

</html>
