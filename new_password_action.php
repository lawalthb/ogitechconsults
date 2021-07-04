
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
$password =  '';
$etoken ='';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $etoken = test_input($_POST["etoken"]);
    $email = test_input($_POST["email"]);
  $password = test_input($_POST["password"]);
  

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

  $sql3 = "UPDATE `users_tb` SET `password` = MD5('$password') WHERE `users_tb`.`email` = '$email' and  `users_tb`.`email_token`='$etoken' ;" ;
  //die();
  $result3 = mysqli_query($conn, $sql3);
   $result3;
  //die();
  if($result3 > 0){
   
   ?>
   <script>
   window.location.href = "index.php?login_now=success_reg";
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
