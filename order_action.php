<?php include 'connection.php'; ?>
<?php




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item_id = test_input($_POST["item_id"]);
  $qty = test_input($_POST["qty"]);
  $price = test_input($_POST["price"]);
  $total = test_input($_POST["total"]);
  $vendor_id = test_input($_POST["vendor_id"]);
  $user_id = test_input($_POST["user_id"]);
  $mat_no = $_COOKIE["matric_no"];

//  $date = date("Y-m-d");

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sql = "INSERT INTO `order_tb` (`order_id`, `order_no`, `product_id`, `vendor_id`, `user_id`, `mat_no`, `rate`, `qty`, `total_amount`, `date`, `dare_reg`, `order_status`, `sales_status`, `remark`) VALUES
   (NULL, '', '$item_id', '$vendor_id', '$user_id',  '$mat_no', '$price', '$qty', '$total', NOW(), CURRENT_TIMESTAMP, '1', '1', 'No comment');";

if (mysqli_query($conn, $sql)){
    $last_id = mysqli_insert_id($conn);


  echo  $sql2 = "UPDATE order_tb SET order_no=1000$last_id WHERE order_id=$last_id";

   mysqli_query($conn, $sql2);

   header('Location: order_history.php?msg=success_order&sales_status=1');



}

?>
