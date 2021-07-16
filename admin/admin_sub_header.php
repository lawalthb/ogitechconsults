<?php
//include_once '../connection.php';
?>
<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">OGITECH STORE</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 " onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>

  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left"><?=@ucwords($_COOKIE[admin_type]);?></p>
    <p class="w3-right">
    <a href="customer_orders.php">  <i class="fa fa-shopping-cart w3-margin-right" >
         <sup >
           <?php

           $admin_id = @$_COOKIE[admin_id];
           if($admin_id == "") {
           echo "";
           }else{
           $sql = "SELECT * FROM `order_tb` where  `sales_status` = 1 and `order_status` = 1 ";
           $result = mysqli_query($conn, $sql);

           $count = mysqli_num_rows($result);
           if($count == 0){
             echo " ";
           }else{
               echo $count;
           }


           }

           ?>
         </sup></i></a>
      <i class="fa fa-search" onclick="document.getElementById('search_modal').style.display='block'" ></i>  &nbsp;&nbsp;&nbsp;
      <?php

if(@!isset($_COOKIE[admin_username])) {
    ?>

    <i class="fa fa-user" onclick="document.getElementById('admin_login_modal').style.display='block'" title="Login"></i>
<?php
} else {

   echo  @$_COOKIE[admin_username];
   ?>

   <i class="fa fa-power-off " onclick="location.href ='logout.php'" title="Logout"></i>
<?php
}

if(@!isset($_COOKIE[admin_username])) {
 header('Location: login.php?login=error');
}
?>
    </p>
    <style>
/* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
  visibility: hidden; /* Hidden by default. Visible on click */
  min-width: 250px; /* Set a default minimum width */
  margin-left: -125px; /*  Divide value of min-width by 2 */
  background-color: #333; /* Black background color */
  color: #fff; /* White text color */
  text-align: center; /* Centered text */
  border-radius: 2px; /* Rounded borders */
  padding: 16px; /* Padding */
  position: fixed; /* Sit on top of the screen */
  z-index: 1; /* Add a z-index if needed */
  left: 50%; /* Center the snackbar */
  top: 30px; /* 30px from the bottom */
}

/* Show the snackbar when clicking on a button (class added with JavaScript) */
#snackbar.show {
  visibility: visible; /* Show the snackbar */
  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

/* Animations to fade the snackbar in and out */
@-webkit-keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

@keyframes fadein {
  from {top: 0; opacity: 0;}
  to {top: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {top: 30px; opacity: 1;}
  to {top: 0; opacity: 0;}
}

@keyframes fadeout {
  from {top: 30px; opacity: 1;}
  to {top: 0; opacity: 0;}
} 
</style>
    <!-- The actual snackbar -->
<div id="snackbar">Successful</div>
  </header>
