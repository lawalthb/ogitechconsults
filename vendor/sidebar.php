<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>OGITECH STORE</b></h3>
  </div>

  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
  My Products 
  <?php //echo $_GET['email'];
  
  $sql2 = "SELECT * FROM `products_tb`  WHERE `vendor_email` LIKE '$vendor_mail'";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
   // echo "<option value='$row2[vendor_id]' email='$row2[email]'>".$row2["title"]." ".$row2["name"]."</option>";
    echo "<a href='index.php?item_id=".$row2["product_id"]."' class='w3-bar-item w3-button'>".$row2["product_name"]."</a>";
  }
  
  
  
  ?>

  </div>
  <a href="#" onclick="document.getElementById('vendor_contact_modal').style.display='block'" class="w3-bar-item w3-button w3-padding">Contact</a>
  <?php
      if(@!isset($_COOKIE[vendor_mail])) {
    ?>

    <a href="#" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('admin_login_modal').style.display='block'" title="Login">Login</a>
<?php
} else {


   ?>

   <a href="#" class="w3-bar-item w3-button w3-padding" onclick="location.href ='../logout.php'" title="Logout">Logout</a>
<?php
}
?>
</nav>
