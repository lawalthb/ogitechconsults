<?php
include_once '../connection.php';

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = MD5($password);


    $sql = "SELECT *  FROM `admins_tb` WHERE `username` LIKE '$username' AND `password` LIKE '$password' " ;
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    setcookie ("admin_username",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("firstname",$row["firstname"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("lastname",$row["lastname"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("admin_type",$row["admin_type"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("status",$row["status"],time()+ (10 * 365 * 24 * 60 * 60));
      setcookie ("admin_id",$row["admin_id"],time()+ (10 * 365 * 24 * 60 * 60));






    header('Location: index.php?login=success');
  }
} else {
    header('Location: index.php?login=failed');
}

}


?>
