
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
  $username = test_input($_POST["username"]);
  $email = test_input($_POST["email"]);
 
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $password ="store12345";
       $sql = "INSERT INTO `admins_tb` (`username`, `firstname`, `lastname`, `email`,  `admin_type`, `password`) VALUES
   ( '$username', '$firstname', '$lastname', '$email', 'sales_rep', MD5('$password'))";

if (mysqli_query($conn, $sql)){

   ?>
   <script>
   window.location.href = "sub_admins.php?msg=suc";
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
