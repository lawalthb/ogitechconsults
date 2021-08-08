
<html>
<head>
<title>Loading...</title>
</head>

<body>
<center>
<img src="../images/loading.gif" width="300" height="300" >
</center>
</body>

</html>
<?php include '../connection.php'; ?>
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

$department =  '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $matric_no = test_input($_POST["matric_no"]);
  $email = test_input($_POST["email"]);
  $password = '12345';

  $phone = '';
  $gender = 'Male';
   $level = test_input($_POST["level"]);

  $department = test_input($_POST["department"]);

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

   echo    $sql = "INSERT INTO `users_tb` (`user_id`, `matric_no`, `firstname`, `lastname`, `email`, `phone`, `department`,  `level`, `password`,
  `status`,  `email_comfirm`, `reg_date`, `gender`) VALUES
   (NULL, '$matric_no', '$firstname', '$lastname', '$email', '$phone', '$department', '$level', MD5('$password'), 
   '1', '1', CURRENT_TIMESTAMP, '$gender')";

if (mysqli_query($conn, $sql)){

   ?>
   <script>
   window.location.href = "users.php?msg=suc";
   </script>
   <?php

}  else{
?>
<script>
   window.location.href ="users.php?error=<?=$error_msg?>"
   </script>
   <?php

}  
?>
