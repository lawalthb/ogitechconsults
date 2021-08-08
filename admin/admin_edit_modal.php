

<?php include '../connection.php';?>
<div id="admin_edit_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('admin_edit_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Edit Profile</h2>
      <p >Editing <span id="edit_user_uname2"></span></p>
      
    
<p id="edit_response"></p>
<div id="body">
      <form action="admin_edit_modal.php" method="post" >
      <div class="w3-row">
      
          
         
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" id="edit_user_firstname" value="<?=$_COOKIE['firstname']?>" name="firstname" placeholder="Enter Item Name" required>
              <input class="w3-input w3-border" type="hidden" value="<?=$_COOKIE['admin_id']?>" id="edit_admin_id" name="admin_id" required>
             
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
                      
          
          <input class="w3-input w3-border" type="text" id="edit_user_lastname" value="<?=$_COOKIE['lastname']?>" placeholder="LastName"  name="lastname" required>
          </div>
          
          
          

         

          
          

          <div class="w3-half w3-container w3-margin-bottom">
          <input class="w3-input w3-border" type="text"   placeholder="old Password?"  name="old_password" >

          
          </div>
          
          <div class="w3-half w3-container w3-margin-bottom w3-right " >
              <input class="w3-input w3-border" type="text" id="edit_user_username"    name="password" placeholder="Password"  >
          </div>
      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
            >Submit</button>
     </form>
          </div>
    </div>
  </div>
</div>


<?php 



$firstname = "";
$lastname = "";
$password = "";
$old_password = "";

if (isset($_POST["firstname"])) {
  echo "<script>
  document.getElementById('body').style.display = 'none';
  </script>";
   $firstname = trim($_POST["firstname"]);
  $lastname = trim($_POST["lastname"]);
  $admin_id = trim($_POST["admin_id"]);
 
  $password = trim($_POST["password"]);
  $password =MD5($password);
  
  $old_password = trim($_POST["old_password"]);
 if( $old_password !=""){
  
    $sql = "UPDATE `admins_tb` SET `password` = '$password', `firstname` = '$firstname', `lastname` = '$lastname'  WHERE `admins_tb`.`admin_id` = $admin_id; ";
 }elseif($old_password ==""){
    $sql = "UPDATE `admins_tb` SET  `firstname` = '$firstname', `lastname` = '$lastname'  WHERE `admins_tb`.`admin_id` = $admin_id; ";

 }

if (mysqli_query($conn, $sql)){ 
   



  ?>
  <script>
  window.location.href = "index.php?msg=suc";

  </script>
    <?php
  
 
   
}
}


?>