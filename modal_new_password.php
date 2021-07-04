<div id="new_password_modal" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('new_password_modal').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">Create New Password</h2>
      <form action="new_password_action.php" method="post" >
      <p>Enter your new password</p>
      <p><input class="w3-input w3-border" type="email" name="email" value="<?=$_GET['email']?>" placeholder="Enter E-mail" readonly required>
      <input class="w3-input w3-border" type="hidden" name="etoken" value="<?=$_GET['etoken']?>"   required></p>
      <p><input class="w3-input w3-border" type="password" id="password2" name="password" placeholder="Enter Password" required></p>
      <p><input class="w3-input w3-border" type="password" id="confirm_password2" name="confirm_password" placeholder="Confirm Password" required></p>
      <div class="row">
          <div class="w3-half w3-container w3-panel ">
              <span style="font-size:13px"> Please answer question to verify you are human <span id="nquestion"><b id="nqst1" style=""><?php echo(rand(1,9)); ?></b> + <b id="nqst2"><?php echo(rand(1,9)); ?></b> =
          </div>
          <div class="w3-half w3-container  ">

              <input class="w3-input w3-border" type="text" placeholder= " Answer ?"  id="n_ans" required>

          </div>
          <br>


      <br />
      </div>

      <button type="submit" class="w3-button w3-padding-large w3-red w3-margin-bottom " onclick="document.getElementById('viewcart').style.display='none'" title="Ans question correctly before submit" disabled id="n_submit">Submit</button>

      </form>

      <a href="#" onclick="document.getElementById('register_modal').style.display='block'" >[ Register Here ] </a>
      <a href="#" onclick="document.getElementById('forgot_modal').style.display='block'; document.getElementById('viewcart').style.display='none'; document.getElementById('login_modal').style.display='block' " >[ Login ] </a>
   
   </div>
  </div>
</div>

<script>

$(document).ready(function(){


$("#n_ans").keyup(function(){
  //alert(1);
  var val1 = $("#nqst1").html();
  var val2 = $("#nqst2").html();
  var ans = $("#n_ans").val();
  var val3;
  val3 = Number(val1)+ Number(val2);

    if (val3 == ans) {
        //reg_submit

           $("#n_submit").removeAttr("disabled");
    }else{
       $("#n_submit").prop('disabled', true);
      // $(element).prop('disabled', true);
    }


}); // close calling function
});// close doc ready

</script>


<script>
        var password = document.getElementById("password2")
      , confirm_password = document.getElementById("confirm_password2");

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
