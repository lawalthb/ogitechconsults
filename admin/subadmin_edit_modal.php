

<?php include '../connection.php';?>
<div id="edit_subadmin_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('edit_subadmin_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Edit User</h2>
      <p >Editing <span id="edit_user_uname2"></span></p>
      
    
<p id="edit_response"></p>
<div id="body">
      <form action="subadmin_edit_modal.php" method="post" >
      <div class="w3-row">
      
          
         
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" id="edit_user_firstname" name="firstname" placeholder="Enter Item Name" required>
              <input class="w3-input w3-border" type="hidden" id="edit_admin_id" name="admin_id" required>
             
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
                      
          
          <input class="w3-input w3-border" type="text" id="edit_user_lastname" placeholder="LastName"  name="lastname" required>
          </div>
          
          
          

         

          
          

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" id="status" name="status"  required>
              
              <option value="1"  selected>Activate</option>
              <option value="0"  >Deactivate</option>
             
          </select>

          
          </div>
          
          <div class="w3-half w3-container w3-margin-bottom w3-right " >
              <input class="w3-input w3-border" type="text" id="edit_user_username"   name="username" placeholder="Username"  >
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
$username = "";
$status = "";

if (isset($_POST["firstname"])) {
  echo "<script>
  document.getElementById('body').style.display = 'none';
  </script>";
   $firstname = trim($_POST["firstname"]);
  $lastname = trim($_POST["lastname"]);
  $admin_id = trim($_POST["admin_id"]);
 
  $username = trim($_POST["username"]);
  
  
  $status = trim($_POST["status"]);
 
  
    $sql = "UPDATE `admins_tb` SET `username` = '$username', `firstname` = '$firstname', `lastname` = '$lastname' , `status` = '$status' WHERE `admins_tb`.`admin_id` = $admin_id; ";

if (mysqli_query($conn, $sql)){ 
   



  ?>
  <script>
  window.location.href = "sub_admins.php?msg=suc";

  </script>
    <?php
  
 
   
}
}


?>