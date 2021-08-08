

<?php include '../connection.php';?>
<div id="edit_user_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('edit_user_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Edit User</h2>
      <p >Editing <span id="edit_user_uname2"></span></p>
      
    
<p id="edit_response"></p>
<div id="body">
      <form action="user_edit_modal.php" method="post" >
      <div class="w3-row">
      
          
         
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" id="edit_user_firstname" name="firstname" placeholder="Enter Item Name" required>
              <input class="w3-input w3-border" type="hidden" id="edit_user_id" name="user_id" required>
             
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
                      
          
          <input class="w3-input w3-border" type="text" id="edit_user_lastname" placeholder="LastName"  name="lastname" required>
          </div>
          
          <div class="w3-half w3-container w3-margin-bottom" >
            
              <input list="level" id="edit_user_level" name="level"  class="w3-select w3-border" require>
             
              <datalist id="level"> 
              <option value="ND1">
              
              <option value="ND2">
              <option value="HND1">
              <option value="HND2">
              <option value="ND3">
              <option value="HND3">
              </datalist>
          </div>

          

         

          <div class="w3-half w3-container w3-margin-bottom">
          <input list="dept" id="department" name="department"  class="w3-select w3-border" require>
          <datalist id="dept">
            <?php
            $sql3 = "SELECT * FROM `departments_tb` WHERE `status` = 1";
            $result3 = mysqli_query($conn, $sql3);
            mysqli_num_rows($result3);
            while($row3 = $result3->fetch_assoc()) {
            echo "<option value='$row3[name] -$row3[department_id]'>";
            }
              ?>
          </datalist>
          </input>
          

          
          </div>
          

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" id="status" name="status"  required>
              
              <option value="1"  selected>Activate</option>
              <option value="0"  >Deactivate</option>
             
          </select>

          
          </div>
          
          <div class="w3-half w3-container w3-margin-bottom w3-right " >
              <input class="w3-input w3-border" type="text" id="edit_user_matric"   name="matric_no" placeholder="Matric Number"  >
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
$matric_no = "";
$status = "";

if (isset($_POST["firstname"])) {
  echo "<script>
  document.getElementById('body').style.display = 'none';
  </script>";
   $firstname = trim($_POST["firstname"]);
  $lastname = trim($_POST["lastname"]);
  $user_id = trim($_POST["user_id"]);
  
  $department = trim($_POST["department"]);

  $department = explode("-",$department);
  $department_id =  $department[1];

  $level = trim($_POST["level"]);
  $matric_no = trim($_POST["matric_no"]);
  
  
  $status = trim($_POST["status"]);
 
  
    $sql = "UPDATE `users_tb` SET `matric_no` = '$matric_no', `firstname` = '$firstname', `lastname` = '$lastname', `department` = '$department_id', `level` = '$level' , `status` = '$status' WHERE `users_tb`.`user_id` = $user_id; ";

if (mysqli_query($conn, $sql)){ 
   



  ?>
  <script>
  window.location.href = "users.php?msg=suc";

  </script>
    <?php
  
 
   
}
}


?>