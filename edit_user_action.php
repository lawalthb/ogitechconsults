
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
<?php include 'connection.php'; ?>
<?php



// define variables and set to empty values

$firstname = '';
$lastname =  '';
$matric_no =  '';
$email =  '';
$password =  '';

$phone =  '';
$gender =  '';
$level =  '';
$user_id =  '';

$department =  '';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $matric_no = test_input($_POST["matric_no"]);
  $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);

  $phone = test_input($_POST["phone"]);
  $gender = test_input($_POST["gender"]);
   $level = test_input($_POST["level"]);
   $user_id = test_input($_POST["user_id"]);

  $department = test_input($_POST["department"]);
  

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

  $sql3 = "UPDATE `users_tb` SET `matric_no` = '$matric_no',
   `firstname` = '$firstname', 
   `lastname` = '$lastname', 
   `phone` = '$phone',
    `department` = '$department', 
    `level` = '$level', 
    `gender` = '$gender'
   WHERE `users_tb`.`user_id` = $user_id " ;
  //die();
  $result3 = mysqli_query($conn, $sql3);
   $result3;
  //die();
  if($result3 > 0){
    $sql1 = "SELECT *  FROM `users_tb` WHERE  `users_tb`.`user_id` =$user_id " ;
    $result1 = mysqli_query($conn, $sql1);
    while($row = mysqli_fetch_assoc($result1)) {
        setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("matric_no",$row["matric_no"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("firstname",$row["firstname"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("lastname",$row["lastname"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("department",$row["department"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("status",$row["status"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("user_id",$row["user_id"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("gender",$row["gender"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("level",$row["level"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("phone",$row["phone"],time()+ (10 * 365 * 24 * 60 * 60));


       
    }
   ?>
   <script>
   window.location.href = "index.php?msg=success_reg";
   </script>
     <?php
   



}else{
  $error_msg = mysqli_error($conn);
?>
<script>
   window.location.href ="index.php?error=<?=$error_msg?>"
   </script>
   <?php
}

?>
