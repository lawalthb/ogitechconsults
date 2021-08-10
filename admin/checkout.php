

<?php include '../connection.php';?>
<?php

if (isset($_GET["order_id"])) {

      $order_id = trim($_GET["order_id"]);
      $product_id = trim($_GET["product_id"]);
      $user_id = trim($_GET["user_id"]);
      //get item name
      $sql5 = "SELECT *  FROM `products_tb` WHERE product_id = $product_id";
      $result5 = mysqli_query($conn, $sql5); @$row5 = mysqli_fetch_assoc($result5); $product_name =  $row5['product_name'];

       //get user details
       $sql7 = "SELECT *  FROM `users_tb` WHERE `user_id` = $user_id";
       $result7 = mysqli_query($conn, $sql7); @$row7 = mysqli_fetch_assoc($result7); $firstname =  $row7['firstname']; $lastname =  $row7['lastname']; $email =  $row7['email'];
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
            $mat_no = $row2['mat_no'];
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
                $sql4 ="INSERT INTO `stock_tb` (`stock_id`, `date`, `user_id`, `mat_no`, `item_id`, `vendor_id`, `user_type`, `item_in`, 
               `item_out`, `item_balance`, `payment_id`, `reg_date`, `status`)
               VALUES (NULL, NOW(), '$user_id', '$mat_no', '$product_id', '$vendor_id', '2', '0', '$qty', '4', '0', CURRENT_TIMESTAMP, '1')";
               

               if(mysqli_query($conn, $sql4)){
                 $sqll = "UPDATE `products_tb` SET `qty` = `qty`-($qty) WHERE `products_tb`.`product_id` = $product_id";
                  mysqli_query($conn, $sqll);
                  $headers = "From: consults@ogitechconsults.com\r\n";
                  $headers .= "Reply-To: consults@ogitechconsults.com\r\n";
                  
                  $headers .= "MIME-Version: 1.0\r\n";
                  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
              
                 // email  message
                  $msg = "Dear ".ucwords($firstname)." ".ucwords($lastname)."<br> Thank you for your patronage<br> Your Order No is: ".$order_no."<br> Item contain is: ".$product_name." <br> Item Quantity: ".$qty."<br> Item Rate:  ".$rate."<br> Item Amount:  ".$total_amount."<br> Date: ".date("F j, Y, g:i a")."  <br><br> Thanks ";
              
                 // use wordwrap() if lines are longer than 70 characters
                 $msg = wordwrap($msg,70);
              
                 // send email
                mail($email,"SALES RECEIPT - OGITECH CONSULTS",$msg,$headers);
                
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
