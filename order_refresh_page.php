<?php include 'connection.php';?>

<table id="employee_data" class="table  table-bordered w3-table w3-striped">
        <thead>
          <tr class="w3-light-grey">
          <th>SN</th>
            <th>Order No.</th>
            <th>Barcode</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Rate ₦</th>
            <th>Total Amount ₦</th>
            <th>payment Option</th>
            <th>Date</th>
            <th>Order Status</th>
            <th>Slaes Status</th>

            <th>Action</th>
          </tr>
        </thead>
        <?php

        $user_id = @$_COOKIE[user_id];

        if($user_id == "") {
        echo "<script>
window.location.replace('index.php');
        </script>";
        }

        if(isset($_GET['sales_status'])){

          if($_GET['sales_status'] ==1 ){
               $sql = "SELECT * FROM `order_tb` where order_tb.user_id = $user_id and `sales_status` = 1 and `order_status` != '2' ORDER BY `order_tb`.`order_id` DESC ";
          }elseif($_GET['sales_status'] ==2 ){
              $sql = "SELECT * FROM `order_tb` where order_tb.user_id = $user_id and `sales_status` = 2  and `order_status` != '2' ORDER BY `order_tb`.`order_id` DESC ";

        }elseif($_GET['sales_status'] ==3 ){
             $sql = "SELECT * FROM `order_tb` where order_tb.user_id = $user_id and `sales_status` = 3  and `order_status` != '2'  ORDER BY `order_tb`.`order_id` DESC ";
        }elseif( $_GET['sales_status'] ==0 ){
             $sql = "SELECT * FROM `order_tb` where order_tb.user_id = $user_id  ORDER BY `order_tb`.`order_id` DESC ";
        }
      }elseif(!isset($_GET['sales_status'])){
          $sql = "SELECT * FROM `order_tb` where order_tb.user_id = $user_id  and `order_status` = 1 and  `sales_status` = 1    ORDER BY `order_tb`.`order_id` DESC ";
        }

    $result = mysqli_query($conn, $sql);
    $sn= 1;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $tot =0;
      while($row = mysqli_fetch_assoc($result)) {
        ?>
<tbody>
    <tr class="w3-light">
    <td><?=$sn?></td>
            <td><?=$row['order_no'];?></td>
            <td><img alt="testing" src="barcode.php?text=><?=$row['order_no'];?>" /></td>
            <td><?php $product_id= $row['product_id'];
            $sql2 = "SELECT * FROM `products_tb` WHERE `product_id` =  $product_id  ";
            $result2 = mysqli_query($conn, $sql2);
            mysqli_num_rows($result2);
            $row2 = mysqli_fetch_assoc($result2);
            echo $row2['product_name'];


            ?></td>
            <td><?=$row['qty'];?></td>
            <td><?=$row['rate'];?></td>
            <td><?=$row['total_amount'];?></td>
            <td>
<select name="payment_optn" class="payment_optn2" id="payment_optn" order_no="<?=$row['order_no'];?>" >
<option value="<?=$row['payment_optn'];?>"><?=$row['payment_optn'];?></option>
  <option value="Cash">Cash</option>
    <option value="Bank">Bank</option>
</select>
            </td>
            <td><?=$row['date'];?></td>
            <td><?php $order_status = $row['order_status'];
            if($order_status == 1){ echo "New Order" ; }else{ echo "Old Order";}  ?></td>
            <td><?php $sales_status = $row['sales_status'];
            if($sales_status == 1){ echo "Waiting" ; }elseif($sales_status == 2){ echo "Purchased";} elseif($sales_status == 3){ echo "Rejected";}  ?></td>

             <td>
          <?php    if(isset($_GET['sales_status']) and $_GET['sales_status'] == 2){ echo "" ;}else{  ?>
  <a href="#" class="order_remove" title="Remove"  order_id="<?=$row['order_id'];?>" order_no="<?=$row['order_no'];?>" ><i class="material-icons">delete_forever</i></a>
<?php } ?>
          </td>
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
            <th>Barcode</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Rate ₦</th>
            <th>₦ <?=@number_format($tot,2)?></th>
            <th>payment Option</th>
            <th>Date</th>
            <th>Order Status</th>
            <th>Slaes Status</th>

            <th>Action</th>
          </tr>
        </tfooter>
</tbody>

      </table>