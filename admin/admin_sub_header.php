<?php
//include_once '../connection.php';
if($_COOKIE['admin_type'] == "admin"){
  $admin_type = 1;
}else{
  $admin_type = 0;
}
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

   
   ?>
<i class="fas fa-user-edit" onclick="document.getElementById('admin_edit_modal').style.display='block'" title="Edit-User"><?=@$_COOKIE[admin_username];?></i>
   <i class="fa fa-power-off " onclick="location.href ='logout.php'" title="Logout"></i>
<?php
}

if(@!isset($_COOKIE[admin_username])) {
 header('Location: login.php?login=error');
}
?>
    </p>
  </header>
