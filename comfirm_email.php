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


if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $user_id = test_input($_GET["user_id"]);
  $mail_c = test_input($_GET["mail_c"]);
  
  
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $sql3 = "SELECT *  FROM `users_tb` WHERE `email_token` LIKE '$mail_c' AND `user_id` LIKE '$user_id'" ;
  
  $result3 = mysqli_query($conn, $sql3);
  
  if(mysqli_num_rows($result3) > 0){
    $sql2 = "UPDATE `users_tb` SET `email_comfirm` = '1' WHERE `users_tb`.`user_id` = $user_id";
    $result2 = mysqli_query($conn, $sql2);
    $sql = "SELECT *  FROM `users_tb` WHERE  `users_tb`.`user_id` =$user_id " ;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
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


            header('Location: index.php?msg=success');
        }
    } else {
        header('Location: index.php?error=failed');
    }
    
  }else{
      echo "erorr: Could not confirm your email";
    }
  


?>
