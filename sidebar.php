<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
  <a href="index.php" style="color:black; text-decoration:none">  <h3 class="w3-wide"><b>OGITECH STORE</b></h3></a>
  </div>

  <a href="#" class="w3-bar-item w3-button">Filter By</a>

  <div class="w3-padding-10 w3-large w3-text-grey" style="font-weight:bold">
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Department <i class="fa fa-caret-down"></i>
    </a>
     <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
  <?php
$sql2 = "SELECT * FROM `departments_tb`  ORDER BY `departments_tb`.`name` ASC";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo '<a href="index.php?department='.$row2["department_id"].'" class="w3-bar-item w3-button">'.$row2["name"].'</a>';
  }
  ?>
</div>


  </div>



  <div class="w3-padding-10 w3-large w3-text-grey" style="font-weight:bold">
    <a onclick="myAccFunc2()" href="javascript:void(2)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Lecturer <i class="fa fa-caret-down"></i>
    </a>
     <div id="demoAcc2" class="w3-bar-block w3-hide w3-padding-large w3-medium">
  <?php
$sql2 = "SELECT * FROM `vendors_tb`  ORDER BY `name` ASC";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo '<a href="index.php?vendor='.$row2["vendor_id"].'" class="w3-bar-item w3-button">'.$row2["name"].'</a>';
  }
  ?>
</div>


</div>
<div class="w3-padding-10 w3-large w3-text-grey" style="font-weight:bold">
  <a onclick="myAccFunc1()" href="javascript:void(1)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
    Faculty <i class="fa fa-caret-down"></i>
  </a>
   <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
<?php
// $sql2 = "SELECT * FROM `departments_tb`  ORDER BY `departments_tb`.`name` ASC";
// $result2 = mysqli_query($conn, $sql2);
// mysqli_num_rows($result2);
// while($row2 = $result2->fetch_assoc()) {
//     echo '<a href="index.php?department_id='.$row2["department_id"].'" class="w3-bar-item w3-button">'.$row2["name"].'</a>';
//   }
?>
</div>


</div><br /><br /><br />
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
  <a href="order_history.php?sales_status=1" class="w3-bar-item w3-button w3-padding"> My Orders</a>
  <?php

     if(@!isset($_COOKIE[firstname])) {
       ?>

       <a href="#" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('login_modal').style.display='block'" title="Login">Login</a>
   <?php
   } else {

      ?>

      <a href="#" class="w3-bar-item w3-button w3-padding" onclick="location.href ='logout.php'" title="Logout">Logout</a>
   <?php
   }
   ?>
</nav>
