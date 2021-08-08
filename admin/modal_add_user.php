<?php include '../connection.php';?>
<div id="add_user_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('add_user_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Register New User</h2>
      <p>Register with valid information.</p>
      <form action="add_user_action.php" method="post" >
      <div class="w3-row">

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="text" name="firstname" placeholder="Enter First Name" required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="lastname" placeholder="Enter Last Name" required>
          </div>


          
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="matric_no" placeholder="Enter Matric Number"  >
          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="email"  name="email" placeholder="Enter E-mail" required >
          </div>

         

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="level"  required>
              
              <option value="" disabled selected>Select Level</option>
              <option value="ND1">ND 1</option>
              <option value="ND2">ND 2</option>
              <option value="HND1">HND 1</option>
              <option value="HND2">HND 2</option>
              <option value="ND3">ND 3</option>
              <option value="HND3">HND 3</option>
          
          </select>
          </div>
          

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="department"  required>
              
              <option value="" disabled selected>Select Department</option>
              <?php
            $sql2 = "SELECT * FROM `departments_tb`  ORDER BY `departments_tb`.`name` ASC";
            $result2 = mysqli_query($conn, $sql2);
            mysqli_num_rows($result2);
            while($row2 = $result2->fetch_assoc()) {
                echo '<option value='.$row2["department_id"].'>'.$row2["name"].'</option>';
              }
              ?>
          </select>
          </div>
          

      </div> 
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom"
               onclick="document.getElementById('viewcart').style.display='none'">Submit</button>
     

     
    </div>
  </div>
</div>