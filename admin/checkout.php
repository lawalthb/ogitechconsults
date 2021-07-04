

<?php include '../connection.php';?>



<?php



$response = array();
if (isset($_GET["order_id"])) {

  $order_id = trim($_GET["order_id"]);


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
mysqli_query($conn, $sql3);

$sql4 ="INSERT INTO `stock_tb` (`stock_id`, `date`, `item_id`, `vendor_id`, `user_type`, `item_in`, 
`item_out`, `item_balance`, `payment_id`, `reg_date`, `status`)
 VALUES (NULL, NOW(), '$product_id', '$user_id', '2', '0', '$qty', '4', '0', CURRENT_TIMESTAMP, '1')";
 mysqli_query($conn, $sql4);
     $response['status'] = 'successfully';



}
else {
   $response['status']= 'error';
}
}

//echo "json_encode($response);"
//echo "lawal fixed";
?>
