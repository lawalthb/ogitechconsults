<?php include 'connection.php';?>
<div id="register_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('register_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Register</h2>
      <p>Register with your valid information.</p>
      <form action="register_action.php" method="post" >
      <div class="w3-row">

          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="text" name="firstname" autocomplete="off" placeholder="Enter First Name" required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="lastname" autocomplete="off" placeholder="Enter Last Name" required>
          </div>



          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="text" name="matric_no" autocomplete="off" placeholder="Enter Matric Number (Optional)"  >
          </div>
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="email"  name="email" autocomplete="off" id="email" placeholder="Enter E-mail" required >
          <span style="color:red" id="email_msg"></span>
          </div>


 
          <div class="w3-half w3-container w3-margin-bottom" >
              <input class="w3-input w3-border" type="password" id="password" name="password" placeholder="Enter Password" required >
          </div>
          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="password" id="confirm_password" placeholder="Confirm Password" required>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
              <input class="w3-input w3-border" type="number" name="phone" autocomplete="off" placeholder="Enter Phone No." required>
          </div>

          <div class="w3-half w3-container w3-margin-bottom">
          <select class="w3-select w3-border" name="gender"  required>
              <option value="" disabled selected>Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              </select>
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

          <div class="w3-half w3-container w3-panel ">
              <span style="font-size:13px"> Please answer question to verify you are human <span id="cquestion"> <b id="qst1" style=""> <?php echo(rand(1,9)); ?></b> + <b id="qst2"> <?php echo(rand(1,9)); ?></b>   =
              <input class="w3-input w3-border" type="number" placeholder= " Answer ?" id="reg_ans" required>
          </div>
          <div class="w3-half w3-container  ">

             

          </div>


      </div>
      <br />
      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom" title="Ans question correctly before submit"
               onclick="document.getElementById('viewcart').style.display='none'" disabled id="reg_submit">Submit</button>


      <br />
      <a href="#" onclick="register_login();" >[ Already Register Login Here ] </a>
    </div>
  </div>
</div>

<script>
        var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
        </script>


        <script>

  $(document).ready(function(){


        $("#reg_ans").keyup(function(){
          //alert(1);
          var val1 = $("#qst1").html();
          var val2 = $("#qst2").html();
          var ans = $("#reg_ans").val();
          var val3;
          val3 = Number(val1)+ Number(val2);

            if (val3 == ans) {
                //reg_submit

                   $("#reg_submit").removeAttr("disabled");
            }else{
               $("#reg_submit").prop('disabled', true);
              // $(element).prop('disabled', true);
            }


      }); // close calling function

      $("#email").blur(function(){
        var email = $("#email").val();
        $.ajax({
                url: "ajax_check_mail.php?email=" + email ,
                success: function(response) {
                     $("#email_msg").html(response);
                },
                error: function(xhr) {
                      $("#email_msg").html(xhr);
                }
        });
      })
  });// close doc ready

</script>
