<footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
<?php
if(@!isset($_COOKIE[admin_username])) {

?>


    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="send_contact.php" method="post" >
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="name" value="<?php  if(isset($_COOKIE['firstname'])){ echo $_COOKIE['firstname']." ".$_COOKIE['lastname'] ; } ?>" required></p>
          <p><input class="w3-input w3-border" type="text" value="<?php  if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; } ?>" placeholder="Email" name="email" required></p>
          <p><input class="w3-input w3-border" type="text" value="<?php  if(isset($_COOKIE['phone'])){ echo $_COOKIE['phone']; } ?>" placeholder="Phone No." name="phone" required></p>

          <p>
            <textarea class="w3-input w3-border" name="message" required></textarea>
          </p>
          <button type="submit" class="w3-button w3-block w3-black" >Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>Recent Books Order</h4>
        <?php
          $sql = "SELECT order_tb.product_id, products_tb.product_name FROM `order_tb`, `products_tb` where order_tb.product_id = products_tb.product_id  ORDER by order_id DESC LIMIT 10";

          $result = mysqli_query($conn, $sql);
          if (@mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo '<p><a href=index.php?search='.$row['product_id'].'>'.$row['product_name'].'</a></p>';
            }
          }
         ?>


      </div>

      <div class="w3-col s4 w3-justify">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i>OGITECH Consult</p>
        <p><i class="fa fa-fw fa-phone"></i> 08126379154</p>
        <p><i class="fa fa-fw fa-envelope"></i> <a href="mailto:consults@ogitechconsult.com">consults@ogitechconsult.com</a></p>
        <p><i class="fa fa-fw fa-book"></i> Terms<em style="color:white;">_</em>&<em style="color:white;">_</em>Conditions</p>
        <h4>We accept</h4>
        <p><i class="fa fa-money"></i> Cash </p>
        <p><i class="fa fa-exchange"></i> Bank Transfer</p>

        <i class="fa fa-whatsapp w3-hover-opacity w3-large"></i>
        <i class=" w3-hover-opacity w3-small">+2348126379154</i>

      </div>
    </div>


  <?php } ?>
  </footer>
  <div class="w3-black w3-center w3-padding-24">© 2021 All Rights Reserved OGITECH Consult</div>

  <?php
  mysqli_close($conn);
  ?>

<?php
if(isset($_GET['msg'])){

    echo "<script> alert('Successful');
    window.history.replaceState(null, null, window.location.pathname);
    </script>";

    

}

if(isset($_GET['register'])){

  echo "<script> alert('Registration Successful - Please Confirm your email');
  window.history.replaceState(null, null, window.location.pathname);
  </script>";

}

if(isset($_GET['forgot'])){

  echo "<script> alert('Successful - Please check your mail');
  window.history.replaceState(null, null, window.location.pathname);
  </script>";

  

}

if(isset($_GET['error'])){

    echo "<script> alert('Error!');
    window.history.replaceState(null, null, window.location.pathname);
    </script>";

}

if(isset($_GET['etoken'])){

  echo "<script> 
  $(document).ready(function () {
    new_password();
});
  </script>";

}

if(isset($_GET['login_now'])){

  echo "<script> 
  $(document).ready(function () {
    login_now();
});
  </script>";

}
if(isset($_GET['login_fail'])){

  echo "<script> alert('Login Error! you can click the confirmation link to login');
  window.history.replaceState(null, null, window.location.pathname);
  </script>";

}

?>
