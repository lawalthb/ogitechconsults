<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>OGITECH STORE</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
  <a href="index.php" class="w3-bar-item w3-button">Dashboard</a>
    <a href="customer_orders.php" class="w3-bar-item w3-button">Customer's Order</a>
  <a href="sales.php" class="w3-bar-item w3-button">Sales</a>
    <a href="#" class="w3-bar-item w3-button">Make New Order</a>

    <a href="products.php" class="w3-bar-item w3-button">Products</a>
    <a href="stock.php" class="w3-bar-item w3-button">Stock</a>
    <a href="vendors.php" class="w3-bar-item w3-button">Vendors</a>
    <a href="users.php" class="w3-bar-item w3-button">Users</a>
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('viewcart').style.display='block'">View Cart</a>
  <?php
      if(@!isset($_COOKIE[admin_username])) {
    ?>

    <a href="#" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('admin_login_modal').style.display='block'" title="Login">Login</a>
<?php
} else {


   ?>

   <a href="#" class="w3-bar-item w3-button w3-padding" onclick="location.href ='logout.php'" title="Logout">Logout</a>
<?php
}
?>
</nav>
