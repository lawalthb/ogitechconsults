

<?php include 'connection.php';?>



<?php



$response = array();
if (isset($_GET["order_id"])) {

   $order_id = trim($_GET["order_id"]);
   $pay_mt = trim($_GET["pay_mt"]);


    $sql = "UPDATE `order_tb` SET `payment_optn` = '$pay_mt' WHERE `order_tb`.`order_no` = $order_id ; ";

mysqli_query($conn, $sql);

     $response['status'] = 'successfully';
}
else {
   $response['status']= 'error';
}


//echo "json_encode($response);"
//echo "lawal fixed";
?>
