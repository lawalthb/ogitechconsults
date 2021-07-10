

<?php include '../connection.php';?>
<?php

if (isset($_GET["order_id"])) {

      $order_id = trim($_GET["order_id"]);
      $product_id = trim($_GET["product_id"]);
         // get all stock in
       $sql3 = "SELECT sum(item_in) as itemIN  FROM `stock_tb` WHERE item_id = $product_id";
      $result3 = mysqli_query($conn, $sql3); @$row3 = mysqli_fetch_assoc($result3); $row3['itemIN'];
      // get all stock out
      $sql6 = "SELECT sum(item_out) as itemOUT  FROM `stock_tb` WHERE item_id = $product_id";
      $result6 = mysqli_query($conn, $sql6); @$row6 = mysqli_fetch_assoc($result6); $row6['itemOUT'];

       $stock_level = $row3['itemIN'] - $row6['itemOUT'];
      if($stock_level  > 0 ){

         $sql = "UPDATE `order_tb` SET `sales_status` = '2' WHERE `order_tb`.`order_no` = $order_id ; ";

         if (mysqli_query($conn, $sql)){
            $sql2 = "SELECT * FROM `order_tb` WHERE `order_no` =  $order_id  ";
            $result2 = mysqli_query($conn, $sql2);
            mysqli_num_rows($result2);
            $row2 = mysqli_fetch_assoc($result2);
            $order_no = $row2['order_no'];
            $product_id = $row2['product_id'];
            $vendor_id = $row2['vendor_id'];
            $user_id = $row2['user_id'];
            $rate = $row2['rate'];
            $qty = $row2['qty'];
            $total_amount = $row2['total_amount'];
            $payment_optn = $row2['payment_optn'];
            $checkout_by = $_COOKIE['admin_id'];

            $sql3 = "INSERT INTO `sales_tb` ( `order_no`, `product_id`, `vendor_id`, `user_id`, `rate`, `qty`, `total_amount`, `payment_optn`, `date`, `dare_reg`, `sales_status`, `remark`, `checkout_by`) VALUES
            ( '$order_no', '$product_id', '$vendor_id', '$user_id', '$rate', '$qty', '$total_amount', '$payment_optn', NOW(), CURRENT_TIMESTAMP, '2', 'Thanks fo your patronage', '$checkout_by')";
           
            if( mysqli_query($conn, $sql3)){
                $sql4 ="INSERT INTO `stock_tb` (`stock_id`, `date`, `item_id`, `vendor_id`, `user_type`, `item_in`, 
               `item_out`, `item_balance`, `payment_id`, `reg_date`, `status`)
               VALUES (NULL, NOW(), '$product_id', '$user_id', '2', '0', '$qty', '4', '0', CURRENT_TIMESTAMP, '1')";
               
               if(mysqli_query($conn, $sql4)){
                  echo  'successfully';
               }
            }

            
          

          }else{
           echo  "item is zero";
         }

      }
      else {
        echo  'No Item in stock';
      }
}

//echo "json_encode($response);"
//echo "lawal fixed";
?>
