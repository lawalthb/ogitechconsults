

<?php include 'connection.php';?>



<?php



$user_level = @$_COOKIE[level] ;
$user_department = @$_COOKIE[department] ;
if (isset($_GET["q"])){

   $item_name = trim($_GET["q"]);


    $sql = "SELECT prd.*, ved.*  FROM products_tb as prd, vendors_tb as ved where prd.vendor_id=ved.vendor_id and `product_name` LIKE '%$item_name%' ";
   if($user_level != ""){
    $sql = "SELECT prd.*, ved.*  FROM products_tb as prd, vendors_tb as ved where prd.vendor_id=ved.vendor_id and `product_name` LIKE '%$item_name%' and   `prd`.`level` like '$user_level' and `prd`.`department_id` like '$user_department'   ";
  }

$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   echo "<h4><a href='index.php?search=".$row["product_id"]."'>".$row["product_name"]. " </a></h4><br>";
  }
} else {
  echo "No Item";
}



}
//echo "json_encode($response);"
//echo "lawal fixed";
?>
