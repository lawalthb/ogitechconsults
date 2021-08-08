
<html>
<head>
<title>Loading...</title>
</head>

<body>
<center>
<img src="images/loading.gif" width="300" height="300" >
</center>
</body>

</html>
<?php
include_once 'connection.php';

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = MD5($password);


    $sql = "SELECT *  FROM `users_tb` WHERE `email` LIKE '$email' AND `password` LIKE '$password' and email_comfirm =1 and `status` =1  and deleted=0" ;
    $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("matric_no",$row["matric_no"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("user_id",$row["user_id"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("firstname",$row["firstname"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("lastname",$row["lastname"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("department",$row["department"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("level",$row["level"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("gender",$row["gender"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("status",$row["status"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("user_id",$row["user_id"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("phone",$row["phone"],time()+ (10 * 365 * 24 * 60 * 60));


    header('Location: index.php?msg=success');
  }
} else {
    header('Location: index.php?login_fail=failed');
}

}
?>
