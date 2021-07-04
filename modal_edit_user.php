<?php include 'connection.php';?>
<div id="user_edit_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('user_edit_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Edit User</h2>
      <p>Update Your Details.</p>
      <form action="edit_user_action.php" method="post" >
      <div class="w3-row">

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" value="<?php  if(isset($_COOKIE['firstname'])){ echo $_COOKIE['firstname']; } ?>" type="text" name="firstname" autocomplete="off" placeholder="Enter First Name" required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" value="<?php  if(isset($_COOKIE['lastname'])){ echo $_COOKIE['lastname']; } ?>" name="lastname" autocomplete="off" placeholder="Enter Last Name" required>
              <input class="w3-input w3-border" type="hidden" value="<?php  if(isset($_COOKIE['user_id'])){ echo $_COOKIE['user_id']; } ?>" name="user_id"  required>
          </div>



          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="matric_no" autocomplete="off" value="<?php  if(isset($_COOKIE['matric_no'])){ echo $_COOKIE['matric_no']; } ?>"  placeholder="Enter Matric Number (Optional)"  >
          </div>
          


 
         

          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="phone" autocomplete="off" value="<?php  if(isset($_COOKIE['phone'])){ echo $_COOKIE['phone']; } ?>" placeholder="Enter Phone No." required>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="gender"  required>
              <option selected value="<?php  if(isset($_COOKIE['gender'])){ echo $_COOKIE['gender']; } ?>"  selected ><?php  if(isset($_COOKIE['gender'])){ echo $_COOKIE['gender']; } ?></option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              </select>
          </div>


          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="level"  required>

          <option  value="<?php  if(isset($_COOKIE['level'])){ echo $_COOKIE['level']; } ?>"  selected ><?php  if(isset($_COOKIE['level'])){ echo $_COOKIE['level']; } ?></option>
             
              <option value="ND 1">ND 1</option>
              <option value="ND 2">ND 2</option>
              <option value="HND 1">HND 1</option>
              <option value="HND 2">HND 2</option>
              <option value="ND 3">ND 3</option>
              <option value="HND 3">HND 3</option>

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

          <div class="w3-half w3-container w3-panel ">
              <span style="font-size:13px"> Please answer question to verify you are human <span id="editquestion"> <b id="editqst1" style=""><?php echo(rand(1,9)); ?></b>+<b id="editqst2"><?php echo(rand(1,9)); ?></b>=
              <input class="w3-input w3-border" type="text" placeholder= " Answer ?" id="editans2" required>
          </div>
          <div class="w3-half w3-container  ">

             </div>

          


      </div>
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" title="Ans question correctly before submit"
               onclick="document.getElementById('viewcart').style.display='none'" disabled id="edit_submit">Submit</button>

</form>
      <br />
      <a href="#" onclick="document.getElementById('user_edit_modal').style.display='none'" >[ Close ] </a>
    </div>
  </div>
</div>




        <script>

  $(document).ready(function(){


        $("#editans2").keyup(function(){
          //alert(1);
          var val1 = $("#editqst1").html();
          var val2 = $("#editqst2").html();
          var ans = $("#editans2").val();
          
          var val3;
          val3 = Number(val1)+ Number(val2);
         // alert(ans);
            if (val3 == ans) {
                //reg_submit

                   $("#edit_submit").removeAttr("disabled");
            }else{
               $("#edit_submit").prop('disabled', true);
              // $(element).prop('disabled', true);
            }


      }); // close calling function

     
  });// close doc ready

</script>
