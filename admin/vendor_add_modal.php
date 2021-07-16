<?php include '../connection.php';?>
<div id="add_vendors_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_vendors_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Add Vendor</h2>
      <p>Create New Vendor</p>
      <form action="vendor_add_modal.php" method="post" >
      <div class="w3-row">
      
          
         
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="name" placeholder="Enter Full Name" required>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="title"  required>
              
              <option value="" disabled selected>Select Title</option>
              <option value="Mr.">Mr.</option>
              <option value="Mrs.">Mrs.</option>
          </select>
          </div>
          
          
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="email" id="pvendor_email_set" name="email" placeholder="Enter E-mail" required >
          </div>

          

         

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="department"  required>
              
              <option value="" disabled selected>Select Department</option>
              <?php
$sql2 = "SELECT * FROM `departments_tb`";
$result2 = mysqli_query($conn, $sql2);
mysqli_num_rows($result2);
while($row2 = $result2->fetch_assoc()) {
    echo "<option value='$row2[department_id]'>".$row2["name"]."</option>";
  }
              ?>
          </select>
          </div>
          
 

          
 



      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
               onclick="document.getElementById('viewcart').style.display='none'">Submit</button>
     </form>

    </div>
  </div>
</div>

<?php include '../connection.php';?>
<?php 



$name = "";
$title = "";
$email = "";
$department = "";

if (isset($_POST["name"])) {
  $name = trim($_POST["name"]);
  $title = trim($_POST["title"]);
  $email = trim($_POST["email"]);
  $department = trim($_POST["department"]);


   $sql = "INSERT INTO `vendors_tb` ( `title`, `name`, `email`, department_id,`status`, `reg_date`) 
  VALUES ( '$title', '$name', '$email',  '$department' , '1', CURRENT_TIMESTAMP)";

if (mysqli_query($conn, $sql)){ 
   

   header('Location: vendors.php?msg=suc');
  exit;
 
   
}
}


?>

