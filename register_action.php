
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

  $department = test_input($_POST["department"]);

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

   $sql = "INSERT INTO `users_tb` (`user_id`, `matric_no`, `firstname`, `lastname`, `email`, `phone`, `department`,  `level`, `password`,
  `status`,  `email_comfirm`, `reg_date`, `gender`) VALUES (NULL, '$matric_no', '$firstname', '$lastname', '$email', '$phone', '$department', '$level', MD5('$password'), '1',
  '0', CURRENT_TIMESTAMP, '$gender')";

if (mysqli_query($conn, $sql)){
    $last_id = mysqli_insert_id($conn);
    $randnum = md5(rand());
    $confirm_link = "http://ogitechconsults.com/comfirm_email.php?mail_c=".$randnum."&user_id=".$last_id;

   $sql = "UPDATE `users_tb`
  SET `email_link` ='$confirm_link' ,`email_token` = '$randnum'
    WHERE `users_tb`.`user_id` = $last_id";
   mysqli_query($conn, $sql);


   // email  message
   $msg = "Welcome to OGITECH CONSULTS\nBelow is your comfirmation link \n ".$confirm_link ."\n to continue using our service \n \n Thanks ";
   $headers = "From: consults@ogitechconsults.com\r\n";
   $headers .= "Reply-To: consults@ogitechconsults.com\r\n";
   
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
   // use wordwrap() if lines are longer than 70 characters
   $msg = wordwrap($msg,70);

   // send email
   mail($email,"REGISTRATION - OGITECH CONSULTS",$msg,$headers);

   ?>
   <script>
   window.location.href = "index.php?register=success_reg";
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
