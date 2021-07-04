

<?php include 'connection.php';?>



<?php




if (isset($_GET["email"])){

    $email = trim($_GET["email"]);


    $sql = "SELECT * FROM `users_tb` WHERE `email` LIKE '$email'";
    $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "Email already exist";
        }
} else {
        echo "errpr";
        }




//echo "json_encode($response);"
//echo "lawal fixed";
?>
