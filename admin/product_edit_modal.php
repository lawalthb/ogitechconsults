

<?php include '../connection.php';?>
<div id="edit_vendors_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('edit_vendors_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Edit Vendor</h2>
      <p >Editing <span id="edit_vendor_vname2"></span></p>
      
    
<p id="edit_response"></p>
      <form action="vendor_edit_modal.php" method="post" >
      <div class="w3-row">
      
          
         
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" id="edit_vendor_vname" name="name" placeholder="Enter Full Name" required>
              <input class="w3-input w3-border" type="hidden" id="edit_vendor_id" name="vendor_id" required>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="title" id="edit_vendor_title"   required>
              
              <option value="" disabled selected>Select Title</option>
              <option value="Mr.">Mr.</option>
              <option value="Mrs.">Mrs.</option>
          </select>
          </div>
          
          
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="email" id="edit_vendor_email" name="email" placeholder="Enter E-mail" required >
          </div>

          

         

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" id="department" name="department"  required>
              
              <option value="" disabled selected>Select Department</option>
              <?php
$sql2 = "SELECT * FROM `departments_tb` ";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo "<option value='$row2[department_id]'>".$row2["name"]."</option>";
  }
              ?>
          </select>

          
          </div>
          

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" id="status" name="status"  required>
              
              <option value="1"  selected>Activate</option>
              <option value="0"  >Deactivate</option>
             
          </select>

          
          </div>
          
 
      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
            >Submit</button>
     </form>

    </div>
  </div>
</div>


<?php 



$name = "";
$title = "";
$email = "";

if (isset($_POST["name"])) {
   $name = trim($_POST["name"]);
  $title = trim($_POST["title"]);
  $email = trim($_POST["email"]);
  $department = trim($_POST["department"]);
  $vendor_id = trim($_POST["vendor_id"]);
  $status = trim($_POST["status"]);

   $sql = "UPDATE `vendors_tb` SET `title` = '$title', `name` = '$name', `email` = '$email',
   `department_id` = '$department', `status` = '$status' WHERE `vendors_tb`.`vendor_id` = $vendor_id; ";

if (mysqli_query($conn, $sql)){ 
   

   header('Location: vendors.php?msg=suc');
  exit;
 
   
}
}


?>