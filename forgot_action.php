
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

$email =  '';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = test_input($_POST["email"]);
  

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sql3 = "SELECT *  FROM `users_tb` WHERE `email` LIKE '$email'" ;
  
  $result3 = mysqli_query($conn, $sql3);
  
  if(mysqli_num_rows($result3) > 0){
    $row = mysqli_fetch_assoc($result3);
    $email_token  = $row["email_token"];
    $confirm_link = "http://ogitechconsults.com/index.php?etoken=".$email_token."&email=".$email;

  

   // email  message
   $msg = "Welcome to OGITECH CONSULTS\nBelow is the link \n ".$confirm_link ."\n to change reset your password \n \n Thanks ";

   // use wordwrap() if lines are longer than 70 characters
   $msg = wordwrap($msg,70);

   // send email
   mail($email,"RESET PASSWORD - OGITECH CONSULTS",$msg);

   ?>
   <script>
   window.location.href = "index.php?forgot=success_reg";
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
